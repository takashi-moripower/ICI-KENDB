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
 * EntrustsController
 *
 * 共同研究・受託研究(民間企業等)
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
class EntrustsController extends AppController
{

	var $name = 'Entrusts';
	var $components = array('Search.Prg');
	var $uses = array('Entrust', 'EntrustNode', 'SelectableItem', 'EditStatus', 'History', 'Researcher');
	/**
	 * 共同研究・受託研究資金モデル
	 * 
	 * @var Entrust
	 */
	var $Entrust;
	/**
	 * 研究者モデル
	 *
	 * @var Researcher
	 */
	var $Researcher;
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
	 * デフォルトのソート順
	 * 
	 * @var array
	 */
	var $paginate = array(
		'conditions' => array('Entrust.entrust_id' => null),
		'order' => array('Entrust.year' => 'desc', 'Entrust.id' => 'desc'),
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
		foreach ($this->Entrust->file_columns as $k => $v) {
			if (!in_array($v, $this->Entrust->numeric_search_field) && !in_array($v, $this->Entrust->date_columns)) {
				$this->presetVars[] = array('field' => $v, 'type' => 'value');
			}
		}
		// 数値フィールド
		foreach ($this->Entrust->numeric_search_field as $k => $v) {
			$this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
			$this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
		}
		// 日付フィールド
		foreach ($this->Entrust->date_columns as $k => $v) {
			$this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
			$this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
		}

		$this->set("title_for_layout", "共同研究・受託研究（民間企業等）");
		$year = $this->Entrust->getCurrentNendo();
		$this->crumbList = array(
			array(
				'ホーム',
				array('controller' => 'users', 'action' => 'index'),
				array()
			),
			array(
				'共同研究・受託研究（民間企業等）',
				array('controller' => 'entrusts', 'action' => 'index', 'year:' . $year),
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
			$result = "Entrust.disabled != true";
		} elseif ($scope == 1) {
			$result = "(Entrust.disabled = false or (Entrust.disabled = true and Entrust.hidden = false))";
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
		foreach ($this->Entrust->numeric_search_field as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$num = @$this->passedArgs[$value . $k2];
				if (is_numeric($num)) {
					$this->paginate['conditions'][] = $value . $v2 . $num;
				}
			}
		}
		// 日付フィールド部分
		foreach ($this->Entrust->date_columns as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$val = @$this->passedArgs[$value . $k2];
				if (!empty($val)) {
					$this->paginate['conditions'][] = $value . $v2 . "'" . $val . "'";
				}
			}
		}

		$this->paginate['conditions'][] = $this->Entrust->parseCriteria($this->passedArgs);
	}

	/**
	 * 子データのみ検索するか親データも検索するかを決定する
	 */
	function _makeSearchPattern() {
		// 検索方法
		$show_flat = isset($this->passedArgs['show_flat']) ? $this->passedArgs['show_flat'] : 0;
		if ($show_flat == 1) {
			$this->Entrust->recursive = -1;
			unset($this->paginate['conditions']['Entrust.entrust_id']);
		} else {
			$this->Entrust->recursive = 1;
		}
		return $show_flat;
	}

	/**
	 * index
	 *
	 * @return None
	 */
	function index()
	{
		$this->log("index表示開始", LOG_DEBUG);
		$this->_setPullDown();
		$current_editing = $this->EditStatus->getCurrentEditingIdList("Entrust");
		$this->set("current_editing", $current_editing);

		if(isset($this->passedArgs['keyword'])) {
			$this->Entrust->recursive = -1;
			$show_flat = 1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("Entrust");
			$this->log($this->paginate['conditions'], LOG_DEBUG);
		} else {
			$show_flat = $this->_makeSearchPattern();
			$this->Prg->commonProcess();
			$this->_makeScope();
			$this->_makeSearchCond();
		}
		$this->_makeLimit();

		$this->set('entrusts', $this->paginate());
		$this->set('urlparams', $this->_makePassArgsURLParam());
		$this->set('show_flat', $show_flat);
		$this->log("indexデータ設定完了", LOG_DEBUG);
	}

