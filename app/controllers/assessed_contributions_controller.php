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
 * AssessedContributionsController
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
class AssessedContributionsController extends AppController
{

	var $name = 'AssessedContributions';
	var $components = array('Search.Prg');
	var $uses = array('AssessedContribution', 'SelectableItem', 'EditStatus', 'History', 'Researcher');
	/**
	 * デフォルトのソート順
	 *
	 * @var array
	 */
	var $paginate = array(
		'order' => array('AssessedContribution.year' => 'desc', 'AssessedContribution.id' => 'desc'),
	);
	/**
	 * ACLチェック
	 */
	var $check_action = array(
		"edit", "edit_node", "output_excel", "add", "add_node", "delete", "delete_all",
		"view", "index", "copy", "history_view", "restore", "output_csv"
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
	function beforeFilter()
	{
		parent::beforeFilter();

		// 非数値＆日付フィールド
		foreach ($this->AssessedContribution->file_columns as $k => $v) {
			if (!in_array($v, $this->AssessedContribution->numeric_search_field) && !in_array($v, $this->AssessedContribution->date_columns)) {
				$this->presetVars[] = array('field' => $v, 'type' => 'value');
			}
		}
		// 数値フィールド
		foreach ($this->AssessedContribution->numeric_search_field as $k => $v) {
			$this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
			$this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
		}
		// 日付フィールド
		foreach ($this->AssessedContribution->date_columns as $k => $v) {
			$this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
			$this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
		}

		$this->set("title_for_layout", "科研費分担金(文科・学振)");
		$year = $this->AssessedContribution->getCurrentNendo();
		$this->crumbList = array(
			array(
				'ホーム',
				array('controller' => 'users', 'action' => 'index'),
				array()
			),
			array(
				'科研費分担金(文科・学振)',
				array('controller' => 'assessed_contributions', 'action' => 'index', 'year:' . $year),
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
	}

	/**
	 * データの表示条件を設定する
	 *
	 * @return None
	 */
	private function _makeScope()
	{
		$scope = isset($this->passedArgs['scope']) ? $this->passedArgs['scope'] : "";

		if ($scope == "0" || $scope == "") {
			$result = "AssessedContribution.disabled != true";
		} elseif ($scope == 1) {
			$result = "(AssessedContribution.disabled = false or (AssessedContribution.disabled = true and AssessedContribution.hidden = false))";
		} else {
			$result = "";
		}
		if ($result) {
			$this->paginate['conditions'][] = $result;
		}
	}

	/**
	 * 検索条件を作成
	 *
	 * @return None
	 */
	private function _makeSearchCond()
	{
		$add = array("_f" => ">=", "_t" => "<=");
		// 数値フィールド部分
		foreach ($this->AssessedContribution->numeric_search_field as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$num = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : null;
				if (is_numeric($num)) {
					$this->paginate['conditions'][] = $value . $v2 . $num;
				}
			}
		}
		// 日付フィールド部分
		foreach ($this->AssessedContribution->date_columns as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$val = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : null;
				if (!empty($val)) {
					$this->paginate['conditions'][] = $value . $v2 . "'" . $val . "'";
				}
			}
		}

		$this->paginate['conditions'][] = $this->AssessedContribution->parseCriteria($this->passedArgs);
		// $this->log($this->paginate['conditions'], LOG_DEBUG);
	}

	/**
	 * Excelに一括出力する
	 *
	 * @return None
	 */
	function output_excel()
	{
		$this->layout = null;
		$this->AssessedContribution->recursive = -1;
		unset($this->passedArgs["limit"]);
		if(isset($this->passedArgs['keyword'])) {
			$this->AssessedContribution->recursive = -1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("AssessedContribution");
			$this->log($this->paginate['conditions'], LOG_DEBUG);
		} else {
			$this->AssessedContribution->recursive = 1;
			$this->Prg->commonProcess();
			$this->_makeScope();
			$this->_makeSearchCond();
		}
		$this->paginate["limit"] = 65535;
		$rec = $this->paginate();
		if (count($rec) >= $this->excel_output_max_count) {
			$url = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : array('/') ;
			$this->Session->setFlash(__("Exceed Max Excel Record Count", true));
			return $this->redirect($url);
		}
		$format = $this->_getExcelFormat();
		$this->_makeExcelObject("AssessedContribution", $rec, $format);
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
		$this->AssessedContribution->recursive = -1;
		unset($this->passedArgs["limit"]);
		if(isset($this->passedArgs['keyword'])) {
			$this->AssessedContribution->recursive = -1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("AssessedContribution");
			$this->log($this->paginate['conditions'], LOG_DEBUG);
		} else {
			$this->AssessedContribution->recursive = 1;
			$this->Prg->commonProcess();
			$this->_makeScope();
			$this->_makeSearchCond();
		}
		$this->paginate["limit"] = 65535;
		$rec = $this->paginate();
		$this->log($rec, LOG_DEBUG);
		$format = $this->_getExcelFormat();
		$this->_makeCSVObject("AssessedContribution", $rec);
		return;
	}

	/**
	 * 一覧表示
	 *
	 * @return None
	 */
	function index()
	{
		$this->_setPullDown();

		$current_editing = $this->EditStatus->getCurrentEditingIdList("AssessedContribution");
		$this->set("current_editing", $current_editing);

		if(isset($this->passedArgs['keyword'])) {
			$this->AssessedContribution->recursive = -1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("AssessedContribution");
			$this->log($this->paginate['conditions'], LOG_DEBUG);
		} else {
			$this->AssessedContribution->recursive = 1;
			$this->Prg->commonProcess();
			$this->_makeScope();
			$this->_makeSearchCond();
		}
		$this->_makeLimit();
		$this->set('assessedContributions', $this->paginate());
		$this->set('urlparams', $this->_makePassArgsURLParam());
	}

	/**
	 * 閲覧
	 *
	 * @param int $id データのID
	 */
	function view($id = null)
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid assessedContribution', true));
			$this->redirect(array('action' => 'index'));
		}
		$history_exists = $this->History->historyExists("AssessedContribution", $id);
		$this->set("history_exists", $history_exists);
		$rec = $this->History->loadFromHistory("AssessedContribution", $id);
		if ($rec) {
			$this->set('compare_assessedContribution', $rec);
		} else {
			$this->set('compare_assessedContribution', null);
		}
		$this->AssessedContribution->recursive = 1;
		$this->set('assessedContribution', $this->AssessedContribution->read(null, $id));

