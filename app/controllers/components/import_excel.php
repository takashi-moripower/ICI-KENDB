<?php

App::import('Component', 'BaseExcel');
App::import('vendor', 'phpexcel/phpexcel');
App::import('Utility', 'Set');
App::import('Component', 'ImportLog');

class ImportExcelComponent extends BaseExcelComponent {

    protected $_modelName;
    protected $_primaryKey;
    protected $_parentKey;
    protected $_fileName;
    protected $_tmpFile;
    protected $_format;
    protected $_reader;
    protected $_body = null;
    protected $_header = null;
    protected $_report = [];

    const ID_PATTERN = "/[0-9a-zA-Z]{8}/";
    const HEADER_ALIAS = array(
        'id' => array('ID', 'Id'),
        'プロジェクトレコードID' => array('親データID', 'PJレコードID', 'プロジェクトデータID', 'PJデータID'),
        '東工大連携Id' => array('東工大連携ID'),
        '原義番号' => array('原議番号'),
        '本年度入金' => array('21入金'),
        '氏名' => array('教員名', '研究者氏名'),
        '職名' => array('職'),
        '部局名' => array('所属部局名', '部局'),
        '専攻名' => array('専攻等名'),
        'ポスト番号' => array('M-Box'),
        'メール' => array('E-mail', 'Ｅ－ｍａｉｌ', 'メールアドレス'),
        '申込機関1' => array('申込機関①'),
        '申込機関2' => array('申込機関②'),
        '機関代表者住所' => array('機関代表住所'),
        '本年度光熱水料' => array('本年度光熱水量'),
        '本年度合計' => array('本年度総計'),
        '実績報告書受付日' => array('実績報告受付日'),
        '分配金実配分額' => array('分配金配分額'),
        '新/継' => array('新・継'),
        '代表者名' => array('研究代表者'),
        '通知部局名' => array('通知部局'),
        '統計部局名' => array('統計部局', '所属部局（統計）'),
        '専攻名' => array('専攻等', '専攻名（受入研究者）'),
        '内線' => array('内線番号'),
        'ＦＡＸ' => array('ＦＡＸ番号', 'FAX番号', 'FAX'),
        '入金年月日' => array('入金日'),
        'PJコード' => array('プロジェクトコード'),
        'PJコード名称長' => array('プロジェクトコード名称長'),
        '契約締結日' => array('契約日'),
        '受入研究者' => array('指導教員', '氏名'),
        '大学収益化額' => array('間接経費（大学収益化額）'),
        '研究室収益化額' => array('間接経費（研究室配当分）'),
        '成果報告書先方様式' => array('成先方様式'),
    );
    const RESULT_SUCCESS = 1;
    const RESULT_FAILED = 0;

    public function startup($controller) {
        parent::startup($controller);

        $this->ImportLog = new ImportLog();
        $this->ImportLog->startup($controller);

        $this->getController()->set('logFile', $this->ImportLog->getFileName());
    }

    /**
     * 結果レポートに追加
     * @param type $path
     * @param type $val
     */
    protected function _addReport($path, $val, $isArray = false) {
        if ($isArray) {
            $oldVal = Set::classicExtract($this->_report, $path);
            if (isset($oldVal)) {
                array_push($oldVal, $val);
                $val = $oldVal;
            } else {
                $val = [$val];
            }
        }

        $this->_report = Set::insert($this->_report, $path, $val);
        $this->getController()->set('report', $this->_report);
    }

    /**
     * 
     * @param type $modelName   
     * @param type $primaryKey  
     * @param type $parentKey   親ノード情報を格納するカラム nullの時は親子関係なし
     * @return type
     */
    public function import($modelName, $primaryKey, $parentKey = null) {

        $this->_modelName = $modelName;
        $this->_primaryKey = $primaryKey;
        $this->_parentKey = $parentKey;

        $controller = $this->getController();

        if (!$controller->data) {   //postでなかった場合
            return;
        }

        //最大実行時間を無限に設定
        ini_set("max_execution_time", 0);

        if (!$this->_initFile()) {
            return;
        }
        if (!$this->_initExcel()) {
            return;
        }
        if (!$this->_readExcel()) {
            $this->ImportLog->log('ファイルの読み取りに失敗、処理を中断しました');
            $controller->set('result', self::RESULT_FAILED);
            $controller->render('/common/import_result');
            return;
        }
        if (!$this->_validationHeader()) {
            $this->ImportLog->log('ヘッダーに異常が発見されたため、処理を中断しました');
            $controller->set('result', self::RESULT_FAILED);
            $controller->render('/common/import_result');
            return;
        }

        if (!$this->_validationBody()) {
            $this->ImportLog->log('データに異常が発見されたため、処理を中断しました');
            $controller->set('result', self::RESULT_FAILED);
            $controller->render('/common/import_result');
            return;
        }

        $this->_addReport('register', [
            'insert' => 0,
            'update' => 0,
            'failed' => 0
        ]);

        $this->_registerData();

        if ($parentKey) {//データ構造に親子関係がある場合
            $this->_registerChildren();
        }

        $controller->set('report', $this->_report);

        $controller->set('result', self::RESULT_SUCCESS);
        $this->getController()->render('/common/import_result');
    }

