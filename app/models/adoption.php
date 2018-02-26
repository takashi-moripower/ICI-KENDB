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
 * Adoption
 *
 * 科研費(文科・学振)のモデル
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
class Adoption extends AppModel {

    var $name = 'Adoption';
    var $uses = array("Adoption", "Summary");
    var $actsAs = array('Search.Searchable', 'SoftDeletable' => array('field' => 'disabled', 'find' => false));
    var $download_file_prefix = "kaken_monka";
    var $file_columns = array(
        'id',
        'year',
        'type_no',
        'grant_delivery_institute',
        'appointment_date',
        'decision_date',
        'payment_date',
        'advance_application_reception_date',
        'move_out_in_etc',
        'research_type',
        'screening',
        'end_before_application',
        'contribution',
        'detail_ambit_no',
        'division_a_b',
        'research_number_points',
        'arrange_no',
        'problem_no',
        'new_or_continuance',
        'name',
//		'CurrentAge',
//		'BirthdayYMD',
        'department',
        'notifying_department',
        'statistical_department',
        'major_name',
        'institute_code',
        'school_code',
        'course_code',
        'application_job',
        'current_job_title',
        'statistical_job',
        'this_year_application_amount',
        'current_payment_sum_appointment',
        'current_payment_d_appointment',
        'current_payment_i_appointment',
        'next1_payment_d_appointment',
        'next2_payment_d_appointment',
        'next3_payment_d_appointment',
        'next4_payment_d_appointment',
        'next5_payment_d_appointment',
        'current_payment_sum',
        'current_payment_d',
        'current_payment_i',
        'next1_payment_d',
        'next2_payment_d',
        'next3_payment_d',
        'next4_payment_d',
        'next5_payment_d',
        'researcher_no',
        'researcher_assignment',
        'remarks1',
        'grant_reception_date',
        'total_primary_cost',
        'detail_goods_cost',
        'detail_travel_cost',
        'detail_gratuity_cost',
        'detail_other_cost',
        'remarks_issue_application',
        'contribution_count',
        'contribution_amount',
        'contribution_partition',
        'adjudicator',
        'contribution_remarks',
        'achievement_report_reception_date',
        'achievement_primary_cost',
        'achievement_detail_goods_cost',
        'achievement_detail_travel_cost',
        'achievement_detail_gratuity_cost',
        'achievement_detail_other_cost',
        'achievement_indirect_cost',
        'achievement_remarks',
        'achievement_carried_report_reception_date',
        'achievement_carried_primary_cost',
        'achievement_carried_detail_goods_cost',
        'achievement_carried_detail_travel_cost',
        'achievement_carried_detail_gratuity_cost',
        'achievement_carried_detail_other_cost',
        'achievement_carried_indirect_cost',
        'carried_titech_assignment_no',
        'carried_primary_cost',
        'carried_detail_goods_cost',
        'carried_detail_travel_cost',
        'carried_detail_gratuity_cost',
        'carried_detail_other_cost',
        'carried_indirect_cost',
        'process_carried_remarks',
        'fixed_amount',
        'fixed_amount_primary_cost',
        'fixed_amount_indirect_cost',
        'turnback_amount',
        'turnback_amount_primary_cost',
        'turnback_amount_indirect_cost',
        'turnback_amount_remarks',
        'self_assessment_person',
        'self_assessment_date',
        'self_assessment_remarks',
        'accomplishment_object_person',
        'accomplishment_date',
        'process_date',
        'accomplishment_scheduled_date',
        'accomplishment_remarks',
        'extension',
        'fax',
        'post_no',
        'email',
        'special_mention',
        'cooperate_no',
        'personal_no', # 職員番号
        'unaggregate', # 集計非対象    (ICI#26)
    );
    var $date_columns = array(
        'appointment_date',
        'decision_date',
        'payment_date',
        'advance_application_reception_date',
        'grant_reception_date',
        'achievement_report_reception_date',
        'achievement_carried_report_reception_date',
        'self_assessment_date',
        'accomplishment_date',
        'process_date',
        'accomplishment_scheduled_date',
    );
    var $numeric_search_field = array(
        'year',
        'this_year_application_amount',
        'current_payment_sum_appointment',
        'current_payment_d_appointment',
        'current_payment_i_appointment',
        'next1_payment_d_appointment',
        'next2_payment_d_appointment',
        'next3_payment_d_appointment',
        'next4_payment_d_appointment',
        'next5_payment_d_appointment',
        'current_payment_sum',
        'current_payment_d',
        'current_payment_i',
        'next1_payment_d',
        'next2_payment_d',
        'next3_payment_d',
        'next4_payment_d',
        'next5_payment_d',
        'total_primary_cost',
        'detail_goods_cost',
        'detail_travel_cost',
        'detail_gratuity_cost',
        'detail_other_cost',
        'contribution_count',
        'contribution_amount',
        'contribution_partition',
        'achievement_primary_cost',
        'achievement_detail_goods_cost',
        'achievement_detail_travel_cost',
        'achievement_detail_gratuity_cost',
        'achievement_detail_other_cost',
        'achievement_indirect_cost',
        'achievement_carried_primary_cost',
        'achievement_carried_detail_goods_cost',
        'achievement_carried_detail_travel_cost',
        'achievement_carried_detail_gratuity_cost',
        'achievement_carried_detail_other_cost',
        'achievement_carried_indirect_cost',
        'carried_primary_cost',
        'carried_detail_goods_cost',
        'carried_detail_travel_cost',
        'carried_detail_gratuity_cost',
        'carried_detail_other_cost',
        'carried_indirect_cost',
        'fixed_amount',
        'fixed_amount_primary_cost',
        'fixed_amount_indirect_cost',
        'turnback_amount',
        'turnback_amount_primary_cost',
        'turnback_amount_indirect_cost',
    );
    var $numeric_non_currency_field = array(
        'contribution_count',
    );
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
        'appointment_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'decision_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'payment_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'advance_application_reception_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_application_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'current_payment_sum_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'current_payment_d_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'current_payment_i_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'next1_payment_d_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'next2_payment_d_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'next3_payment_d_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'next4_payment_d_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'next5_payment_d_appointment' => array(
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
        'current_payment_d' => array(
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
        'next1_payment_d' => array(
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
        'next3_payment_d' => array(
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
        'next5_payment_d' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'researcher_no' => array(
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'allowEmpty' => true,
            ),
        ),
        'grant_reception_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'total_primary_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'detail_goods_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'detail_travel_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'detail_gratuity_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'detail_other_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'contribution_count' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'contribution_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'contribution_partition' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_report_reception_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_primary_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_detail_goods_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_detail_travel_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_detail_gratuity_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_detail_other_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_indirect_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_carried_report_reception_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_carried_primary_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_carried_detail_goods_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_carried_detail_travel_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_carried_detail_gratuity_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_carried_detail_other_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'achievement_carried_indirect_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'carried_primary_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'carried_detail_goods_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'carried_detail_travel_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'carried_detail_gratuity_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'carried_detail_other_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'carried_indirect_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'fixed_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'fixed_amount_primary_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'fixed_amount_indirect_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'turnback_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'turnback_amount_primary_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'turnback_amount_indirect_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'self_assessment_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'accomplishment_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'process_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'accomplishment_scheduled_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
//		'extension' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				'allowEmpty' => true,
//			),
//		),
        'fax' => array(
            'numericHyphen' => array(
                'rule' => array('numericHyphen'),
                'allowEmpty' => true,
            ),
        ),
//		'post_no' => array(
//			'alphaNumericHyphen' => array(
//				'rule' => array('alphaNumericHyphen'),
//				'allowEmpty' => true,
//			),
//		),
        'cooperate_no' => array(
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'personal_no' => array(
            'alphaNumeric' => array(
                'rule' => array('alphaNumeric'),
                'allowEmpty' => false,
                'message'=>'英数字以外が含まれている'
            ),
            'length'=>array(
                'rule'=>array('equallength',8),
                'message'=>'8文字で入力してください'
            )
        ),
    );

    /**
     * 教員情報を一括更新する際の対象カラム
     */
    var $researcher_update_column = array(
        'researcher_no' => 'researcher_no',
        'researcher_name' => 'name',
        'cooperate_no' => 'cooperate_no',
        'department' => 'department',
        'notifying_department' => 'notifying_department',
        'statistical_department' => 'statistical_department',
        'job_title' => 'current_job_title',
        'statistical_job_title' => 'statistical_job',
        //'major_name' => 'major_name',
        'extension' => 'extension',
        'fax' => 'fax',
        'email' => 'email',
        'post_no' => 'post_no',
    );

    /**
     * サマリーテーブルに格納する対応フィールド表
     *
     * @var array
     */
    var $summarize_field = array(
        'department' => 'statistical_department',
        'researcher_name' => 'name',
        'job_title' => 'statistical_job',
        'amount' => 'current_payment_sum',
        'direct_cost' => 'current_payment_d',
        'indirect_cost' => 'current_payment_i',
        'year' => 'year',
        'research_type' => 'research_type',
        'subject' => 'researcher_assignment',
        'fund_owner' => 'grant_delivery_institute',
        'research_area' => null,
        'start_date' => null,
        'end_date' => null,
        'researcher_no' => 'researcher_no',
        'cooperate_no' => 'cooperate_no',
        'disabled' => 'disabled',
        'open_to_public' => 'open_to_public',
        'major_name' => 'major_name', // #270
        'unaggregate' => 'unaggregate', // ICI#26
        'project_code' => 'problem_no', // ICI#27
        'institute_code' => 'institute_code',
        'school_code' => 'school_code',
        'course_code' => 'course_code',
    );

    /**
     * 簡易検索の対象フィールド
     * @var array
     */
    var $easy_search_field = array(
        'problem_no',
        'name',
        'research_type'
    );

    /**
     * 出力時の文字列置き換え(Excel,CSVダウンロードとか)
     *
     * @var array
     */
    var $output_column_label_alias = array(
        'current_payment_sum' => '本年度合計',
        'achievement_report_reception_date' => '実績報告書受付日',
        'contribution_partition' => '分配金実配分額',
        'unaggregate' => '集計外', // ICI#26
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
        $this->log("Adoption.beforeSave:in", LOG_DEBUG);

        parent::beforeSave($options);

        $result = $this->setUserInfo("Adoption");

        $this->log("Adoption.beforeSave:out result=" . var_export($result, true), LOG_DEBUG);
        return $result;
    }

    /**
     * 保存後の後処理
     *
     * @param boolean $created
     */
    function afterSave($created) {
        $this->saveToSummary($this, $created);
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
            if ($v == "name") {
                continue; // 名前は特殊検索する
            }
            if ($v == "year" || $v == "id") {
                $t = "value";
            } else {
                $t = "like";
            }
            $this->filterArgs[] = array('name' => $v, 'type' => $t);
        }
        $this->filterArgs[] = array('name' => 'name', 'type' => 'query', 'method' => 'findWithLike');
        $this->mergeValidateRules();
    }

    // 研究者代表者はスペースを無視して検索できるようにする
    public function findWithLike($data = array()) {
        $keyword = trim(preg_replace("/　/", " ", $data['name']));
        $keywords = explode(" ", $keyword);
        $q = implode("%", $keywords);

        $conditions = array("replace(replace(name, '　', ''), ' ', '') LIKE" => "%{$q}%");
        return $conditions;
    }

}

?>
