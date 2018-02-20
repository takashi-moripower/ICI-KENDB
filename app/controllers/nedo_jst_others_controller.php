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
 * NedoJstOthersController
 *
 * NEDO/JST/その他
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
class NedoJstOthersController extends AppController
{

	var $name = 'NedoJstOthers';
	var $components = array('Search.Prg');
	var $uses = array('NedoJstOther', 'NedoJstOtherNode', 'SelectableItem', 'EditStatus', 'History');
	/**
	 * NEDOのデータ
	 * 
	 * @var NedoJstOther
	 */
	var $NedoJstOther;
	/**
	 * デフォルトのソート順
	 *
	 * @var array
	 */
	var $paginate = array(
		'order' => array('NedoJstOther.year' => 'desc', 'NedoJstOther.id' => 'desc'),
		'conditions' => array('NedoJstOther.nedo_jst_other_id' => null),
	);
	/**
	 * ACLチェック
	 */
	var $check_action = array(
		"edit", "edit_node", "output_excel", "add", "add_node", "delete", "delete_all",
		"view", "index", "copy", "history_view", "restore", "manage",
		"output_csv",
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
		// 検索対象
		array('field' => 'show_flat', 'type' => 'value'),
		// キーワード検索
		array('field' => 'keyword', 'type' => 'value'),
	);

	/**
	 * ページ処理開始前の処理
	 *
	 * @return None
	 */
	function beforeFilter()
	{
		parent::beforeFilter();

		// 非数値＆日付フィールド
		foreach ($this->NedoJstOther->file_columns as $k => $v) {
			if (!in_array($v, $this->NedoJstOther->numeric_search_field) && !in_array($v, $this->NedoJstOther->date_columns)) {
				$this->presetVars[] = array('field' => $v, 'type' => 'value');
			}
		}
		// 数値フィールド
		foreach ($this->NedoJstOther->numeric_search_field as $k => $v) {
			$this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
			$this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
		}
		// 日付フィールド
		foreach ($this->NedoJstOther->date_columns as $k => $v) {
			$this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
			$this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
		}


		$this->set("title_for_layout", "受託研究(政府系)");
		$year = $this->NedoJstOther->getCurrentNendo();
		$this->crumbList = array(
			array(
				'ホーム',
				array('controller' => 'users', 'action' => 'index'),
				array()
			),
			array(
				'受託研究(政府系)',
				array('controller' => 'nedo_jst_others', 'action' => 'index', 'year:' . $year),
				array()
			)
		);
	}

	/**
	 * プルダウンの要素を作成する
	 *
	 * @return None
	 */
	function _setPullDown()
	{
		$column = array("area_of_research", "ordering_organization_type",
			"functions_manual", "asset_belongingness");
		foreach ($column as $v) {
			$listval = $this->SelectableItem->makeRealValueList("NedoJstOther", $v);
			$this->set($v, $listval);
		}
	}

	/**
	 * 検索の際の表示条件を作成する
	 *
	 * @return None
	 */
	function _makeScope()
	{
		$scope = isset($this->passedArgs['scope']) ? $this->passedArgs['scope'] : "";

		if ($scope == "0" || $scope == "") {
			$result = "NedoJstOther.disabled != 1";
		} elseif ($scope == 1) {
			$result = "(NedoJstOther.disabled = false or (NedoJstOther.disabled = true and NedoJstOther.hidden = false))";
		} else {
			$result = "";
		}
		if ($result) {
			$this->paginate['conditions'][] = $result;
		}
	}

