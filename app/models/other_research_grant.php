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
 * OtherResearchGrant
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
class OtherResearchGrant extends AppModel {

    var $name = 'OtherResearchGrant';
    var $actsAs = array('Search.Searchable', 'SoftDeletable' => array('field' => 'disabled', 'find' => false));
    var $download_file_prefix = "hojo_kankyo";
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
        'grant_initial_appointment_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'grant_initial_decision_date' => array(
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
        'paying_for_day' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'cooperate_no' => array(
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_application_amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_total_at_decision' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_direct_at_decision' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_indirect_at_decision' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_application_amount_sum' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_direct_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'this_year_indirect_cost' => array(
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
        'contribution_partition' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'research_start_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'research_end_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'project_start_year' => array(
            'nendoRange' => array(
                'rule' => array('nendoRange'),
                'allowEmpty' => true,
            ),
        ),
        'project_end_year' => array(
            'nendoRange' => array(
                'rule' => array('nendoRange'),
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
            )
        ),
        'personal_no' => self::VALIDATION_PERSONAL_NO,
        'researcher_no' => self::VALIDATION_PERSONAL_NO,
    );
    var $file_columns = array(
        'id',
        'year',
        'grant_initial_appointment_date',
        'grant_initial_decision_date',
        'payment_date',
        'paying_for_day',
        'moving_history',
        'business_name',
        'titech_assignment_no',
        'assignment_no',
        'new_or_continuance',
        'cooperate_no',
        'personal_no',
        'researcher_no',
        'name',
        'represent_researcher',
        'notifying_department',
        'statistical_department',
        'affiliated_major_name',
        'statistical_job',
        'institute_code',
        'school_code',
        'course_code',
        'this_year_application_amount',
        'this_year_total_at_decision',
        'this_year_direct_at_decision',
        'this_year_indirect_at_decision',
        'this_year_application_amount_sum',
        'this_year_direct_cost',
        'this_year_indirect_cost',
        'research_assignment',
        'contribution_count',
        'contribution_partition',
        'contribution_remarks',
        'research_start_date',
        'research_end_date',
        'project_start_year',
        'project_end_year',
        'remarks',
        'extension',
        'fax',
        'post_no',
        'email',
    );
    var $date_columns = array(
        'grant_initial_appointment_date',
        'grant_initial_decision_date',
        'payment_date',
        'paying_for_day',
        'research_start_date',
        'research_end_date',
    );
    var $numeric_search_field = array(
        'year',
        'this_year_application_amount',
        'this_year_total_at_decision',
        'this_year_direct_at_decision',
        'this_year_indirect_at_decision',
        'this_year_application_amount_sum',
        'this_year_direct_cost',
        'this_year_indirect_cost',
        'contribution_count',
        'contribution_partition',
        'project_start_year',
        'project_end_year',
    );

    /**
     * 教員情報を一括更新する際の対象カラム
     */
    var $researcher_update_column = array(
        'researcher_no' => 'researcher_no',
        'personal_no' => 'personal_no',
        'researcher_name' => 'name',
        'cooperate_no' => 'cooperate_no',
        'notifying_department' => 'notifying_department',
        'statistical_department' => 'statistical_department',
        //'major_name' => 'affiliated_major_name',
        'statistical_job_title' => 'statistical_job',
        'extension' => 'extension',
        'fax' => 'fax',
        'email' => 'email',
        'post_no' => 'post_no',
    );

    /**
     * 簡易検索対象フィールド
     * @var array
     */
    var $easy_search_field = array(
        'assignment_no',
        'name',
        'titech_assignment_no',
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
        'amount' => 'this_year_application_amount_sum',
        'direct_cost' => 'this_year_direct_cost',
        'indirect_cost' => 'this_year_indirect_cost',
        'year' => 'year',
        'research_type' => 'business_name',
        'subject' => 'research_assignment',
        'fund_owner' => null,
        'start_date' => null,
        'end_date' => null,
        'research_area' => 'business_name',
        'amount2' => null, // 使わない？
        'researcher_no' => 'researcher_no',
        'cooperate_no' => 'cooperate_no',
        'disabled' => 'disabled',
        'open_to_public' => 'open_to_public',
        'major_name' => 'affiliated_major_name', // #270
        'unaggregate' => 'unaggregate', // ICI#26
        'project_code' => 'assignment_no', // ICI#27
        'institute_code' => 'institute_code', // 院
        'school_code' => 'school_code', // 系
        'course_code' => 'course_code', // コース
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
        return $this->setUserInfo("OtherResearchGrant");
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

    /**
     * データ保存後の処理
     *
     * @param boolean $created
     */
    function afterSave($created) {
        $this->saveToSummary($this, $created);
    }

}

?>
