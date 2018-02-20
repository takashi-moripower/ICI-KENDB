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
 * Entrust
 *
 * 産学連携データ
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
class Entrust extends AppModel
{

	var $name = 'Entrust';
	var $actsAs = array('Search.Searchable', 'SoftDeletable' => array('field' => 'disabled', 'find' => false));
	var $download_file_prefix = "jutaku_kigyou";

	/**
	 * バリデーションルール
	 *
	 * @var validates
	 */
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
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'allowEmpty' => true,
			),
			'between' => array(
				'rule' => array('between', 8, 8),
			),
		),
		'project_code' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => false,
			),
		),
		'resolution_no' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'branch_no' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'reception_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'start_budget_year' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'allowEmpty' => true,
			),
		),
		'credit' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
//		'extension' => array(
//			 'numericHyphen' => array(
//				 'rule' => array('numericHyphen'),
//				 'allowEmpty' => true,
//			 ),
//		),
//		'post_no' => array(
//			 'alphaNumericHyphen' => array(
//				 'rule' => array('alphaNumericHyphen'),
//				 'allowEmpty' => true,
//			 ),
//		),

		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'allowEmpty' => true,
			),
		),
		'start_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'end_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'division_count' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
// 2011/2/18 完全自由入力に変更
//		'continuance_no' => array(
//			'alphaNumericHyphen' => array(
//				'rule' => array('alphaNumericHyphen'),
//				'allowEmpty' => true,
//			),
//		),
		'number_of_researchers' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'formula' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'former_payment_d' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'former_payment_r' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'former_payment_i' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'former_payment_sum' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'current_payment_dr' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'current_payment_u' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'current_payment_g' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'current_payment_d' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'current_payment_r' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'current_payment_i' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'current_payment_sum' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'current_payment_alloc' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next1_payment_d' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next1_payment_r' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next1_payment_i' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next1_payment_sum' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next2_payment_d' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next2_payment_r' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next2_payment_i' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next2_payment_sum' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next3_payment_d' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next3_payment_r' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next3_payment_i' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next3_payment_sum' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next4_payment_d' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next4_payment_r' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next4_payment_i' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'next4_payment_sum' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'd_total' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'r_total' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'i_total' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'total_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'contraction_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'resolution_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_month' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'payment_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'ow_post_no' => array(
			'numericHyphen' => array(
				'rule' => 'numericHyphen',
				'allowEmpty' => true,
			),
		),
		'ow_tel' => array(
			'numericHyphen' => array(
				'rule' => 'numericHyphen',
				'allowEmpty' => true,
			),
		),
		'ow_fax' => array(
			'numericHyphen' => array(
				'rule' => 'numericHyphen',
				'allowEmpty' => true,
			),
		),
		'ow_email' => array(
			'email' => array(
				'rule' => array('email'),
				'allowEmpty' => true,
			),
		),
		'bill_post_no' => array(
			'numericHyphen' => array(
				'rule' => 'numericHyphen',
				'allowEmpty' => true,
			),
		),
		'bill_tel' => array(
			'numericHyphen' => array(
				'rule' => 'numericHyphen',
				'allowEmpty' => true,
			),
		),
		'bill_fax' => array(
			'numericHyphen' => array(
				'rule' => 'numericHyphen',
				'allowEmpty' => true,
			),
		),
		'bill_email' => array(
			'email' => array(
				'rule' => array('email'),
				'allowEmpty' => true,
			),
		),
	);
	var $date_columns = array(
		"reception_date",
		"start_date",
		"end_date",
		"contraction_date",
		"resolution_date",
		"payment_due",
		"payment_date",
	);
	var $numeric_search_field = array(
		"year",
		"credit",
		"division_count",
		"number_of_researchers",
		"former_payment_d",
		"former_payment_r",
		"former_payment_i",
		"former_payment_sum",
		"current_payment_dr",
		"current_payment_u",
		"current_payment_g",
		"current_payment_d",
		"current_payment_r",
		"current_payment_i",
		"current_payment_sum",
		"current_payment_alloc",
		"next1_payment_d",
		"next1_payment_r",
		"next1_payment_i",
		"next1_payment_sum",
		"next2_payment_d",
		"next2_payment_r",
		"next2_payment_i",
		"next2_payment_sum",
		"next3_payment_d",
		"next3_payment_r",
		"next3_payment_i",
		"next3_payment_sum",
		"next4_payment_d",
		"next4_payment_r",
		"next4_payment_i",
		"next4_payment_sum",
		"d_total",
		"r_total",
		"i_total",
		"total_amount",
		"payment_month",
	);
	var $numeric_non_currency_field = array(
		'division_count',
		'number_of_researchers',
		'payment_month',
	);

	/**
	 * CSV取り込み、出力対象のカラム
	 *
	 * @var file_columns
	 */
	var $file_columns = array(
		'id',
		'entrust_id',
		'year',
		'cooperate_no',
		'researcher_no',
		'project_code',
		'project_type',
		'person_in_charge',
		'resolution_no',
		'branch_no',
		'reception_date',
		'start_budget_year',
		'credit',
		'researcher_name',
		'department',
		'major_name',
		'institute_code',
		'school_code',
		'course_code',
		'job_title',
		'extension',
		'post_no',
		'email',
		'subject',
		'start_date',
		'end_date',
		'area_of_research',
		'singular_or_multi',
		'new_or_continuance',
		'payment',
		'division_count',
		'continuance_no',
		'applicant_name_1',
		'category_of_business',
		'association_type',
		'applicant_scale',
		'applicant_name_2',
		'business_title',
		'representative',
		'address',
		'associate_researcher_name',
		'number_of_researchers',
		'formula',
		'former_payment_d',
		'former_payment_r',
		'former_payment_i',
		'former_payment_sum',
		'current_payment_dr',
		'current_payment_u',
		'current_payment_g',
		'current_payment_d',
		'current_payment_r',
		'current_payment_i',
		'current_payment_sum',
		'current_payment_alloc',
		'next1_payment_d',
		'next1_payment_r',
		'next1_payment_i',
		'next1_payment_sum',
		'next2_payment_d',
		'next2_payment_r',
		'next2_payment_i',
		'next2_payment_sum',
		'next3_payment_d',
		'next3_payment_r',
		'next3_payment_i',
		'next3_payment_sum',
		'next4_payment_d',
		'next4_payment_r',
		'next4_payment_i',
		'next4_payment_sum',
		'd_total',
		'r_total',
		'i_total',
		'total_amount',
		'contraction_date',
		'resolution_date',
		'payment_due',
		'payment_month',
		'payment_date',
		'advance',
		'ow_post_no',
		'ow_address',
		'ow_company_name',
		'ow_section',
		'ow_title',
		'ow_name',
		'ow_tel',
		'ow_fax',
		'ow_email',
		'bill_post_no',
		'bill_address',
		'bill_company_name',
		'bill_section',
		'bill_title',
		'bill_name',
		'bill_tel',
		'bill_fax',
		'bill_email',
		'entrust_remarks',
	);

	var $easy_search_field = array(
		'researcher_name',
	);


	/**
	 * 横断検索用テーブルへのマッピングデータ
	 * @var <type>
	 */
	var $summarize_field = array(
		'department' => 'department',
		'researcher_name' => 'researcher_name',
		'job_title' => 'job_title',
		'amount' => 'current_payment_sum',
		'direct_cost' => 'current_payment_d',
		'indirect_cost' => 'current_payment_i',
		'year' => 'year',
		'research_type' => null,
		'subject' => 'subject',
		'fund_owner' => 'applicant_name_1',
		'start_date' => 'start_date',
		'end_date' => 'end_date',
		'memo' => 'resolution_no',
		'research_area' => "area_of_research",
		'researcher_no' => 'researcher_no',
		'cooperate_no' => 'cooperate_no',
		'disabled' => 'disabled',
		'open_to_public' => 'open_to_public',
		'major_name' => 'major_name',           // #270
		'unaggregate' => 'unaggregate',           // ICI#26
		'project_code' => 'project_code',           // ICI#27
		'institute_code' => 'institute_code',
		'school_code' => 'school_code',
		'course_code' => 'course_code',
	);

	var $hasMany = array(
		'EntrustNode' => array(
			'className' => 'EntrustNode',
			'foreign_key' => 'entrust_id',
			'conditions' => array(
				"not" => array(
					array('EntrustNode.entrust_id' => null),
					array('EntrustNode.disabled' => true),
				),
			),
			'order' => 'EntrustNode.id asc',
			'dependent' => true,
		)
	);

	/**
	 * コンストラクタ
	 *
	 * @param int	$id	編集するデータID
	 * @param string $table 編集対象のテーブル
	 * @param string $ds	データソース
	 */
	function __construct($id = null, $table = null, $ds = null)
	{
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
	 * 保存直前にユーザー情報をフィールドにセットする。
	 *
	 * @param array $options 引数配列
	 *
	 * @return boolean 成功・失敗
	 *
	 * @todo あとでapp_modelに移動させるかも
	 *
	 * */
	function beforeSave($options = array())
	{
		parent::beforeSave($options);
		return $this->setUserInfo("Entrust");
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
		$copy_array = array("year", "project_code", "project_type", "person_in_charge",
			"subject", "area_of_research",
		);
		$rec2 = array();
		foreach ($copy_array as $k) {
			$rec2["Entrust"][$k] = $rec["Entrust"][$k];
		}
		$rec2["Entrust"]["entrust_id"] = $parent_id;
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
		$rec = $this->findAllByEntrustId($parent_id);
		if (!$rec) {
			return true;
		}

		// 取得した子ノードが1個だけなら親へコピーして終了
		if (1 == count($rec)) {
			// 親を取得
			$parent_rec = $this->read(null, $parent_id);
			foreach ($parent_rec["Entrust"] as $k => $v) {
				if ($k != "id" && $k != "entrust_id") {
					$parent_rec["Entrust"][$k] = $rec[0]["Entrust"][$k];
				}
			}
			return $this->save($parent_rec);
		}

		// 再計算する項目
		$key_array = array(
			"credit",
			"former_payment_d",
			"former_payment_r",
			"former_payment_i",
			"former_payment_sum",
			"current_payment_dr",
			"current_payment_u",
			"current_payment_g",
			"current_payment_d",
			"current_payment_r",
			"current_payment_i",
			"current_payment_sum",
			"current_payment_alloc",
			"next1_payment_d",
			"next1_payment_r",
			"next1_payment_i",
			"next1_payment_sum",
			"next2_payment_d",
			"next2_payment_r",
			"next2_payment_i",
			"next2_payment_sum",
			"next3_payment_d",
			"next3_payment_r",
			"next3_payment_i",
			"next3_payment_sum",
			"next4_payment_d",
			"next4_payment_r",
			"next4_payment_i",
			"next4_payment_sum",
			"d_total",
			"r_total",
			"i_total",
			"total_amount",
		);

		// 初期化
		$sum = array();
		foreach($key_array as $k) {
			$sum[$k] = 0;
		}

		foreach ($rec as $item) {
			foreach($key_array as $k) {
				// 必要な項目を足し算
				$sum[$k]  += $item["Entrust"][$k];
			}
		}
		// 足した項目を含めて保存
		$parent_rec = $this->read(null, $parent_id);

		foreach($key_array as $k) {
			$parent_rec["Entrust"][$k] = $sum[$k];
		}
		return $this->save($parent_rec);
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