	/**
	 * 検索の際の条件を作成する
	 *
	 * @return None
	 */
	function _makeSearchCond()
	{
		$add = array("_f" => ">=", "_t" => "<=");
		// 数値フィールド部分
		foreach ($this->NedoJstOther->numeric_search_field as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$num = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : null;
				if (is_numeric($num)) {
					$this->paginate['conditions'][] = $value . $v2 . $num;
				}
			}
		}
		// 日付フィールド部分
		foreach ($this->NedoJstOther->date_columns as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$val = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : null;
				if (!empty($val)) {
					$this->paginate['conditions'][] = $value . $v2 . "'" . $val . "'";
				}
			}
		}

		$this->paginate['conditions'][] = $this->NedoJstOther->parseCriteria($this->passedArgs);
		// $this->log($this->paginate['conditions'], LOG_DEBUG);
	}

	/**
	 * 子データのみ検索するか親データも検索するかを決定する
	 */
	function _makeSearchPattern() {
		// 検索方法
		$show_flat = isset($this->passedArgs['show_flat']) ? $this->passedArgs['show_flat'] : 0;
		if ($show_flat == 1) {
			$this->NedoJstOther->recursive = -1;
			unset($this->paginate['conditions']['NedoJstOther.nedo_jst_other_id']);
		} else {
			$this->NedoJstOther->recursive = 1;
		}
		return $show_flat;
	}


	/**
	 * Excelに一括出力する
	 *
	 * @return None
	 */
	function output_excel()
	{
		$this->layout = null;
		// $this->NedoJstOther->recursive = 1;
		$this->_makeSearchPattern();
		unset($this->passedArgs["limit"]);
		if(isset($this->passedArgs['keyword'])) {
			$this->NedoJstOther->recursive = -1;
			$show_flat = 1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("NedoJstOther");
			$this->log($this->paginate['conditions'], LOG_DEBUG);
		} else {
			$this->Prg->commonProcess();
			$this->_makeScope();
			$this->_makeSearchCond();
		}
		$this->paginate["limit"] = 65535;
		$rec = $this->paginate();
		// 子ノード含めてリスト化
		$rec2 = array();
		foreach ($rec as $item) {
			$rec2[]["NedoJstOther"] = $item["NedoJstOther"];
			if(isset($item["NedoJstOtherNode"]) && is_array($item["NedoJstOtherNode"]) && count($item["NedoJstOtherNode"]) >= 2) {
				foreach ($item["NedoJstOtherNode"] as $item2) {
					$rec2[]["NedoJstOther"] = $item2;
				}
			}
		}
		if (count($rec2) >= $this->excel_output_max_count) {
			$url = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : array('/') ;
			$this->Session->setFlash(__("Exceed Max Excel Record Count", true));
			return $this->redirect($url);
		}

		$format = $this->_getExcelFormat();
		$this->_makeExcelObject("NedoJstOther", $rec2, $format);
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
		$this->_makeSearchPattern();
		// $this->NedoJstOther->recursive = 1;
		unset($this->passedArgs["limit"]);
		if(isset($this->passedArgs['keyword'])) {
			$this->NedoJstOther->recursive = -1;
			$show_flat = 1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("NedoJstOther");
			$this->log($this->paginate['conditions'], LOG_DEBUG);
		} else {
			$this->Prg->commonProcess();
			$this->_makeScope();
			$this->_makeSearchCond();
		}
		$this->paginate["limit"] = 65535;
		$rec = $this->paginate();
		// 子ノード含めてリスト化
		$rec2 = array();
		foreach ($rec as $item) {
			$rec2[]["NedoJstOther"] = $item["NedoJstOther"];
			if(isset($item["NedoJstOtherNode"]) && is_array($item["NedoJstOtherNode"]) && count($item["NedoJstOtherNode"]) >= 2) {
				foreach ($item["NedoJstOtherNode"] as $item2) {
					$rec2[]["NedoJstOther"] = $item2;
				}
			}
		}
		$this->_makeCSVObject("NedoJstOther", $rec2);
		return;
	}


	/**
	 * データ一覧を表示する
	 *
	 * @return None
	 */
	function index()
	{
		$this->_setPullDown();

		$current_editing = $this->EditStatus->getCurrentEditingIdList("NedoJstOther");
		$this->set("current_editing", $current_editing);
		if(isset($this->passedArgs['keyword'])) {
			$this->NedoJstOther->recursive = -1;
			$show_flat = 1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("NedoJstOther");
			$this->log($this->paginate['conditions'], LOG_DEBUG);
		} else {
			$show_flat = $this->_makeSearchPattern();
			$this->Prg->commonProcess();
			$this->_makeScope();
			$this->_makeSearchCond();
		}
		$this->_makeLimit();
		$this->set('nedoJstOthers', $this->paginate());
		$this->set('urlparams', $this->_makePassArgsURLParam());
		$this->set('show_flat', $show_flat);
	}

	/**
	 * データを閲覧する
	 *
	 * @param int $id データのID
	 *
	 * @return None
	 */
	function view($id = null)
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid nedo jst other', true));
			$this->redirect(array('action' => 'index'));
		}

		// データ取得
		$this->NedoJstOther->recursive = 1;
		$data = $this->NedoJstOther->read(null, $id);

		// 子ノードが1つだけの場合、子ノード編集画面へ転送
		if (array_key_exists('NedoJstOtherNode', $data) && 1 == count($data["NedoJstOtherNode"])) {
			return $this->redirect(array('action' => 'view_node', $data["NedoJstOtherNode"][0]["id"], $this->_makeReturnURLQuery()));
		}

		$history_exists = $this->History->historyExists("NedoJstOther", $id);
		$this->set("history_exists", $history_exists);
		$rec = $this->History->loadFromHistory("NedoJstOther", $id);
		if ($rec) {
			$this->set('compare_nedoJstOther', $rec);
		} else {
			$this->set('compare_nedoJstOther', null);
		}
		$this->set('nedoJstOther', $data);

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
		$rec = $this->History->loadFromHistory("NedoJstOther", $id);
		$compare_rec = $this->NedoJstOther->read(null, $id);
		$this->set("nedoJstOther", $rec);
		$this->set("compare_nedoJstOther", $compare_rec);
	}

	/**
	 * データを追加する
	 *
	 * @return None
	 */
	function add()
	{

		$this->_setPullDown();

		// 戻りURL
		$rtn = isset($_REQUEST["rtn"]) ? $_REQUEST["rtn"] :  null;
		$this->set("rtn", $rtn);

		// 特殊処理なので継承しない
		// データ登録時に子データを自動で作成するようにする。
		$modelname = "NedoJstOther";
		if (!empty($this->data)) {
			$this->$modelname->begin();
			$this->$modelname->create();
			if ($this->$modelname->save($this->data)) {
				// 保存してできたIDを取得
				$parent_id = $this->$modelname->getLastInsertID();
				// 自動作成の子データ
				$this->NedoJstOtherNode->create();
				$node_data = $this->data;
				$new_node_data = array();
				foreach ($node_data["NedoJstOther"] as $k => $v) {
					$new_node_data["NedoJstOtherNode"][$k] = $v;
				}
				unset($new_node_data["NedoJstOtherNode"]["id"]);
				$new_node_data["NedoJstOtherNode"]["nedo_jst_other_id"] = $parent_id;

				if (!$this->NedoJstOtherNode->save($new_node_data)) {
					$this->$modelname->rollback();
					$this->set('validate_errors', $this->validateErrors($this->NedoJstOtherNode));
					$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
									__(Inflector::humanize(Inflector::tableize($modelname)), true)));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(sprintf(__('The %s has been saved', true),
									__(Inflector::humanize(Inflector::tableize($modelname)), true)));
					$this->$modelname->commit();
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->$modelname->rollback();
				$this->set('validate_errors', $this->validateErrors($this->NedoJstOther));
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			}
		}
		else {
			// 公開フラグを強制的にONにする
			$this->data[$modelname]["open_to_public"] = 1;
		}
	}

	/**
	 * データを編集する
	 *
	 * @param int $id データのID
	 *
	 * @return None
	 */
	function edit($id = null)
	{
		$this->NedoJstOther->recursive = 1;
		$rec = $this->NedoJstOther->findById($id);
		
		// 子ノードが1つだけの場合、子ノード編集画面へ転送
		if($this->NedoJstOther->isSingleChild($id)) {
			return $this->redirect(array('action' => 'edit_node', $rec["NedoJstOtherNode"][0]["id"], $this->_makeReturnURLQuery()));
		}

		$this->_setPullDown();
		$this->set('nedoJstOther', $rec);
		return $this->_edit("NedoJstOther", $id);
	}

	/**
	 * データを削除する
	 *
	 * @param int $id データのID
	 *
	 * @return None
	 */
	function delete($id = null)
	{
		return $this->_delete("NedoJstOther", $id);
	}

	/**
	 * 一括削除
	 *
	 */
	function delete_all()
	{
		return $this->_delete_all("NedoJstOther");
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
		return $this->_copy("NedoJstOther", $id);
	}

	/**
	 * データを復元する
	 *
	 * @param int $id データのID
	 *
	 * @return None
	 */
	function restore($id = null)
	{
		$this->_setPullDown();
		$this->_restore("NedoJstOther", $id);
	}

	/**
	 * アップロード
	 *
	 * @return None
	 */
	function upload()
	{
		$this->_uploadAndCreateNode("NedoJstOther", "id", "nedo_jst_other_id");
	}

	/**
	 * 子データを編集する
	 *
	 * @param int $id
	 *
	 * @return None
	 */
	function edit_node($id = null)
	{
		// 戻りURL
		$rtn = isset($_REQUEST["rtn"]) ? $_REQUEST["rtn"] :  null;
		$this->set("rtn", $rtn);

		$this->_setPullDown();
		if (!$id) {
			return $this->cakeError("error404");
		}
		if (!empty($this->data)) {
			$parent_id = @$this->data["NedoJstOther"]["nedo_jst_other_id"];
			if (!$parent_id) {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				return $this->redirect(array('action' => 'view', $id));
			}

			$this->NedoJstOther->begin();

			// 編集履歴
			$modelname = "NedoJstOther";
			$save_id = $this->data[$modelname]["id"];
			$this->$modelname->recursive = -1;
			$rec = $this->$modelname->findById($save_id);
			$this->$modelname->begin();
			$this->History->saveToHistory($modelname, $save_id, $rec);

			if (!$this->NedoJstOther->save($this->data)) {
				$this->NedoJstOther->rollback();
				$this->log("saveできないためロールバックします", LOG_DEBUG);
				$this->set('validate_errors', $this->validateErrors($this->NedoJstOther));
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				return;
			} else {
				if ($this->NedoJstOther->recalcNode($parent_id)) {
					$this->NedoJstOther->commit();
					$this->Session->setFlash(sprintf(__('The %s has been saved', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				} else {
					$this->NedoJstOther->rollback();
					$this->Session->setFlash(sprintf(__('Caluculation of %s has been failed', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				}
			}
			$this->EditStatus->deleteStatus("NedoJstOther", $id, $this->Auth->user('id'));
			if($rtn) {
				return $this->redirect($rtn);
			} else {
				return $this->redirect(array('action' => 'edit', $parent_id));
			}
		} else {
			$this->NedoJstOther->recursive = 0;
			$this->data = $this->NedoJstOther->read(null, $id);
		}
	}

	/**
	 * 子データを閲覧する
	 *
	 * @param int $id
	 *
	 * @return None
	 */
	function view_node($id = null)
	{
		if (!$id) {
			return $this->cakeError("error404");
		}
		$this->NedoJstOther->recursive = 0;
		$rec = $this->NedoJstOther->read(null, $id);
		if (!$rec) {
			return $this->cakeError("error404");
		}
		$history_exists = $this->History->historyExists("NedoJstOther", $id);
		$this->set("history_exists", $history_exists);
		$history = $this->History->loadFromHistory("NedoJstOther", $id);
		if ($history) {
			$this->set('compare_nedoJstOther', $history);
		} else {
			$this->set('compare_nedoJstOther', null);
		}
		$this->set("nedoJstOther", $rec);
	}

	/**
	 * 子データを追加する
	 *
	 * @param int $parent_id
	 *
	 * @return None
	 */
	function add_node($parent_id = null)
	{
		// 戻りURL
		$rtn = isset($_REQUEST["rtn"]) ? $_REQUEST["rtn"] :  null;
		$this->set("rtn", $rtn);

		if (empty($this->data)) {
			if (!$parent_id) {
				return $this->cakeError("error404");
			}
			$rec = $this->NedoJstOther->makeNodeData($parent_id);
			if (!$rec) {
				return $this->cakeError("error404");
			}
			$this->data = $rec;
		} else {
			$this->NedoJstOther->begin();
			$this->NedoJstOther->create();
			if ($this->NedoJstOther->save($this->data)) {
				$parent_id = $this->data["NedoJstOther"]["nedo_jst_other_id"];
				// 親データ含めて再計算
				if (!$this->NedoJstOther->recalcNode($parent_id)) {
					$this->NedoJstOther->rollback();
					$this->Session->setFlash(sprintf(__('Caluculation of %s has been failed', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				} else {
					$this->NedoJstOther->commit();
					$this->Session->setFlash(sprintf(__('The %s has been saved', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				}
				return $this->redirect(array("action" => "index"));
			} else {
				$this->NedoJstOther->rollback();
				$this->set('validate_errors', $this->validateErrors($this->NedoJstOther));
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($this->name)), true)));
			}
		}
	}

	/**
	 * 検索ボックスを作成する
	 *
	 * @return None
	 */
	function search_box()
	{
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
	 * 教員情報をまとめて最新にする
	 *
	 * @return None
	 */
	function update_researcher()
	{
		if (!empty($this->data)) {
			$this->NedoJstOther->setCooperateNo();
			$this->_updateResearcher("NedoJstOther");
			$this->redirect("index/year:" .$this->NedoJstOther->getCurrentNendo());
		} else {
			$this->_prepareUpdateResearcher("NedoJstOther");
		}
	}

	/**
	 * 管理用メニューを表示
	 *
	 * @return None
	 */
	function manage()
	{
		return $this->render("manage");
	}
}
?>
