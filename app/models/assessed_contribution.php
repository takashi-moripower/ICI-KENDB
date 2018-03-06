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
 * AssessedContribution
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
class AssessedContribution extends AppModel {

    var $name = 'AssessedContribution';
    var $actsAs = array('Search.Searchable', 'SoftDeletable' => array('field' => 'disabled', 'find' => false));
    var $download_file_prefix = "kaken_buntan";
    var $file_columns = array(
        'id',
        'year',
        'representative_affiliation',
        'representative_department',
        'representative_job_type',
        'representative_name',
        'cooperate_no',
        'personal_no',
        'co_researcher_no',
        'co_researcher_department',
        'co_researcher_major_name',
        'institute_code',
        'school_code',
        'course_code',
        'co_researcher_job_type',
        'department_no',
        'co_researcher_name',
        'post_no',
        'extension',
        'fax',
        'email',
        'moving_history',
        'research_type',
        'title_no',
        'titech_assignment_no',
        'project',
        'primary_cost',
        'detail_good_cost',
        'detail_trip_cost',
        'detail_reward_cost',
        'detail_other',
        'indirect_cost',
        'remarks',
        'is_distributed_amount_change',
        'distributed_amount_change',
        'change_detail_good_cost',
        'change_detail_trip_cost',
        'change_detail_reward_cost',
        'change_detail_other',
        'change_indirect_cost',
        'remarks_distributed_change',
        'contribution_repartition_official_letter',
        'detail_cost_check',
        'recept_commission_request_date',
        'recept_commission_recept_date',
        'request_transfer',
        'representative_organization_send',
        'payment_date',
        'recovery_date',
        'payment_confirmed_date',
        'research_plan_contact',
        'contribution_repartition_official_letter_distributed_change',
        'detail_cost_check_amount_change',
        'recept_commission_request_date_distributed_change',
        'recept_commission_recept_date_distributed_change',
        'request_transfer_distributed_change',
        'representative_organization_send_distributed_change',
        'payment_date_distributed_change',
        'recovery_date_distributed_change',
        'payment_confirmed_date_distributed_change',
        'research_plan_contact_distributed_change',
        'remarks_distributed_change_process',
        'exhibit_overdue',
        'exhibit_induction_date',
        'real_primary_cost',
        'expense_detail_goods_cost',
        'expense_detail_trip_cost',
        'expense_detail_reward_cost',
        'expense_detail_other',
        'real_indirect_cost',
        'turnback_payment_amount',
        'turnback_indirect_amount',
        'remarks',
        'represent_postal_no',
        'address',
        'research_institute_name',
        'office_in_charge',
        'person_in_charge',
        'tel_in_charge',
        'fax_in_charge',
        'email_in_charge',
        'other_contact_in_charge',
        'remarks_other',
        'unaggregate', # 集計非対象    (ICI#26)
    );
    var $date_columns = array(
        'contribution_repartition_official_letter',
        'recept_commission_request_date',
        'recept_commission_recept_date',
        'request_transfer',
        'representative_organization_send',
        'payment_date',
        'recovery_date',
        'payment_confirmed_date',
        'research_plan_contact',
        'contribution_repartition_official_letter_distributed_change',
        'recept_commission_request_date_distributed_change',
        'recept_commission_recept_date_distributed_change',
        'request_transfer_distributed_change',
        'representative_organization_send_distributed_change',
        'payment_date_distributed_change',
        'recovery_date_distributed_change',
        'payment_confirmed_date_distributed_change',
        'research_plan_contact_distributed_change',
        'exhibit_overdue',
        'exhibit_induction_date',
    );
    var $numeric_search_field = array(
        'year',
        'primary_cost',
        'detail_good_cost',
        'detail_trip_cost',
        'detail_reward_cost',
        'detail_other',
        'indirect_cost',
        'distributed_amount_change',
        'change_detail_good_cost',
        'change_detail_trip_cost',
        'change_detail_reward_cost',
        'change_detail_other',
        'change_indirect_cost',
        'real_primary_cost',
        'expense_detail_goods_cost',
        'expense_detail_trip_cost',
        'expense_detail_reward_cost',
        'expense_detail_other',
        'real_indirect_cost',
        'turnback_payment_amount',
        'turnback_indirect_amount',
    );
    var $easy_search_field = array(
        'title_no',
        'titech_assignment_no',
        'co_researcher_name',
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
        'cooperate_no' => array(
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        /*
          'co_researcher_no' => array(
          'alphanumeric' => array(
          'rule' => array('alphanumeric'),
          'allowEmpty' => true,
          ),
          ),
         */
        'department_no' => array(
            'numeric' => array(
                'rule' => array('numeric'),
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
                'rule' => array('email'),
                'allowEmpty' => true,
            ),
        ),
        'primary_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'detail_good_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'detail_trip_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'detail_reward_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'detail_other' => array(
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
        'distributed_amount_change' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'change_detail_good_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'change_detail_trip_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'change_detail_reward_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'change_detail_other' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'change_indirect_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'contribution_repartition_official_letter' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'recept_commission_request_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'recept_commission_recept_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'request_transfer' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'representative_organization_send' => array(
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
        'recovery_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'payment_confirmed_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'research_plan_contact' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'contribution_repartition_official_letter_distributed_change' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'recept_commission_request_date_distributed_change' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'recept_commission_recept_date_distributed_change' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'request_transfer_distributed_change' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'representative_organization_send_distributed_change' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'payment_date_distributed_change' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'recovery_date_distributed_change' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'payment_confirmed_date_distributed_change' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'research_plan_contact_distributed_change' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'exhibit_overdue' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'exhibit_induction_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'real_primary_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'expense_detail_goods_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'expense_detail_trip_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'expense_detail_reward_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'expense_detail_other' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'real_indirect_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'turnback_payment_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'turnback_indirect_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'represent_postal_no' => array(
            'numericHyphen' => array(
                'rule' => array('numericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'tel_in_charge' => array(
            'numericHyphen' => array(
                'rule' => array('numericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'fax_in_charge' => array(
            'numericHyphen' => array(
                'rule' => array('numericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'email_in_charge' => array(
            'email' => array(
                'rule' => array('email'),
                'allowEmpty' => true,
            ),
        ),
        'titech_assignment_no' => array(
            'isUnique' => array(
                'rule' => array('isUniqueInSameTitleNo'),
                'allowEmpty' => true,
            ),
            'between' => array(
                'rule' => array('between', 8, 8),
                'allowEmpty' => true,
            ),
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'personal_no' => self::VALIDATION_PERSONAL_NO,
        'co_researcher_no' => self::VALIDATION_PERSONAL_NO,
    );

    /**
     * 教員情報を一括更新する際の対象カラム
     */
    var $researcher_update_column = array(
        'cooperate_no' => 'cooperate_no',
        'personal_no' => 'personal_no',
        'researcher_no' => 'co_researcher_no',
        'researcher_name' => 'co_researcher_name',
        'department' => 'co_researcher_department',
        //'major_name' => 'co_researcher_major_name',
        'job_title' => 'co_researcher_job_type',
        'extension' => 'extension',
        'fax' => 'fax',
        'email' => 'email',
        'post_no' => 'post_no',
    );

    /**
     * サマリーテーブルに格納するフィールド
     */
    var $summarize_field = array(
        'department' => 'co_researcher_department',
        'researcher_name' => 'co_researcher_name',
        'job_title' => 'co_researcher_job_type',
        'amount' => null, // saveToSummaryで足し算
        'direct_cost' => 'primary_cost',
        'indirect_cost' => 'indirect_cost',
        'year' => 'year',
        'research_type' => 'research_type',
        'subject' => null,
        'fund_owner' => null,
        'project_code' => 'title_no',
        'research_area' => null,
        'start_date' => null,
        'end_date' => null,
        'researcher_no' => 'co_researcher_no',
        'cooperate_no' => 'cooperate_no',
        'disabled' => 'disabled',
        'open_to_public' => 'open_to_public',
        'major_name' => 'co_researcher_major_name', // #270
        'unaggregate' => 'unaggregate', // ICI#26
        'project_code' => 'title_no', // ICI#27
        'institute_code' => 'institute_code',
        'school_code' => 'school_code',
        'course_code' => 'course_code',
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
        return $this->setUserInfo("AssessedContribution");
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
            if ($v == "co_researcher_name") {
                continue; // 名前は特殊検索する
            }
            if ($v == "year" || $v == "id") {
                $t = "value";
            } else {
                $t = "like";
            }
            $this->filterArgs[] = array('name' => $v, 'type' => $t);
        }
        $this->filterArgs[] = array('name' => 'co_researcher_name', 'type' => 'query', 'method' => 'findWithLike');
        $this->mergeValidateRules();
    }

    // 研究者代表者はスペースを無視して検索できるようにする
    public function findWithLike($data = array()) {
        $keyword = trim(preg_replace("/　/", " ", $data['co_researcher_name']));
        $keywords = explode(" ", $keyword);
        $q = implode("%", $keywords);

        $conditions = array("replace(replace(co_researcher_name, '　', ''), ' ', '') LIKE" => "%{$q}%");
        return $conditions;
    }

    /**
     * 同一年度内同一課題番号内ではユニークであること
     *
     * @param array $data
     *
     * @return bookean
     */
    function isUniqueInSameTitleNo() {
        $conditions["year"] = @$this->data["AssessedContribution"]["year"];
        $conditions["titech_assignment_no"] = @$this->data["AssessedContribution"]["titech_assignment_no"];

        // データが空だったら無視
        if ($conditions["titech_assignment_no"] == "") {
            return true;
        }

        if (isset($this->data["AssessedContribution"]["id"])) {
            // 更新
            $conditions["id !="] = $this->data["AssessedContribution"]["id"];
        }
        $count = $this->find('count', array('conditions' => $conditions));
        return $count > 0 ? false : true;
    }

    /**
     * 更新時に自動でサマリーを更新
     *
     * @param boolean $created
     */
    function afterSave($created) {
        $this->saveToSummary($this, $created);
    }

}

?>