	/**
	 * 検索ボックスを表示する
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
	 * 指定したIDの項目を閲覧する
	 *
	 * @param integer $id id
	 *
	 * @return None
	 */
	function view($id = null)
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid entrust', true));
			$this->redirect(array('action' => 'index'));
		}
		$data = $this->Entrust->read(null, $id);

		// 子ノードが1つだけの場合、子ノード編集画面へ転送
		if (array_key_exists('EntrustNode', $data) && 1 == count($data["EntrustNode"])) {
			return $this->redirect(array('action' => 'view_node', $data["EntrustNode"][0]["id"], $this->_makeReturnURLQuery()));
		}

		$history_exists = $this->History->historyExists("Entrust", $id);
		$this->set("history_exists", $history_exists);

		$rec = $this->History->loadFromHistory("Entrust", $id);
		if ($rec) {
			$this->set('compare_entrust', $rec);
		} else {
			$this->set('compare_entrust', null);
		}

		$this->set('entrust', $data);
		// 戻りURL
		$rtn = isset($_REQUEST["rtn"]) ? $_REQUEST["rtn"] :  null;
		$this->set("rtn", $rtn);
		
	}

	/**
	 * 追加
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
		$modelname = "Entrust";
		if (!empty($this->data)) {
			$this->$modelname->begin();
			$this->$modelname->create();
			if ($this->$modelname->save($this->data)) {
				// 保存してできたIDを取得
				$parent_id = $this->$modelname->getLastInsertID();
				// 自動作成の子データ
				$this->EntrustNode->create();
				$node_data = $this->data;
				$new_node_data = array();
				foreach ($node_data["Entrust"] as $k => $v) {
					$new_node_data["EntrustNode"][$k] = $v;
				}
				unset($new_node_data["EntrustNode"]["id"]);
				$new_node_data["EntrustNode"]["entrust_id"] = $parent_id;

				if (!$this->EntrustNode->save($new_node_data)) {
					$this->$modelname->rollback();
					$this->set('validate_errors', $this->validateErrors($this->Entrust));
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
				$this->set('validate_errors', $this->validateErrors($this->Entrust));
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			}
		}
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
		return $this->_copy("Entrust", $id);
	}

	/**
	 * プルダウンの要素を作成する
	 *
	 * @return None
	 */
	function _setPullDown()
	{
		// 研究分野
		$area_of_research = $this->SelectableItem->makeRealValueList("Entrust", "area_of_research");
		$this->set(compact('area_of_research'));

		// 申込者業種
		$category_of_business = $this->SelectableItem->makeRealValueList("Entrust", "category_of_business");
		$this->set(compact('category_of_business'));
	}

	/**
	 * 指定したIDの項目を編集
	 *
	 * @param integer $id id
	 *
	 * @return None
	 */
	function edit($id = null)
	{
		$this->log("編集開始 ID=" . $id, LOG_DEBUG);
		$this->_setPullDown();
		$this->Entrust->recursive = 1;
		$rec = $this->Entrust->findById($id);
		$this->log("子データの個数は" . count($rec["EntrustNode"]). "です", LOG_DEBUG);

		// 子ノードが1つだけの場合、子ノード編集画面へ転送
		if($this->Entrust->isSingleChild($id)) {
			return $this->redirect(array('action' => 'edit_node', $rec["EntrustNode"][0]["id"], $this->_makeReturnURLQuery()));
		}

		$this->set('entrust', $rec);
		return $this->_edit("Entrust", $id);
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
		return $this->_restore("Entrust", $id);
	}

	/**
	 * 最終保存データを閲覧する
	 *
	 * @param int $id データのID
	 *
	 * @return None
	 */
	function history_view($id = null)
	{
		if ($id == null) {
			$this->cakeError("error404");
			return;
		}
		$rec = $this->History->loadFromHistory("Entrust", $id);
		$compare_rec = $this->Entrust->read(null, $id);
		$this->set("entrust", $rec);
		$this->set("compare_entrust", $compare_rec);
	}

	/**
	 * 指定したIDの項目を削除
	 *
	 * @param integer $id id
	 *
	 * @return None
	 */
	function delete($id = null)
	{
		return $this->_delete("Entrust", $id);
	}

	/**
	 * 一括削除
	 *
	 */
	function delete_all()
	{
		return $this->_delete_all("Entrust");
	}

	/**
	 * アップロード
	 *
	 * @return None
	 */
	function upload()
	{
		$this->_uploadAndCreateNode("Entrust", "id", "entrust_id");
	}

	/**
	 * Excelに一括出力する
	 *
	 * @return None
	 */
	function output_excel()
	{
		$this->layout = null;
		// $this->Entrust->recursive = 1;
		$this->_makeSearchPattern();
		unset($this->passedArgs["limit"]);

		if(isset($this->passedArgs['keyword'])) {
			$this->Entrust->recursive = -1;
			$show_flat = 1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("Entrust");
			$this->log($this->paginate['conditions'], LOG_DEBUG);
		} else {
			$this->Prg->commonProcess();
			$this->_makeScope();
			$this->_makeSearchCond();
		}
		$this->paginate["limit"] = 3000;
		$rec = $this->paginate();

		// 子ノード含めてリスト化
		$rec2 = array();
		foreach ($rec as $item) {
			$rec2[]["Entrust"] = $item["Entrust"];
			if (isset($item["EntrustNode"]) && is_array($item["EntrustNode"]) && count($item["EntrustNode"]) >= 2) {
				foreach ($item["EntrustNode"] as $item2) {
					$rec2[]["Entrust"] = $item2;
				}
			}
		}
		if (count($rec2) >= $this->excel_output_max_count) {
			$url = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : array('/') ;
			$this->Session->setFlash(__("Exceed Max Excel Record Count", true));
			return $this->redirect($url);
		}

		$format = $this->_getExcelFormat();
		$this->_makeExcelObject("Entrust", $rec2, $format);
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
		// $this->Entrust->recursive = 1;
		unset($this->passedArgs["limit"]);
		if(isset($this->passedArgs['keyword'])) {
			$this->Entrust->recursive = -1;
			$show_flat = 1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("Entrust");
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
			$rec2[]["Entrust"] = $item["Entrust"];
			if (isset($item["EntrustNode"]) && is_array($item["EntrustNode"]) && count($item["EntrustNode"]) >= 2) {
				foreach ($item["EntrustNode"] as $item2) {
					$rec2[]["Entrust"] = $item2;
				}
			}
		}

		$format = $this->_getExcelFormat();
		$this->_makeCSVObject("Entrust", $rec2);
		return;
	}

	/**
	 * 教員情報をまとめて最新にする
	 *
	 * @return None
	 */
	function update_researcher()
	{
		if (!empty($this->data)) {
			$this->Entrust->setCooperateNo();
			$this->_updateResearcher("Entrust");
			$this->redirect("index/year:" .$this->Entrust->getCurrentNendo());
		} else {
			$this->_prepareUpdateResearcher("Entrust");
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
			$parent_id = @$this->data["Entrust"]["entrust_id"];
			if (!$parent_id) {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				return $this->redirect(array('action' => 'view', $id));
			}

			$this->Entrust->begin();

			// 編集履歴
			$modelname = "Entrust";
			$save_id = $this->data[$modelname]["id"];
			$this->$modelname->recursive = -1;
			$rec = $this->$modelname->findById($save_id);
			$this->$modelname->begin();
			$this->History->saveToHistory($modelname, $save_id, $rec);

			if (!$this->Entrust->save($this->data)) {
				$this->Entrust->rollback();
				$this->log("saveできないためロールバックします", LOG_DEBUG);
				$this->set('validate_errors', $this->validateErrors($this->Entrust));
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				return;
			} else {
				if ($this->Entrust->recalcNode($parent_id)) {
					$this->Entrust->commit();
					$this->Session->setFlash(sprintf(__('The %s has been saved', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				} else {
					$this->Entrust->rollback();
					$this->Session->setFlash(sprintf(__('Caluculation of %s has been failed', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				}
			}
			$this->EditStatus->deleteStatus("Entrust", $id, $this->Auth->user('id'));
			if($rtn) {
				return $this->redirect($rtn);
			} else {
				return $this->redirect(array('action' => 'edit', $parent_id));
			}
		} else {
			$this->Entrust->recursive = 0;
			$this->data = $this->Entrust->read(null, $id);
		}
	}

	/**
	 * 子ノードを閲覧する
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
		$this->Entrust->recursive = 0;
		$rec = $this->Entrust->read(null, $id);
		if (!$rec) {
			return $this->cakeError("error404");
		}
		// 履歴
		$history_exists = $this->History->historyExists("Entrust", $id);
		$this->set("history_exists", $history_exists);
		$history = $this->History->loadFromHistory("Entrust", $id);
		if ($history) {
			$this->set('compare_entrust', $history);
		} else {
			$this->set('compare_entrust', null);
		}

		// 本体データ
		$this->set("entrust", $rec);
	}

	/**
	 * 子データを追加する
	 *
	 * @param int $parent_id 親データID
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
			$rec = $this->Entrust->makeNodeData($parent_id);
			if (!$rec) {
				return $this->cakeError("error404");
			}
			$this->data = $rec;
		} else {
			$this->Entrust->begin();
			$this->Entrust->create();
			if ($this->Entrust->save($this->data)) {
				$parent_id = $this->data["Entrust"]["entrust_id"];
				// 親データ含めて再計算
				if (!$this->Entrust->recalcNode($parent_id)) {
					$this->Entrust->rollback();
					$this->Session->setFlash(sprintf(__('Caluculation of %s has been failed', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				} else {
					$this->Entrust->commit();
					$this->Session->setFlash(sprintf(__('The %s has been saved', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				}
				return $this->redirect(array("action" => "index"));
			} else {
				$this->Entrust->rollback();
				$this->set('validate_errors', $this->validateErrors($this->Entrust));
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($this->name)), true)));
			}
		}
	}
}
?>
