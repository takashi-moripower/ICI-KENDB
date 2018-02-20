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
 * ContractsController
 *
 * 受託事業用コントローラ
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
class ContractsController extends AppController
{

	var $name = 'Contracts';
	var $components = array('Search.Prg');
	var $uses = array('Contract', 'ContractNode', 'SelectableItem', 'EditStatus', 'History', 'Researcher');
	/**
	 * デフォルトのソート順
	 * 
	 * @var array
	 */
	var $paginate = array(
		'conditions' => array('Contract.contract_id' => null),
		'order' => array('Contract.year' => 'desc', 'Contract.id' => 'desc'),
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
		// 検索対象
		array('field' => 'show_flat', 'type' => 'value'),
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
		foreach ($this->Contract->file_columns as $k => $v) {
			if (!in_array($v, $this->Contract->numeric_search_field) && !in_array($v, $this->Contract->date_columns)) {
				$this->presetVars[] = array('field' => $v, 'type' => 'value');
			}
		}
		// 数値フィールド
		foreach ($this->Contract->numeric_search_field as $k => $v) {
			$this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
			$this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
		}
		// 日付フィールド
		foreach ($this->Contract->date_columns as $k => $v) {
			$this->presetVars[] = array('field' => $v . "_f", 'type' => 'value');
			$this->presetVars[] = array('field' => $v . "_t", 'type' => 'value');
		}

		$this->set("title_for_layout", "受託事業");
		$year = $this->Contract->getCurrentNendo();
		$this->crumbList = array(
			array(
				'ホーム',
				array('controller' => 'users', 'action' => 'index'),
				array()
			),
			array(
				'受託事業',
				array('controller' => 'contracts', 'action' => 'index', 'year:' . $year),
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
		$scope = isset($this->passedArgs['scope']) ? $this->passedArgs['scope'] :  "";

		if ($scope == "0" || $scope == "") {
			$result = "Contract.disabled != true";
		} elseif ($scope == 1) {
			$result = "(Contract.disabled = false or (Contract.disabled = true and Contract.hidden = false))";
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
		foreach ($this->Contract->numeric_search_field as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$num = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : null;
				if (is_numeric($num)) {
					$this->paginate['conditions'][] = $value . $v2 . $num;
				}
			}
		}
		// 日付フィールド部分
		foreach ($this->Contract->date_columns as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$val = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : null;
				if (!empty($val)) {
					$this->paginate['conditions'][] = $value . $v2 . "'" . $val . "'";
				}
			}
		}

		$this->paginate['conditions'][] = $this->Contract->parseCriteria($this->passedArgs);
	}

	/**
	 * 子データのみ検索するか親データも検索するかを決定する
	 */
	function _makeSearchPattern() {
		// 検索方法
		$show_flat = isset($this->passedArgs['show_flat']) ? $this->passedArgs['show_flat'] : 0;
		if ($show_flat == 1) {
			$this->Contract->recursive = -1;
			unset($this->paginate['conditions']['Contract.contract_id']);
		} else {
			$this->Contract->recursive = 1;
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

		$this->_makeSearchPattern();

		unset($this->passedArgs["limit"]);
		if(isset($this->passedArgs['keyword'])) {
			$this->Contract->recursive = -1;
			$show_flat = 1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("Contract");
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
			$rec2[]["Contract"] = $item["Contract"];
			if(isset($item["ContractNode"]) && is_array($item["ContractNode"]) && count($item["ContractNode"]) >= 2) {
				foreach ($item["ContractNode"] as $item2) {
					$rec2[]["Contract"] = $item2;
				}
			}
		}
		if (count($rec2) >= $this->excel_output_max_count) {
			$url = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : array('/') ;
			$this->Session->setFlash(__("Exceed Max Excel Record Count", true));
			return $this->redirect($url);
		}

		$format = $this->_getExcelFormat();
		$this->_makeExcelObject("Contract", $rec2, $format);
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
		unset($this->passedArgs["limit"]);
		if(isset($this->passedArgs['keyword'])) {
			$this->Contract->recursive = -1;
			$show_flat = 1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("Contract");
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
			$rec2[]["Contract"] = $item["Contract"];
			if(isset($item["ContractNode"]) && is_array($item["ContractNode"]) && count($item["ContractNode"]) >= 2) {
				foreach ($item["ContractNode"] as $item2) {
					$rec2[]["Contract"] = $item2;
				}
			}
		}

		$format = $this->_getExcelFormat();
		$this->_makeCSVObject("Contract", $rec2);
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

		$current_editing = $this->EditStatus->getCurrentEditingIdList("Contract");
		$this->set("current_editing", $current_editing);
		if(isset($this->passedArgs['keyword'])) {
			$this->Contract->recursive = -1;
			$show_flat = 1;
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->_make_easy_search_condition("Contract");
			$this->log($this->paginate['conditions'], LOG_DEBUG);
		} else {
			$show_flat = $this->_makeSearchPattern();
			$this->Prg->commonProcess();
			$this->_makeScope();
			$this->_makeSearchCond();
		}
		$this->_makeLimit();
		$this->set('contracts', $this->paginate());
		$this->set('urlparams', $this->_makePassArgsURLParam());
		$this->set('show_flat', $show_flat);
	}

	/**
	 * データを閲覧する
	 *
	 * @param int $id
	 */
	function view($id = null)
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid contract', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Contract->recursive = 1;
		$data = $this->Contract->read(null, $id);

		// 子ノードが1つだけの場合、子ノード編集画面へ転送
		if (array_key_exists('ContractNode', $data) && 1 == count($data["ContractNode"])) {
			return $this->redirect(array('action' => 'view_node', $data["ContractNode"][0]["id"], $this->_makeReturnURLQuery()));
		}

		$history_exists = $this->History->historyExists("Contract", $id);
		$this->set("history_exists", $history_exists);
		$rec = $this->History->loadFromHistory("Contract", $id);
		if ($rec) {
			$this->set('compare_contract', $rec);
		} else {
			$this->set('compare_contract', null);
		}
		$this->Contract->recursive = 1;
		$this->set('contract', $data);

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
		$rec = $this->History->loadFromHistory("Contract", $id);
		$compare_rec = $this->Contract->read(null, $id);
		$this->set("contract", $rec);
		$this->set("compare_contract", $compare_rec);
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
		return $this->_restore("Contract", $id);
	}

	/**
	 * アップロード
	 *
	 * @return None
	 */
	function upload()
	{
		$this->_uploadAndCreateNode("Contract", "id", "contract_id");
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
		$modelname = "Contract";
		if (!empty($this->data)) {
			$this->$modelname->begin();
			$this->$modelname->create();
			if ($this->$modelname->save($this->data)) {
				// 保存してできたIDを取得
				$parent_id = $this->$modelname->getLastInsertID();
				// 自動作成の子データ
				$this->ContractNode->create();
				$node_data = $this->data;
				$new_node_data = array();
				foreach ($node_data["Contract"] as $k => $v) {
					$new_node_data["ContractNode"][$k] = $v;
				}
				unset($new_node_data["ContractNode"]["id"]);
				$new_node_data["ContractNode"]["contract_id"] = $parent_id;

				if (!$this->ContractNode->save($new_node_data)) {
					$this->$modelname->rollback();
					$this->set('validate_errors', $this->validateErrors($this->Contract));
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
				$this->set('validate_errors', $this->validateErrors($this->Contract));
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			}
		}
		else {
			// 強制的に公開フラグをONにしておく
			$this->data[$modelname]["open_to_public"] = 1;
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
		return $this->_copy("Contract", $id);
	}

	/**
	 * データを編集する
	 *
	 * @param int $id 編集するデータのID
	 *
	 * @return None
	 */
	function edit($id = null)
	{
		$this->_setPullDown();
		$this->Contract->recursive = 1;
		$rec = $this->Contract->findById($id);

		// 子ノードが1つだけの場合、子ノード編集画面へ転送
		if ($this->Contract->isSingleChild($id)) {
			return $this->redirect(array('action' => 'edit_node', $rec["ContractNode"][0]["id"], $this->_makeReturnURLQuery()));
		}
		$this->set('contract', $rec);

		return $this->_edit("Contract", $id);
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
		return $this->_delete("Contract", $id);
	}

	/**
	 * 一括削除
	 *
	 */
	function delete_all()
	{
		return $this->_delete_all("Contract");
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
		if (!in_array($search_param, array(0, 1, 2, 3, 4, 5, 6))) {
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
			$this->Contract->setCooperateNo();
			$this->_updateResearcher("Contract");
			$this->redirect("index/year:" .$this->Contract->getCurrentNendo());
		} else {
			$this->_prepareUpdateResearcher("Contract");
		}
	}

	/**
	 * 子データを編集する
	 *
	 * @param int $id 編集するデータID
	 *
	 * @return none
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
			$parent_id = @$this->data["Contract"]["contract_id"];
			if (!$parent_id) {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				return $this->redirect(array('action' => 'view', $id));
			}

			$this->Contract->begin();

			// 編集履歴
			$modelname = "Contract";
			$save_id = $this->data[$modelname]["id"];
			$this->$modelname->recursive = -1;
			$rec = $this->$modelname->findById($save_id);
			$this->$modelname->begin();
			$this->History->saveToHistory($modelname, $save_id, $rec);

			if (!$this->Contract->save($this->data)) {
				$this->Contract->rollback();
				$this->log("saveできないためロールバックします", LOG_DEBUG);
				$this->set('validate_errors', $this->validateErrors($this->Contract));
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				return;
			} else {
				if ($this->Contract->recalcNode($parent_id)) {
					$this->Contract->commit();
					$this->Session->setFlash(sprintf(__('The %s has been saved', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				} else {
					$this->Contract->rollback();
					$this->Session->setFlash(sprintf(__('Caluculation of %s has been failed', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				}
			}
			$this->EditStatus->deleteStatus("Contract", $id, $this->Auth->user('id'));
			if($rtn) {
				return $this->redirect($rtn);
			} else {
				return $this->redirect(array('action' => 'edit', $parent_id));
			}
		} else {
			$this->Contract->recursive = 0;
			$this->data = $this->Contract->read(null, $id);
		}
	}

	/**
	 * 子データを閲覧する
	 *
	 * @param int $id データID
	 *
	 * @return None
	 */
	function view_node($id = null)
	{
		if (!$id) {
			return $this->cakeError("error404");
		}
		$this->Contract->recursive = 0;
		$rec = $this->Contract->read(null, $id);
		if (!$rec) {
			return $this->cakeError("error404");
		}
		$history_exists = $this->History->historyExists("Contract", $id);
		$this->set("history_exists", $history_exists);
		$history = $this->History->loadFromHistory("Contract", $id);
		if ($history) {
			$this->set('compare_contract', $history);
		} else {
			$this->set('compare_contract', null);
		}
		$this->set("contract", $rec);
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
			$rec = $this->Contract->makeNodeData($parent_id);
			if (!$rec) {
				return $this->cakeError("error404");
			}
			$this->data = $rec;
		} else {
			$this->Contract->begin();
			$this->Contract->create();
			if ($this->Contract->save($this->data)) {
				$parent_id = $this->data["Contract"]["contract_id"];
				// 親データ含めて再計算
				if (!$this->Contract->recalcNode($parent_id)) {
					$this->Contract->rollback();
					$this->Session->setFlash(sprintf(__('Caluculation of %s has been failed', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				} else {
					$this->Contract->commit();
					$this->Session->setFlash(sprintf(__('The %s has been saved', true),
									__(Inflector::humanize(Inflector::tableize($this->name)), true)));
				}
				return $this->redirect(array("action" => "index"));
			} else {
				$this->Contract->rollback();
				$this->set('validate_errors', $this->validateErrors($this->Contract));
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true),
								__(Inflector::humanize(Inflector::tableize($this->name)), true)));
			}
		}
	}
}
?>
