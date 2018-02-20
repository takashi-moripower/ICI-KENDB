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
class ResearchersController extends AppController
{

	var $name = 'Researchers';
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
		"index", "output_excel", "upload", "view"
	);

	/**
	 * アクション直前の処理
	 *
	 * @return None
	 */
	function beforeFilter()
	{
		parent::beforeFilter();

		foreach ($this->Researcher->filterArgs as $k => $v) {
			$this->presetVars[] = array('field' => $v["name"], 'type' => 'value');
		}
		$this->log($this->presetVars, LOG_DEBUG);


		$this->set("title_for_layout", "研究者情報");
		$this->crumbList = array(
			array(
				'ホーム',
				array('controller' => 'users', 'action' => 'index'),
				array()
			),
			array(
				'研究者情報',
				array('controller' => 'researchers', 'action' => 'index'),
				array()
			)
		);
		// JSON形式で応答する
		if ($this->RequestHandler->isAjax()) {
			if ($this->action == 'getJson') {
				Configure::write('debug', 0);
				$this->RequestHandler->setContent('json');
				$this->RequestHandler->respondAs('application/json; charset=UTF-8');
			}
		}
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
		$this->paginate['conditions'][] = $this->Researcher->parseCriteria($this->passedArgs);
	}

	/**
	 * 研究者情報一覧
	 *
	 * @return None
	 */
	function index()
	{
		$this->Researcher->recursive = 0;
		$this->Prg->commonProcess();
		$this->_makeSearchCond();
		$this->set('researchers', $this->paginate());
		$this->set('urlparams', $this->_makePassArgsURLParam());
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
		$this->set('researcher', $this->Researcher->read(null, $id));
	}

	/**
	 * ファイルをアップロードして研究者データを登録する
	 * 
	 * @return None
	 */
	function upload()
	{
		if (!empty($this->data)) {
			$message = "";
			$error_message = array();
			//$this->_registerUploadFile("Researcher", "researcher_no", $message, $error_message);
			$this->_registerUploadFile("Researcher", "id", $message, $error_message);
			$this->set("message", $message);
			$this->set("error_message", $error_message);
			$this->render("upload_result");
		} else {
			// get
		}
	}

	/**
	 * JSON形式で出力する
	 *
	 * @param string $researcher_no 研究者番号
	 *
	 * @return None
	 */
	function getJson($researcher_no = "")
	{
		$this->layout = "ajax";
		if (!$this->RequestHandler->isAjax()) {
			//$this->cakeError('error404');
		}
		$this->Researcher->switchPrimaryKey();
		$rec = $this->Researcher->read(null, $researcher_no);
		$this->set('Researcher', $rec['Researcher']);
	}

	/**
	 * JSON形式で出力する
	 *
	 * @param string $cooperate_no 東工大連携ID
	 *
	 * @return None
	 */
	function getJsonByCooperateNo($cooperate_no = "")
	{
		$this->layout = "ajax";
		if (!$this->RequestHandler->isAjax()) {
			;
		}
		$rec = $this->Researcher->findByCooperateNo($cooperate_no);
		$this->set('Researcher', $rec['Researcher']);
	}



	/**
	 * idをキーにして研究者情報を取得する
	 * 
	 * @param int $id ユーザーID
	 *
	 * @return None
	 */
	function getJsonById($id = "")
	{
		$this->layout = "ajax";
		if (!$this->RequestHandler->isAjax()) {
			//$this->cakeError('error404');
		}
		//$this->Researcher->switchPrimaryKey();
		$rec = $this->Researcher->read(null, $id);
		$this->set('Researcher', $rec['Researcher']);
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
		$this->Researcher->recursive = 0;
		$this->Prg->commonProcess();
		$rec = $this->paginate();
		// $rec = $this->Researcher->find("all");
		$format = $this->_getExcelFormat();
		$this->_makeExcelObject("Researcher", $rec, $format);
		return;
	}

	/**
	 * Ajaxでユーザー名を引数に検索し、該当データをjsonで応答する
	 *
	 * @return None
	 */
	function ajax_search($prefix = null) {
		$this->layout = "ajax";
		Configure::write("debug", 0);
		$key = @$this->params['form']['researcher_name'];
		$key = mb_convert_kana($key, "C", "UTF-8");

		$conditions = array("or" => array(
			"Researcher.researcher_name like" => "%".$key."%",
			"Researcher.kana like" => "%".$key."%",
		));
		$this->Researcher->recursive = 0;
		$rec = $this->Researcher->find('all', array("conditions" => $conditions));
		$this->log($rec, LOG_DEBUG);
		$this->set('prefix', h($prefix));
		$this->set('researchers', $rec);
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
		$message = "";
		$error_message = array();

		$upload_header = array();
		$body = array();
		// ファイル名からファイル形式を取得
		$format = $this->_filename2ExcelFormat(@$this->data[$modelname]['upfile']['name']);
		$filename = @$this->data[$modelname]['upfile']['tmp_name'];
		$ret = $this->_processExcel($filename, $upload_header, $body, $format);
		if (!$ret) {
			$message = __('File is not uploaded.', true);
			return false;
		}
		$proper_header = $this->$modelname->getFileHeader();

		$header_is_same = $this->_headerEquals($proper_header, $upload_header);
		$old_format = false;

		if (!$header_is_same) {
			// 新形式（院コード/系コード/コースコードを追加した形式）でヘッダのエラーが発生した場合、旧形式に適応しているか確認
			$old_proper_header = $this->$modelname->getOldFileHeader();
			$header_is_same = $this->_headerEquals($old_proper_header, $upload_header);
			if (!$header_is_same) {
				$this->log(array_diff($proper_header, $upload_header), LOG_INFO);
				$message
					= __('There is no header record or does not match column count.', true);
				return false;
			}
			$old_format = true;
		}

		$success_count = 0;
		$line = 0;
		$rollback = false;
		$registered_ids = array();

		$this->$modelname->begin();
		// 全件入れ替えなので一回削除。ただし　TRUCATEだとTRANSACTIONが効かないので普通に消す
		$this->$modelname->query("DELETE FROM researchers");
		foreach ($body as $item) {
			$line++;
			if ($old_format) {
				$item = $this->$modelname->changeNewFormat($item);
			}
			$tmp = $this->$modelname->columns2data($item, $modelname);
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
