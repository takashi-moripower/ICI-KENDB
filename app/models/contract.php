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
 * Contract
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
class Contract extends AppModel {

	var $name = 'Contract';
	var $actsAs = array('Search.Searchable', 'SoftDeletable' => array('field' => 'disabled', 'find' => false));
	var $download_file_prefix = "jutaku_jigyou";
	var $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => false,
				'on' => 'update',
			),
		),
		'year' => array(
			'nendoRange' => array(
				'rule' => array('nendoRange', null, null),
				'allowEmpty' => false,
			),
		),
		'cooperate_no' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'researcher_no' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'project_code' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => false,
			),
		),
		'assignment_no' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'project_start_year' => array(
			//'nendoRange' => array(
			//	'rule' => array('nendoRange', 2000, null),
			//	'allowEmpty' => true,
			//),
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'initial_start_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'initial_end_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'this_year_start_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'this_year_end_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contract_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contract_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'this_year_reception_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'primary_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'common_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'indirect_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'general_administration_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'billing_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'credit_1' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'billing_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'credit_2' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'billing_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'credit_3' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'billing_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'credit_4' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
	);
	var $file_columns = array(
		'id',
		'contract_id',
		'year',
		'cooperate_no',
		'researcher_no',
		'project_code',
		'assignment_no',
		'funds_institute',
		'project_name',
		'project_assignment_name',
		'project_start_year',
		'initial_start_date',
		'initial_end_date',
		'this_year_start_date',
		'this_year_end_date',
		'new_or_continuance',
		'represent_researcher_name',
		'job_title',
		'department',
		'major_name',
		'institute_code',
		'school_code',
		'course_code',
		'singular_or_multi',
		'contract_date',
		'contract_amount',
		'this_year_reception_amount',
		'primary_cost',
		'common_cost',
		'indirect_cost',
		'general_administration_cost',
		'billing_type',
		'billing_date_1',
		'payment_due_1',
		'payment_date_1',
		'credit_1',
		'billing_date_2',
		'payment_due_2',
		'payment_date_2',
		'credit_2',
		'billing_date_3',
		'payment_due_3',
		'payment_date_3',
		'credit_3',
		'billing_date_4',
		'payment_due_4',
		'payment_date_4',
		'credit_4',
		'remarks1',
		'remarks2',
		'remarks3',
	);
	var $date_columns = array(
		'project_start_year',
		'initial_start_date',
		'initial_end_date',
		'this_year_start_date',
		'this_year_end_date',
		'contract_date',
		'billing_date_1',
		'payment_due_1',
		'payment_date_1',
		'billing_date_2',
		'payment_due_2',
		'payment_date_2',
		'billing_date_3',
		'payment_due_3',
		'payment_date_3',
		'billing_date_4',
		'payment_due_4',
		'payment_date_4',
	);
	var $numeric_search_field = array(
		'year',
		'contract_amount',
		'this_year_reception_amount',
		'primary_cost',
		'common_cost',
		'indirect_cost',
		'general_administration_cost',
		'credit_1',
		'credit_2',
		'credit_3',
		'credit_4',
	);

	var $easy_search_field = array(
		'project_code',
		'represent_researcher_name',
	);

	/**
	 * 横断検索用テーブルへのマッピングデータ
	 * @var <type>
	 */
	var $summarize_field = array(
		'department' => 'department',
		'researcher_name' => 'represent_researcher_name',
		'job_title' => 'job_title',
		'amount' => 'this_year_reception_amount',
		'direct_cost' => 'primary_cost',
		'indirect_cost' => 'indirect_cost',
		'year' => 'year',
		'research_type' => 'project_name',
		'subject' => 'project_assignment_name',
		'fund_owner' => 'funds_institute',
		'start_date' => 'initial_start_date',
		'end_date' => 'initial_end_date',
		'memo' => 'assignment_no',
		'research_area' => 'project_name',
		'researcher_no' => 'researcher_no',
		'cooperate_no' => 'cooperate_no',
		'disabled' => 'disabled',
		'open_to_public' => 'open_to_public',
		'major_name' => 'major_name',   // 270
		'unaggregate' => 'unaggregate',   // ICI#26
		'project_code' => 'project_code',   // ICI#27
		'institute_code' => 'institute_code',
		'school_code' => 'school_code',
		'course_code' => 'course_code',
	);

	var $hasMany = array(
		'ContractNode' => array(
			'className' => 'ContractNode',
			'foreign_key' => 'contract_id',
			'conditions' => array(
				"not" => array(
					array('ContractNode.contract_id' => null),
					array('ContractNode.disabled' => true),
				),
			),
			'order' => 'ContractNode.id asc',
			'dependent' => true,
		)
	);

	/**
	 * 教員情報を一括更新する際の対象カラム
	 */
	var $researcher_update_column = array(
		'researcher_no' => 'researcher_no',
		'researcher_name' => 'represent_researcher_name',
		'cooperate_no' => 'cooperate_no',
		'department' => 'department',
		//'major_name' => 'major_name',
		'job_title' => 'job_title',
	);

	/**
	 * 保存直前にユーザー情報をフィールドにセットする。
	 *
	 * @param array $options 引数配列
	 *
	 * @return boolean 成功・失敗
	 *
	 * @todo あとでapp_modelに移動させるかも
	 *
	 * */
	function beforeSave($options = array()) {
		parent::beforeSave($options);
		return $this->setUserInfo("Contract");
	}

	/**
	 * コンストラクタ(後でapp_controllerに移す)
	 *
	 * @param int	$id
	 * @param string $table
	 * @param string $ds
	 */
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		foreach ($this->file_columns as $v) {
			if ($v == "represent_researcher_name") {
				continue; // 名前は特殊検索する
			}
			if ($v == "year" || $v == "id") {
				$t = "value";
			} else {
				$t = "like";
			}
			$this->filterArgs[] = array('name' => $v, 'type' => $t);
		}
		$this->filterArgs[] = array('name' => 'represent_researcher_name', 'type' => 'query', 'method' => 'findWithLike');
		$this->mergeValidateRules();
	}

	// 研究者代表者はスペースを無視して検索できるようにする
	public function findWithLike($data = array()){
		$keyword = trim(preg_replace("/　/", " ", $data['represent_researcher_name']));
		$keywords = explode(" ", $keyword);
		$q = implode("%", $keywords);

		$conditions = array("replace(replace(represent_researcher_name, '　', ''), ' ', '') LIKE" => "%{$q}%");
		return $conditions;
	}

	/**
	 * 子ノードデータを作成する
	 *
	 * @param int $parent_id
	 *
	 * @return mixed
	 */
	function makeNodeData($parent_id)
	{
		if (!$parent_id) {
			return false;
		}
		$this->recursive = 0;
		$rec = $this->findById($parent_id);
		if (!$rec) {
			return false;
		}

		// コピーする項目を設定
		// @TODO: お客様にどの項目をコピーするか確認
		$copy_array = array(
			"year", "project_code", "project_name", "project_assignment_name",
		);
		$rec2 = array();
		foreach($copy_array as $k) {
			$rec2["Contract"][$k] = $rec["Contract"][$k];
		}
		$rec2["Contract"]["contract_id"] = $parent_id;
		return $rec2;
	}

	/**
	 * 子ノードを全件取得して再計算する
	 *
	 * @param int $parent_id 親データのID
	 */
	function recalcNode($parent_id)
	{
		// まず子ノードを取得
		$this->recursive = 0;
		$rec = $this->findAllByContractId($parent_id);
		if (!$rec) {
			return true;
		}

		// 取得した子ノードが1個だけなら親へコピーして終了
		if (1 == count($rec)) {
			// 親を取得
			$parent_rec = $this->read(null, $parent_id);
			foreach ($parent_rec["Contract"] as $k => $v) {
				if ($k != "id" && $k != "contract_id") {
					$parent_rec["Contract"][$k] = $rec[0]["Contract"][$k];
				}
			}
			return $this->save($parent_rec);
		}

		// 再計算する項目
		$key_array = array("contract_amount", "this_year_reception_amount", "primary_cost", "common_cost",
			"indirect_cost", "general_administration_cost", "credit_1", "credit_2",
			"credit_3", "credit_4"
		);

		// 初期化
		$sum = array();
		foreach($key_array as $k) {
			$sum[$k] = 0;
		}

		foreach ($rec as $item) {
			foreach($key_array as $k) {
				// 必要な項目を足し算
				$sum[$k]  += $item["Contract"][$k];
			}
		}
		// 足した項目を含めて保存
		$parent_rec = $this->read(null, $parent_id);

		foreach($key_array as $k) {
			$parent_rec["Contract"][$k] = $sum[$k];
		}
		return $this->save($parent_rec);
	}

	/**
	 * 保存後の処理
	 *
	 * @param boolean $created
	 */
	function afterSave($created)
	{
		$this->saveToSummary($this, $created);
	}
}

?>
