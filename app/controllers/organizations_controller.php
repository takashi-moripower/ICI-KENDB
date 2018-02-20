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
 * AppController
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
class OrganizationsController extends AppController
{

	var $name = 'Organizations';
	var $crumbList = array();
	var $components = array('RequestHandler', 'Search.Prg');

	/**
	 * 検索＋ページングの際に保持しつづけるパラメータ
	 *
	 * @var array
	 */
	var $presetVars = array(
		// 以下はページングの件数保持に利用する
		array('field' => 'limit', 'type' => 'value'),
	);

	/**
	 * ACLチェック
	 */
	var $check_action = array(
		"edit", "index", "output_excel", "output_csv", "upload", "view"
	);

	/**
	 * アクション直前の処理
	 *
	 * @return None
	 */
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->set("title_for_layout", "組織テーブル");
		$this->crumbList = array(
			array(
				'ホーム',
				array('controller' => 'admin/users', 'action' => 'index'),
				array()
			),
			array(
				'組織テーブル',
				array('controller' => 'organizations', 'action' => 'index'),
				array()
			)
		);
	}

	/**
	 * 描画前の処理
	 *
	 * @return None
	 */
	function beforeRender()
	{
		parent::beforeRender();
		
		$item = "";
		switch ($this->action) {
		case "edit":
			$item = "編集";
			break;
		case "add":
			$item = "追加";
			break;
		case "delete":
			$item = "削除";
			break;
		case "upload":
			$item = "一括アップロード";
			break;
		case "view":
			$item = "詳細";
			break;
		}
		if ($item) {
			$current = array(
				$item,
				array(),
				array(),
			);
			array_push($this->crumbList, $current);
		}
		$this->set("crumbList", $this->crumbList);
	}

	/**
	 * 検索条件を作成
	 *
	 * @return None
	 */
	private function _makeSearchCond()
	{
	}

	/**
	 * 組織テーブル一覧
	 *
	 * @return None
	 */
	function index()
	{
		$this->Organization->recursive = 0;
		$this->Prg->commonProcess();
		$this->paginate['limit'] = 10;
		$organizations = $this->paginate();
		$view_organizations = array();
		foreach ($organizations as $organization) {
			$organization['Organization'][view_classifier] = $this->Organization->classifierToView($organization['Organization']['classifier']);
			$view_organizations[] = $organization;
		}
		$this->set('organizations', $view_organizations);
	}

	/**
	 * 詳細を見る
	 *
	 * @param int $id ID
	 *
	 * @return None
	 */
	function view($id = null)
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid researcher', true));
			$this->redirect(array('action' => 'index'));
		}
		$organization = $this->Organization->read(null, $id);
		$organization['Organization'][view_classifier] = $this->Organization->classifierToView($organization['Organization']['classifier']);
		$this->set('organization', $organization);
	}

	function edit($id = null)
	{
		$this->_setPullDown();
		$this->Organization->recursive = 1;
		$this->set('organization', $this->Organization->findById($id));

		return $this->_edit("Organization", $id);
	}

	function upload()
	{
		if (!empty($this->data)) {
			$message = "";
			$error_message = array();
			$this->_registerUploadFile("Organization", "id", $message, $error_message);
			$this->set("message", $message);
			$this->set("error_message", $error_message);
			$this->render("upload_result");
		} else {
			// get
		}
	}

	/**
	 * Excelに一括出力する
	 *
	 * @return None
	 */
	function output_excel()
	{
		$this->layout = null;
		unset($this->passedArgs["limit"]);
		$this->paginate["limit"] = 3000;
		$this->_makeSearchCond();
		$this->Organization->recursive = 0;
		$this->Prg->commonProcess();
		$rec_list = $this->paginate();
		$rec = array();
		foreach ($rec_list as $rec_data) {
			$rec_data['Organization'][classifier] = $this->Organization->classifierToView($rec_data['Organization']['classifier']);
			$rec[] = $rec_data;
		}
		$format = $this->_getExcelFormat();
		$this->_makeExcelObject("Organization", $rec, $format);
		return;
	}


	/**
	 * CSVに一括出力する
	 *
	 * @return None
	 */
	function output_csv()
	{
		$this->layout = null;
		unset($this->passedArgs["limit"]);
		$this->paginate["limit"] = 65535;
		$this->_makeSearchCond();
		$this->Organization->recursive = 0;
		$this->Prg->commonProcess();
		$rec_list = $this->paginate();
		$rec = array();
		foreach ($rec_list as $rec_data) {
			$rec_data['Organization'][classifier] = $this->Organization->classifierToView($rec_data['Organization']['classifier']);
			$rec[] = $rec_data;
		}
		$format = $this->_getExcelFormat();
		$this->_makeCSVObject("Organization", $rec);
		return;
	}

	/**
	 * ファイル名からエクセルファイルの形式を取得する
	 *
	 * 継承せず独自実装する(CSV判定を追加)
	 *
	 * @param string $filename ファイル名
	 * 
	 * @return string ファイル形式
	 */
	function _filename2ExcelFormat($filename)
	{
		$file_info = pathinfo($filename);
		$extension = @$file_info['extension'];
		$this->log("ファイル名は" . $filename . " 拡張子は" . $extension, LOG_DEBUG);

		if (strtolower($extension) == "xlsx") {
			return "Excel2007";
		} else if (strtolower($extension) == "csv") {
			return "CSV";
		} else {
			return "Excel5";
		}
	}

	/**
	 * CSVファイルを読み込み、ヘッダーと本体を解析する
	 *
	 * @param string $filename 読み込むファイル名
	 * @param array  &$header  ヘッダー部
	 * @param array  &$body	データ本体部
	 * 
	 * @return <type>
	 */
	function _processCSV($filename, &$header, &$body)
	{
		ini_set("max_execution_time", 0);
		$format = 'CSV';

		App::import('vendor', 'phpexcel/phpexcel');

		if (empty($filename) || !file_exists($filename)) {
			$this->Session->setFlash(__('File is not uploaded.', true));
			return false;
		}
		//Excel
		$reader = PHPExcel_IOFactory::createReader($format);
		try {
			$reader->setInputEncoding('SJIS');
			$objExcel = $reader->load($filename);
		} catch (Exception $e) {
			$this->Session->setFlash(__('File can not be read. Please confirm file type.', true));
			return false;
		}
		$objExcel->setActiveSheetIndex(0);
		$worksheet = $objExcel->getActiveSheet();

		foreach ($worksheet->getRowIterator() as $row) {
			$tmp = array();
			$cellite = $row->getCellIterator();
			$cellite->setIterateOnlyExistingCells(false);
			foreach ($cellite as $cell) {
				if (!is_null($cell)) {
					try {
						$string_value = (string) $cell->getCalculatedValue();
					} catch(Exception $e) {
						$this->Session->setFlash("CSVファイルの値を取得できません。外部参照等が無いか確認してください");
						return false;
					}
					$tmp[] = $string_value;
				} else {
					$tmp[] = "";
				}
			}
			if (1 == $row->getRowIndex()) {
				for ($i = 0; $i < count($tmp); $i++) {
					$str = $tmp[$i];
					$str = str_replace("\r", "", $str);
					$str = str_replace("\n", "", $str);
					$str = trim($str);
					$tmp[$i] = $str;
				}
				$header = $tmp;
			} else {
		// もし行が空白のみならスキップする
		$is_empty_line = true;
		foreach ($tmp as $tmp_item) {
			if (trim($tmp_item) != "") {
			$is_empty_line = false;
			}
		}
		if(!$is_empty_line) {
					$body[] = $tmp;
		} else {
			$this->log("空行なので登録をスキップします", LOG_DEBUG);
		}
			}
		}
		return true;
	}

	/**
	 * アップロードされたExcelファイルを処理する
	 *
	 * 継承せず独自実装する
	 *
	 * @param string $modelname	  モデル名
	 * @param string $primaryKey	 プライマリキー
	 * @param string &$message	   メッセージ
	 * @param string &$error_message エラーの場合のメッセージ
	 *
	 * @return boolean
	 */
	function _registerUploadFile($modelname, $primaryKey, &$message, &$error_message)
	{
		App::import('Model', 'Researcher');
		$Researcher = new Researcher();

		$message = "";
		$error_message = array();

		$upload_header = array();
		$body = array();
		// ファイル名からファイル形式を取得
		$format = $this->_filename2ExcelFormat(@$this->data[$modelname]['upfile']['name']);
		$filename = @$this->data[$modelname]['upfile']['tmp_name'];

		if (strcmp('CSV', $format) !== 0) {
			$ret = $this->_processExcel($filename, $upload_header, $body, $format);
		} else {
			$ret = $this->_processCSV($filename, $upload_header, $body);
		}
		if (!$ret) {
			$message = __('File is not uploaded.', true);
			return false;
		}
		$proper_header = $this->$modelname->getFileHeader();

		$header_is_same = $this->_headerEquals($proper_header, $upload_header);

		if (!$header_is_same) {
			$this->log(array_diff($proper_header, $upload_header), LOG_INFO);
			$message
				= __('There is no header record or does not match column count.', true);
			return false;
		}

		$success_count = 0;
		$line = 0;
		$rollback = false;
		$registered_ids = array();

		$this->$modelname->begin();
		// 全件入れ替えなので一回削除。ただし　TRUCATEだとTRANSACTIONが効かないので普通に消す
		$this->$modelname->query("DELETE FROM organizations");
		foreach ($body as $item) {
			$line++;
			$tmp = $this->$modelname->columns2data($item, $modelname);
			$researcher_rec = $Researcher->findByPersonalNo($tmp[$modelname]['personal_no']);
			if (!empty($researcher_rec)) {
			    $tmp[$modelname]['researcher_id'] = $researcher_rec['Researcher']['id'];
			} else {
				$tmp[$modelname]['researcher_id'] = null;
			}
			$this->data[$modelname] = $tmp[$modelname];
			$this->$modelname->create();
			$create = true;
			if (!$this->$modelname->save($this->data)) {
				$error_message[] = array(
					"line" => $line + 1,
					"error" => $this->validateErrors($this->$modelname),
				);
				$this->log($this->validateErrors($this->$modelname), LOG_DEBUG);
			} else {
				$last_id = $this->$modelname->getLastInsertID();
				// 更新したID
				$registered_ids[] = $last_id;
				$success_count++;
				$this->log("登録成功件数：" . $success_count, LOG_DEBUG);
			}
		}
		if ($line - $success_count >= Configure::read('Upload.stop_count')) {
			$rollback = true;
			$this->$modelname->rollback();
			$registered_ids = array();
		} else {
			$this->$modelname->commit();
		}

		if ($rollback) {
			$message
				= sprintf(__('Total %d records. %d records are invalid! rollback', true), $line, $line - $success_count);
			return false;
		} else {
			if ($line - $success_count == 0) {
				$message
					= sprintf(__('Total %d records. %d records have been imported!', true), $line, $success_count);
			} else {
				$message
					= sprintf(__('Total %d records. %d records have been imported. but %d records failed to insert or update.', true), $line, $success_count, $line - $success_count);
			}
		}
		return $registered_ids;
	}
}

?>
