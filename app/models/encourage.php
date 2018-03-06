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
 * Encourage
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
class Encourage extends AppModel {

    var $name = 'Encourage';
    var $actsAs = array('Search.Searchable', 'SoftDeletable' => array('field' => 'disabled', 'find' => false));
    var $download_file_prefix = "kaken_tokken";
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
                'allowEmpty' => true,
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
        'recruiting_year' => array(
            'warekiRange' => array(
                'rule' => array('warekiRange'),
                'allowEmpty' => true,
            ),
        ),
        'reception_no' => array(
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_advance_application_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'recruit_start_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'recruit_end_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'research_plan_reception_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'confirmation_statement_date' => array(
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
        'this_year_distributed_amount_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'next_year_distributed_amount_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'next2_year_distributed_amount_appointment' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_distributed_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'next_year_distributed_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'next2_year_distributed_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'acceptance_statement' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'acceptance_application_reception_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'issue_application_reception_date' => array(
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
        'balance_carried' => array(
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
        'fixed_amount' => array(
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
        'extension' => array(
            'numericHyphen' => array(
                'rule' => array('numericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'fax' => array(
            'numericHyphen' => array(
                'rule' => array('numericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => 'email',
                'allowEmpty' => true,
            ),
        ),
        'received_researcher_email' => array(
            'email' => array(
                'rule' => 'email',
                'allowEmpty' => true,
            ),
        ),
        'mobile_phone' => array(
            'numericHyphen' => array(
                'rule' => array('numericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'personal_no' => self::VALIDATION_PERSONAL_NO,
        'researcher_no' => self::VALIDATION_PERSONAL_NO,
    );

    /**
     * ファイルに出力するカラム
     *
     * @var array
     */
    var $file_columns = array(
        'id',
        'year',
        'appointment_date',
        'decision_date',
        'payment_date',
        'moving_history',
        'domestic_or_not',
        'classification',
        'new_or_continuance',
        'sex',
        'recruiting_year',
        'reception_no',
        'assignment_no',
        'this_year_advance_application_date',
        'qualification_and_others',
        'ambit',
        'represent_researcher_name',
        'department_represent_researcher',
        'cooperate_no',
        'personal_no',
        'researcher_no',
        'facility_teacher',
        'foreigner_researcher',
        'appointment_department',
        'appointment_job_title',
        'statistical_department',
        'institute_code',
        'school_code',
        'course_code',
        'job_title',
        'major',
        'matriculation_number',
        'recruit_start_date',
        'recruit_end_date',
        'number_of_month',
        'remarks_change',
        'remarks_qualification',
        'remarks',
        'research_plan_reception_date',
        'confirmation_statement_date',
        'this_year_application_amount',
        'this_year_distributed_amount_appointment',
        'next_year_distributed_amount_appointment',
        'next2_year_distributed_amount_appointment',
        'this_year_distributed_amount',
        'next_year_distributed_amount',
        'next2_year_distributed_amount',
        'titech_assignment_no',
        'research_assignment',
        'acceptance_statement',
        'acceptance_application_reception_date',
        'issue_application_reception_date',
        'total_primary_cost',
        'detail_goods_cost',
        'detail_travel_cost',
        'detail_gratuity_cost',
        'detail_other_cost',
        'issue_application_remarks',
        'achievement_report_reception_date',
        'achievement_primary_cost',
        'achievement_detail_goods_cost',
        'achievement_detail_travel_cost',
        'achievement_detail_gratuity_cost',
        'achievement_detail_other_cost',
        'achievement_remarks',
        'achievement_carried_report_reception_date',
        'achievement_carried_primary_cost',
        'achievement_carried_detail_goods_cost',
        'achievement_carried_detail_travel_cost',
        'achievement_carried_detail_gratuity_cost',
        'achievement_carried_detail_other_cost',
        'carried_titech_assignment_no',
        'balance_carried',
        'carried_detail_goods_cost',
        'carried_detail_travel_cost',
        'carried_detail_gratuity_cost',
        'carried_detail_other_cost',
        'remarks_carried',
        'fixed_amount',
        'turnback_amount',
        'remarks_balance_fixed_turnback',
        'extension',
        'fax',
        'email',
        'mobile_phone',
        'post_no',
        'extension_researcher',
        'received_researcher_email',
    );

    /**
     * 日付カラム
     *
     * @var array
     */
    var $date_columns = array(
        'appointment_date',
        'decision_date',
        'payment_date',
        'this_year_advance_application_date',
        'recruit_start_date',
        'recruit_end_date',
        'research_plan_reception_date',
        'confirmation_statement_date',
        'acceptance_statement',
        'acceptance_application_reception_date',
        'issue_application_reception_date',
        'achievement_report_reception_date',
        'achievement_carried_report_reception_date',
    );

    /**
     * 数値で範囲検索対象とするカラム
     *
     * @var array
     */
    var $numeric_search_field = array(
        'year',
        'this_year_application_amount',
        'this_year_distributed_amount_appointment',
        'next_year_distributed_amount_appointment',
        'next2_year_distributed_amount_appointment',
        'this_year_distributed_amount',
        'next_year_distributed_amount',
        'next2_year_distributed_amount',
        'total_primary_cost',
        'detail_goods_cost',
        'detail_travel_cost',
        'detail_gratuity_cost',
        'detail_other_cost',
        'achievement_primary_cost',
        'achievement_detail_goods_cost',
        'achievement_detail_travel_cost',
        'achievement_detail_gratuity_cost',
        'achievement_detail_other_cost',
        'achievement_carried_primary_cost',
        'achievement_carried_detail_goods_cost',
        'achievement_carried_detail_travel_cost',
        'achievement_carried_detail_gratuity_cost',
        'achievement_carried_detail_other_cost',
        'balance_carried',
        'carried_detail_goods_cost',
        'carried_detail_travel_cost',
        'carried_detail_gratuity_cost',
        'carried_detail_other_cost',
        'fixed_amount',
        'turnback_amount',
    );

    /**
     * 教員情報を一括更新する際の対象カラム
     */
    var $researcher_update_column = array(
        'researcher_no' => 'researcher_no',
        'researcher_name' => 'facility_teacher',
        'cooperate_no' => 'cooperate_no',
        'personal_no' => 'personal_no',
        'job_title' => 'job_title',
        'department' => 'statistical_department',
        'extension' => 'extension_researcher',
        'email' => 'received_researcher_email',
    );

    /**
     * Excel出力やラベル出力で特定名称に置き換えを行うデータと値
     *
     * @var array
     */
    var $output_column_label_alias = array(
        'moving_history' => '転入出等',
        'this_year_advance_application_date' => '立替申込書提出日',
        'job_title' => '職名(受入研究者)',
        'fixed_amount' => '確定額',
        'turnback_amount' => '返還額(残額)',
        'extension' => '内線番号(研究代表者)',
        'fax' => 'FAX番号(研究代表者)',
        'email' => 'Email(研究代表者)',
        'mobile_phone' => '携帯番号(特別研究員)',
        'post_no' => 'ポスト番号(研究代表者)',
        'received_researcher_email' => 'Email(受入研究者)',
        'facility_teacher' => '受入研究者',
    );
    var $easy_search_field = array(
        'represent_researcher_name',
        'facility_teacher',
        'foreigner_researcher',
        'recruiting_year', // この項目では検索できないかも
        'reception_no',
        'assignment_no',
        'domestic_or_not',
    );

    /**
     * 横断検索用テーブルへのマッピングデータ
     * @var <type>
     */
    /**
      var $summarize_field = array(
      'year' => 'year',
      'research_type' => null,
      'research_area' => null,
      'researcher_name' => 'facility_teacher',
      'department' => 'appointment_department',
      'job_title' => 'appointment_job_title',
      'subject' => 'research_assignment',
      'start_date' => null,
      'end_date' => null,
      'amount' => 'this_year_distributed_amount',
      'amount2' => null,
      'researcher_no' => 'researcher_no',
      'cooperate_no' => 'cooperate_no',
      'disabled' => 'disabled',
      'open_to_public' => 'open_to_public',
      );
     */

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
        return $this->setUserInfo("Encourage");
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
            if ($v == "facility_teacher") {
                continue; // 名前は特殊検索する
            }
            if ($v == "year" || $v == "id") {
                $t = "value";
            } else {
                $t = "like";
            }
            $this->filterArgs[] = array('name' => $v, 'type' => $t);
        }
        $this->filterArgs[] = array('name' => 'facility_teacher', 'type' => 'query', 'method' => 'findWithLike');
        $this->mergeValidateRules();
    }

    // 研究者代表者はスペースを無視して検索できるようにする
    public function findWithLike($data = array()) {
        $keyword = trim(preg_replace("/　/", " ", $data['facility_teacher']));
        $keywords = explode(" ", $keyword);
        $q = implode("%", $keywords);

        $conditions = array("replace(replace(facility_teacher, '　', ''), ' ', '') LIKE" => "%{$q}%");
        return $conditions;
    }

    /**
     * データ保存後の処理
     *
     * @param boolean $created
     */
    /**
      function  afterSave($created)
      {
      $this->saveToSummary($this, $created);
      }
     *
     */
}

?>