		// 戻りURL
		$rtn = isset($_REQUEST["rtn"]) ? $_REQUEST["rtn"] :  null;
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
	function history_view($id = null)
	{
		if ($id == null) {
			$this->cakeError("error404");
			return;
		}
		$rec = $this->History->loadFromHistory("AssessedContribution", $id);
		$compare_rec = $this->AssessedContribution->read(null, $id);
		$this->set("assessedContribution", $rec);
		$this->set("compare_assessedContribution", $compare_rec);
	}

	/**
	 * 保存してある履歴データを復元する
	 *
	 * @param int $id 復元するデータのID
	 *
	 * @return None
	 */
	function restore($id = null)
	{
		$this->log("復元開始 ID=" . $id, LOG_DEBUG);
		$this->_setPullDown();
		return $this->_restore("AssessedContribution", $id);
	}

	/**
	 * アップロード
	 *
	 * @return None
	 */
	function upload()
	{
		$this->_upload("AssessedContribution", "id");
	}

	/**
	 * データ追加
	 *
	 * @return None
	 */
	function add()
	{
		$this->_setPullDown();
		$this->_add("AssessedContribution");
	}

	/**
	 * コピーして新規データを作成する
	 *
	 * @param int $id コピー元データのID
	 *
	 * @return None
	 */
	function copy($id = null)
	{
		$this->_setPullDown();
		return $this->_copy("AssessedContribution", $id);
	}

	/**
	 * データ編集
	 *
	 * @param int $id データのID
	 *
	 * @return None
	 */
	function edit($id = null)
	{
		$this->_setPullDown();
		$this->AssessedContribution->recursive = 1;
		$this->set('assessedContribution', $this->AssessedContribution->findById($id));

		return $this->_edit("AssessedContribution", $id);
	}

	/**
	 * データ削除
	 *
	 * @param int $id データのID
	 *
	 * @return None
	 */
	function delete($id = null)
	{
		return $this->_delete("AssessedContribution", $id);
	}

	/**
	 * 一括削除
	 *
	 */
	function delete_all()
	{
		return $this->_delete_all("AssessedContribution");
	}

	/**
	 * 検索ボックス作成
	 *
	 * @return None
	 */
	function search_box()
	{
		$this->layout = "ajax";
		$this->_setPullDown();
		$search_param = @$this->params["named"]["search_param"];
		if (!in_array($search_param, array(0, 1, 2, 3, 4, 5, 6, 7))) {
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
	function update_researcher()
	{
		if (!empty($this->data)) {
			$this->AssessedContribution->setCooperateNo();
			$this->_updateResearcher("AssessedContribution");
			$this->redirect("index/year:" .$this->AssessedContribution->getCurrentNendo());
		} else {
			$this->_prepareUpdateResearcher("AssessedContribution");
		}
	}
}
?>
