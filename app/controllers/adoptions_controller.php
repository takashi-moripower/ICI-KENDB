<?php

/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   Kendb 
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link	  none
 */

/**
 * AdoptionsController
 *
 * Long description for class (if any)...
 *
 * @category  None
 * @package   Kendb 
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
class AdoptionsController extends AppController {

    var $name = 'Adoptions';
    var $components = array('Search.Prg');
    var $uses = array('Adoption', 'SelectableItem', 'EditStatus', 'History', 'Researcher');

    /**
     * デフォルトのソート順
     *
     * @var array
     */
    var $paginate = array(
        'order' => array('Adoption.year' => 'desc', 'Adoption.id' => 'desc'),
    );

    /**
     * ACLチェック
     */
    var $check_action = array(
        "edit", "edit_node", "output_excel", "add", "add_node", "delete", "delete_all",
        "view", "index", "copy", "history_view", "restore", "output_csv",
    );

    /**
     * 検索＋ページングの際に保持しつづけるパラメータ
     *
     * @var array
     */
    var $presetVars = array(
        // 以下はページングの件数保持に利用する
        array('field' => 'limit', 'type' => 'value'),
        // 非表示データ切り替え
        array('field' => 'scope', 'type' => 'value'),
        // キーワード検索
        array('field' => 'keyword', 'type' => 'value'),
    );

    /**
     * beforeFilter()
     *
     * @return None
     */
    function beforeFilter() {
        parent::beforeFilter();

        // 非数値＆日付フィールド
        foreach ($this->Adoption->file_columns as $k => $v) {
            if (!in_array($v, $this->Adoption->numeric_search_field) && !in_array($v, $this->Adoption->date_columns)) {
                $this->presetVars[] = array('field' => $v, 'type' => 'value');
            }
        }
        // 数値フィールド
        foreach ($this->Adoption->numeric_search_field as $k => $v) {
            $this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
            $this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
        }
        // 日付フィールド
        foreach ($this->Adoption->date_columns as $k => $v) {
            $this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
            $this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
        }

        $this->set("title_for_layout", "科研費(文科・学振)");
        $year = $this->Adoption->getCurrentNendo();
        $this->crumbList = array(
            array(
                'ホーム',
                array('controller' => 'users', 'action' => 'index'),
                array()
            ),
            array(
                '科研費(文科・学振)',
                array('controller' => 'adoptions', 'action' => 'index', 'year:' . $year),
                array()
            )
        );
    }

    /**
     * 描画前の処理
     *
     * @return None
     */
    function beforeRender() {
        parent::beforeRender();
    }

    /**
     * データの表示条件を設定する
     *
     * @return None
     */
    private function _makeScope() {
        $scope = isset($this->passedArgs['scope']) ? $this->passedArgs['scope'] : "";

        if ($scope == "0" || $scope == "") {
            $result = "Adoption.disabled != true";
        } elseif ($scope == 1) {
            $result = "(Adoption.disabled = false or (Adoption.disabled = true and Adoption.hidden = false))";
        } else {
            $result = "";
        }
        if ($result) {
            $this->paginate['conditions'][] = $result;
        }
// version戻し。生年月日追加対応が来たらONする
//		$this->_addBirthYMDCondition('Adoption');
    }

    /**
     * 検索条件を作成
     *
     * @return None
     */
    private function _makeSearchCond() {
        $add = array("_f" => ">=", "_t" => "<=");
        // 数値フィールド部分
        foreach ($this->Adoption->numeric_search_field as $key => $value) {
            foreach ($add as $k2 => $v2) {
                $num = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : NULL;
                if (is_numeric($num)) {
                    $this->paginate['conditions'][] = $value . $v2 . $num;
                }
            }
        }
        // 日付フィールド部分
        foreach ($this->Adoption->date_columns as $key => $value) {
            foreach ($add as $k2 => $v2) {
                $val = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : NULL;
                if (!empty($val)) {
                    $this->paginate['conditions'][] = $value . $v2 . "'" . $val . "'";
                }
            }
        }
        $this->paginate['conditions'][] = $this->Adoption->parseCriteria($this->passedArgs);
        // $this->log($this->paginate['conditions'], LOG_DEBUG);
    }

    /**
     * Excelに一括出力する
     *
     * @return None
     */
    function output_excel() {
        $this->layout = null;
        $this->Adoption->recursive = -1;
        unset($this->passedArgs["limit"]);

        if (isset($this->passedArgs['keyword'])) {
            $this->Adoption->recursive = -1;
            $this->Prg->commonProcess();
            $this->paginate['conditions'] = $this->_make_easy_search_condition("Adoption");
            $this->log($this->paginate['conditions'], LOG_DEBUG);
        } else {
            $this->Prg->commonProcess();
            $this->_makeScope();
            $this->_makeSearchCond();
        }
        $this->paginate["limit"] = 65535;
        $rec = $this->paginate();
        if (count($rec) >= $this->excel_output_max_count) {
            $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : array('/');
            $this->Session->setFlash(__("Exceed Max Excel Record Count", true));
            return $this->redirect($url);
        }
        $format = $this->_getExcelFormat();         // app_controller.php
        $this->_makeExcelObject("Adoption", $rec, $format);
        return;
    }

    /**
     * CSVに一括出力する
     *
     * @return None
     */
    function output_csv() {
        $this->layout = null;
        unset($this->passedArgs["limit"]);

        if (isset($this->passedArgs['keyword'])) {
            $this->Adoption->recursive = -1;
            $this->Prg->commonProcess();
            $this->paginate['conditions'] = $this->_make_easy_search_condition("Adoption");
            // $this->log($this->paginate['conditions'], LOG_DEBUG);
        } else {
            $this->Prg->commonProcess();
            $this->_makeScope();
            $this->_makeSearchCond();
        }
        $this->paginate["limit"] = 65535;

        $this->_makeCSVObject(// app_controller.php
                "Adoption", $this->paginate());

        return;
    }

    /**
     * 一覧表示
     *
     * @return None
     */
    function index() {
        $this->_setPullDown();

        $current_editing = $this->EditStatus->getCurrentEditingIdList("Adoption");
        $this->set("current_editing", $current_editing);
        if (isset($this->passedArgs['keyword'])) {
            $this->Adoption->recursive = -1;
            $show_flat = 1;
            $this->Prg->commonProcess();
            $this->paginate['conditions'] = $this->_make_easy_search_condition("Adoption");
            $this->log($this->paginate['conditions'], LOG_DEBUG);
        } else {
            $this->Prg->commonProcess();
            $this->_makeScope();
            $this->_makeSearchCond();
        }
        $this->_makeLimit();
        $this->set('adoptions', $this->paginate());
        $this->set('urlparams', $this->_makePassArgsURLParam());
    }

    /**
     * 閲覧
     *
     * @param int $id データのID
     */
    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid adoption', true));
            $this->redirect(array('action' => 'index'));
        }
        $history_exists = $this->History->historyExists("Adoption", $id);
        $this->set("history_exists", $history_exists);
        $rec = $this->History->loadFromHistory("Adoption", $id);
        if ($rec) {
            $this->set('compare_adoption', $rec);
        } else {
            $this->set('compare_adoption', null);
        }
        $this->Adoption->recursive = 1;
        $this->set('adoption', $this->Adoption->read(null, $id));

        // 戻りURL
        $rtn = isset($_REQUEST["rtn"]) ? $_REQUEST["rtn"] : null;
        $this->set("rtn", $rtn);
    }

    /**
     * 最終保存データを閲覧する
     *
     * @param int $id データのID
     *
     * @return None
     *
     * @TODO リファクタリング。app_controllerに移動できないか検討
     */
    function history_view($id = null) {
        if ($id == null) {
            $this->cakeError("error404");
            return;
        }
        $rec = $this->History->loadFromHistory("Adoption", $id);
        $compare_rec = $this->Adoption->read(null, $id);
        $this->set("adoption", $rec);
        $this->set("compare_adoption", $compare_rec);
    }

    /**
     * 保存してある履歴データを復元する
     *
     * @param int $id 復元するデータのID
     *
     * @return None
     */
    function restore($id = null) {
        $this->log("復元開始 ID=" . $id, LOG_DEBUG);
        $this->_setPullDown();
        return $this->_restore("Adoption", $id);
    }

    /**
     * アップロード
     *
     * @return None
     */
    function upload() {
        $this->_upload("Adoption", "id");
    }

    /**
     * データ追加
     *
     * @return None
     */
    function add() {
        $this->_setPullDown();
        $this->_add("Adoption");
    }

    /**
     * コピーして新規データを作成する
     *
     * @param int $id コピー元データのID
     *
     * @return None
     */
    function copy($id = null) {
        $this->_setPullDown();
        return $this->_copy("Adoption", $id);
    }

    /**
     * データ編集
     *
     * @param int $id データのID
     *
     * @return None
     */
    function edit($id = null) {
        $this->_setPullDown();
        $this->Adoption->recursive = 1;
        $this->set('adoption', $this->Adoption->findById($id));

        return $this->_edit("Adoption", $id);
    }

    /**
     * データ削除
     *
     * @param int $id データのID
     *
     * @return None
     */
    function delete($id = null) {
        return $this->_delete("Adoption", $id);
    }

    /**
     * 一括削除
     *
     */
    function delete_all() {
        return $this->_delete_all("Adoption");
    }

    /**
     * 検索ボックス作成
     *
     * @return None
     */
    function search_box() {
        $this->layout = "ajax";
        $this->_setPullDown();
        $search_param = @$this->params["named"]["search_param"];
        if (!in_array($search_param, array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9))) {
            $search_param = 0;
        }
        $this->set(compact("search_param"));
        $this->Prg->commonProcess();
    }

    /**
     * 研究者情報をまとめて更新する
     *
     * @return None
     */
    function update_researcher() {
        if (!empty($this->data)) {
            $this->Adoption->setCooperateNo();
            $this->_updateResearcher("Adoption");
            $this->redirect("index/year:" . $this->Adoption->getCurrentNendo());
        } else {
            $this->_prepareUpdateResearcher("Adoption");
        }
    }

}

?>