    protected function _registerChildren() {
        $model = $this->getModel();

        $this->_addReport('details', [
            'insert' => 0,
            'update' => 0,
            'failed' => 0,
            'none'=>0,
        ]);


        foreach ($this->_report['id_saved'] as $id) {
            $model->recursive = 1;
            $model->primaryKey = $this->_primaryKey;
            $rec = $model->read(null, $id);

            //ノードが存在しない場合　通常発生しない
            if (empty($rec)) {
                $this->_report['details']['failed'] ++;
                continue;
            }

            // 子ノードだったら何もしない
            if ($this->_isChild($rec)) {
                $this->_report['details']['none'] ++;
                continue;
            }

            //以降は$recが親だった場合の処理
            $children = Set::extract($rec, "{$this->_modelName}Node");

            // 子ノードが存在しなかった場合　親と同じ情報を子ノード（明細）として追加する
            if (empty($children)) {
                if ($this->_insertChild($rec)) {
                    $this->_report['details']['insert'] ++;
                } else {
                    $this->_report['details']['failed'] ++;
                }
                continue;
            }
            // 子ノード数が１だったら親データで子を上書きする
            if (count($children) == 1) {
                if ($this->_updateChild($rec)) {
                    $this->_report['details']['update'] ++;
                } else {
                    $this->_report['details']['failed'] ++;
                }
            }
        }
    }

    /**
     * 自身が親ノードで、子ノード数が1だったら　親ノードの情報で子ノード(明細）を更新する
     */
    protected function _updateChild($rec) {
        $model = $this->getModel();
        $model->recursive = -1;
        $model->primaryKey = $this->_primaryKey;

        $child_id = Set::extract($rec, "{$this->_modelName}Node.0.{$this->_primaryKey}");
        $child = $model->read(null, $child_id);

        if (empty($child)) {
            return false;
        }

        foreach ($child[$this->_modelName] as $key => $value) {
            if ($key == $this->_primaryKey || $key == $this->_parentKey) {// id,parent_id はいじらない
                continue;
            }
            $child[$this->_modelName][$key] = $rec[$this->_modelName][$key];
        }
        return $model->save($child);
    }

    /**
     * 自身が親ノードで、子ノード数が０だったら　親と同じ情報を子ノード（明細）として追加する
     * @param type $rec
     */
    protected function _insertChild($rec) {
        $model = $this->getModel();

        $id = $rec[$this->_modelName][$this->_primaryKey];
        debug($id);

        //parent_idに保存済み親データのIDを入れる
        $rec[$this->_modelName][$this->_parentKey] = $id;
        //id を未設定に
        unset($rec[$this->_modelName][$this->_primaryKey]);

        debug($rec);

        $model->create();
        return $model->save($rec);
    }

    /**
     * 該当レコードが子ノードかどうか判定
     * @param type $rec
     * @return type
     */
    protected function _isChild($rec) {
        return !empty(Set::extract($rec, "{$this->_modelName}.{$this->_parentKey}"));
    }

    /**
     * データ保存処理本体
     */
    protected function _registerData() {

        $model = $this->getModel();

        $idSaved = [];

        foreach ($this->_body as $row => $data) {

            $src = $model->columns2data($data, $this->_modelName);

            $entity = $model->find('first', [
                'conditions' => [$this->_primaryKey => $src[$this->_modelName][$this->_primaryKey]],
                'recursive' => -1
            ]);

            if (empty($entity)) {
                $model->create();
                $isNew = true;
            } else {
                $isNew = false;
            }

            $model->set($src);
            $logMsg = sprintf('%04d行目', $row) . "\t" . ($isNew ? "追加" : "更新" ) . "\t";
            if ($model->save()) {
                if ($isNew) {
                    $this->_report['register']['insert'] ++;
                } else {
                    $this->_report['register']['update'] ++;
                }
                $logMsg .= "成功";

                $idSaved[] = $model->id;
            } else {
                $this->_report['register']['failed'] ++;
                $logMsg .= "失敗";
            }
        }

        $logMsg = "追加成功:{$this->_report['register']['insert']}\t"
                . "更新成功:{$this->_report['register']['update']}\t"
                . "失敗:{$this->_report['register']['failed']}";

        $this->ImportLog->log($logMsg);

        $this->_report['id_saved'] = $idSaved;
    }

    /**
     * personal_id を　研究者番号　に変換
     * @param type $field
     * @return type
     */
    protected function _field2Label($field) {
        $colId = $this->_field2ColId($field);
        if ($colId === false) {
            return null;
        }
        return $this->_header[$colId];
    }

    /**
     * personal_id を　104　に変換
     * @return boolean
     */
    protected function _field2ColId($field) {
        $colId = array_search($field, $this->getModel()->file_columns);
        if ($colId === false) {
            return null;
        }

        return $colId;
    }

