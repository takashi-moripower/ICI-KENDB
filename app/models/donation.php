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
 * Donation
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
class Donation extends AppModel {

	var $name = 'Donation';
	var $actsAs = array('Search.Searchable', 'SoftDeletable' => array('field' => 'disabled', 'find' => false));
	var $download_file_prefix = "kifukin";
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
				'rule' => array('nendoRange'),
				'allowEmpty' => false,
			),
		),
		'payment_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contract_resolution_no' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'income_section_code' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'planned_income' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'planned_income_foreign' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'income_yen' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'project_code' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'allowEmpty' => false,
			),
		),
		'payment_due' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'common_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
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
		'personal_no' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'division_count' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'ob_postal_code' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'allowEmpty' => true,
			),
		),
//		'extension' => array(
//			'alphaNumericHyphen' => array(
//				'rule' => array('alphaNumericHyphen'),
//				'allowEmpty' => true,
//			),
//		),
//		'post_no' => array(
//			'alphaNumericHyphen' => array(
//				'rule' => array('alphaNumericHyphen'),
//				'allowEmpty' => true,
//			),
//		),


	);
	var $file_columns = array(
		'id',
		'year',
		'section_in_charge',
		'receipt_no',
		'receipt_send_date',
		'remarks_receipt',
		'payment_date',
		'contract_resolution_no',
		'income_section_code',
		'income_section_name',
		'contract_obligation',
		'contract_obligation_name',
		'planned_income',
		'foreign_money_type',
		'planned_income_foreign',
		'income_yen',
		'subsidy_type',
		'project_code',
		'project_code_name',
		'vouching_remarks',
		'payment_due',
		'contraction_date',
		'contract_resolution_detail_no',
		'division_count',
		'detail_remarks',
		'research_promotion_name',
		'research_promotion_year',
		'research_promotion_remarks',
		'variety',
		'remarks',
		'obligation_name',
		'ob_represent_name',
		'ob_job_title',
		'common_cost_check',
		'common_cost',
		'ob_postal_code',
		'ob_address',
		'ob_section',
		'ob_person_in_charge',
		'researcher_name',
		'major_name',
		'institute_code',		// 院
		'school_code',		// 系
		'course_code',		// コース
		'job_title',
		'extension',
		'email',
		'post_no',
		'cooperate_no',
		'researcher_no',
		'personal_no',
        'unaggregate',              // #26
	);
	var $date_columns = array(
		'receipt_send_date',
		'payment_date',
		'payment_due',
		'contraction_date',
	);
	var $numeric_search_field = array(
		'year',
		'planned_income',
		'planned_income_foreign',
		'income_yen',
		'division_count',
		'research_promotion_year',
		'common_cost',
	);
	var $numeric_non_currency_field = array(
		'division_count',
		'research_promotion_year',
	);

	/**
	 * 教員情報を一括更新する際の対象カラム
	 */
	var $researcher_update_column = array(
		'researcher_no' => 'researcher_no',
		'researcher_name' => 'researcher_name',
		//'major_name' => 'major_name',
		'cooperate_no' => 'cooperate_no',
		'personal_no' => 'personal_no',
		'extension' => 'extension',
		'email' => 'email',
		'post_no' => 'post_no',
		'job_title' => 'job_title',
	);

	var $easy_search_field = array(
		'project_code',
		'contract_obligation_name',
		'researcher_name',
	);

	var $output_column_label_alias = array(
		'researcher_name' => '受入研究者',
		'major_name' => '専攻名（受入研究者）',
	);

	/**
	 * 横断検索用テーブルへのマッピングデータ
	 * @var <type>
	 */
	var $summarize_field = array(
		'department' => 'income_section_name',
		'researcher_name' => 'researcher_name',
		'job_title' => 'job_title',
		'amount' => 'planned_income',
		'direct_cost' => null,
		'indirect_cost' => null,
		'year' => 'year',
		'research_type' => null,
		'subject' => 'project_code_name',
		'fund_owner' => 'obligation_name',
		'memo' => 'contract_resolution_no',
		'research_area' => null,
		'start_date' => null,
		'end_date' => null,
		'researcher_no' => 'researcher_no',
		'cooperate_no' => 'cooperate_no',
		'disabled' => 'disabled',
		'open_to_public' => 'open_to_public',
		'major_name' => 'major_name',           // #270
		'unaggregate' => 'unaggregate',           // ICI#26
		'project_code' => 'project_code',           // ICI#27
		'institute_code' => 'institute_code',		// 院
		'school_code' => 'school_code',		// 系
		'course_code' => 'course_code',		// コース
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
		return $this->setUserInfo("Donation");
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
			if ($v == "researcher_name") {
				continue; // 名前は特殊検索する
			}
			if ($v == "year" || $v == "id") {
				$t = "value";
			} else {
				$t = "like";
			}
			$this->filterArgs[] = array('name' => $v, 'type' => $t);
		}
		$this->filterArgs[] = array('name' => 'researcher_name', 'type' => 'query', 'method' => 'findWithLike');
		$this->mergeValidateRules();
	}

	// 研究者代表者はスペースを無視して検索できるようにする
	public function findWithLike($data = array()){
		$keyword = trim(preg_replace("/　/", " ", $data['researcher_name']));
		$keywords = explode(" ", $keyword);
		$q = implode("%", $keywords);

		$conditions = array("replace(replace(researcher_name, '　', ''), ' ', '') LIKE" => "%{$q}%");
		return $conditions;
	}

	/**
	 * データ保存後の処理
	 *
	 * @param boolean $created
	 */
	function  afterSave($created)
	{
		$this->saveToSummary($this, $created);
	}

}

?>