    protected function _validationBody() {

        $valid = true;
        $model = $this->getModel();

        foreach ($this->_body as $id => $dataPost) {
            $dataModel = $model->columns2data($dataPost, $this->_modelName);

            $model->set($dataModel);
            if (!$model->validates()) {
                foreach ($model->invalidFields() as $invalidField => $msg) {
                    $label = $this->_field2Label($invalidField);
                    $value = $dataPost[$this->_field2ColId($invalidField)];
                    $this->_addReport("error.body.{$id}", ['label' => $label, 'value' => $value, 'message' => $msg], true);

                    $log = ($id + 2) . "行目\t{$label}\t{$value}\t{$msg}";
                    $this->ImportLog->log($log);
                }
                $valid = false;
            }
        }

        return $valid;
    }

    public function getModel() {
        return $this->getController()->{$this->_modelName};
    }

    protected function _validationHeader() {
        $headers_model = $this->getModel()->getFileHeader();
        $headers_post = $this->_header;
        $alias = self::HEADER_ALIAS;
        $valid = true;
        foreach ($headers_model as $id => $header_model) {

            if (isset($headers_post[$id])) {
                $header_post = self::process_header($headers_post[$id]);
            } else {
                $header_post = null;
            }
            $header_model = self::process_header($header_model);

            if ($header_post == $header_model || (isset($alias[$header_model]) && in_array($header_post, $alias[$header_model]))) {
                
            } else {
                $this->_addReport("error.header.{$id}", ['value' => $header_post, 'error' => 'カラム名が一致しません']);
                $this->ImportLog->log("ヘッダー{$id}列目\t{$header_post}\tカラム名が一致しません");
                $valid = false;
            }
        }

        if ($valid) {
            $count = count($headers_model);
            $this->ImportLog->log("ヘッダー\t{$count}項目\t正常");
            $this->_addReport('header.count', $count);
        }

        return $valid;
    }

    static function process_header($val) {
        return preg_replace('/[\s　]/u', '', $val);
    }

    protected function _readExcel() {
        $this->getExcel()->setActiveSheetIndex(0);
        $worksheet = $this->getExcel()->getActiveSheet();
        $controller = $this->getController();

        $this->_body = [];
        $this->_header = null;

        foreach ($worksheet->getRowIterator() as $rowId => $rowObj) {

            $rowArray = self::row2array($rowObj);

            if ($rowArray == null) {
                return false;
            }

            if (self::isRowEmpty($rowArray)) {
                continue;
            }

            if ($this->_header == null) {
                $this->_header = array_map([get_class($this), 'formatHeader'], $rowArray);
                continue;
            }

            $this->_body[] = $rowArray;
        }

        $controller->set(['header' => $this->_header, 'body' => $this->_body]);

        return true;
    }

    /**
     * エクセルオブジェクト初期化
     * @return boolean
     */
    protected function _initExcel() {
        $controller = $this->getController();
        $reader = PHPExcel_IOFactory::createReader($this->_format);
        //Excel
        try {
            if ($this->_format == 'CSV') {
                $reader->setInputEncoding('SJIS');
            }
            $this->_excel = $reader->load($this->_tmpFile);
        } catch (Exception $e) {
            $controller->Session->setFlash(__('File can not be read. Please confirm file type.', true));
            return false;
        }

        return true;
    }

    /**
     * postファイル名等取得
     */
    protected function _initFile() {
        $controller = $this->getController();

        if (empty($controller->data[$this->_modelName]['upfile']['name'])) {
            $controller->Session->setFlash(__('File is not uploaded.', true));
            return false;
        }

        $data = $controller->data[$this->_modelName]['upfile'];


        $this->_fileName = $data['name'];
        $this->_tmpFile = $data['tmp_name'];
        $this->_format = self::filename2ExcelFormat($this->_fileName);

        if (!file_exists($this->_tmpFile)) {
            $controller->Session->setFlash(__('File is not uploaded.', true));
            return false;
        }

        $this->log("modelname=" . var_export($this->_modelName, true), LOG_DEBUG);
        $this->log("data=" . var_export($controller->data, true), LOG_DEBUG);


        $this->_report = Set::insert($this->_report, 'file.name', $this->_fileName);
        $this->_report = Set::insert($this->_report, 'file.size', $data['size']);

        $this->ImportLog->log("ファイル {$this->_fileName}({$data['size']}byte) を読み込みました");

        $this->getController()->set('report', $this->_report);

        return true;
    }

    public static function row2array($row) {
        $tmp = array();
        $cellite = $row->getCellIterator();
        $cellite->setIterateOnlyExistingCells(false);
        foreach ($cellite as $cell) {
            if (!is_null($cell)) {
                try {
                    $string_value = (string) $cell->getCalculatedValue();
                } catch (Exception $e) {
                    return null;
                }
                $tmp[] = $string_value;
            } else {
                $tmp[] = "";
            }
        }

        return $tmp;
    }

    public static function isRowEmpty($row) {
        foreach ($row as $cell) {
            if (trim($cell) != "") {
                return false;
            }
        }
        return true;
    }

    public static function formatHeader($value) {
        $value = trim($value);
        $value = str_replace("\r", "", $value);
        $value = str_replace("\n", "", $value);
        return $value;
    }

}
?>  
