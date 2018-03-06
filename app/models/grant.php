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
 * Grant
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
class Grant extends AppModel {

    var $name = 'Grant';
    var $actsAs = array('Search.Searchable', 'SoftDeletable' => array('field' => 'disabled', 'find' => false));
    var $download_file_prefix = "hojo_sonota";
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
        'adoption_year' => array(
            'nendoRange' => array(
                'rule' => array('nendoRange'),
                'allowEmpty' => true,
            ),
        ),
        'cooperate_no' => array(
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'project_code' => array(
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'allowEmpty' => false,
            ),
        ),
        'assignment_no' => array(
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'grant_initial_decision_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'grant_initial_start_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'grant_initial_end_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'grant_this_year_decision_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'grant_this_year_start_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'grant_this_year_end_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'balance_carried_forward' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'grant_this_year_decision_money' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'grant_this_year_reception_amount' => array(
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
        'self_contribute_money' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'other_cost' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'delegate_1_money' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'delegate_2_money' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'delegate_3_money' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'delegate_4_money' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'kaken_system_registration_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'reception_status_entry_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'researcher_no' => self::VALIDATION_PERSONAL_NO
    );
    var $file_columns = array(
        'id',
        'grant_id',
        'year',
        'adoption_year',
        'cooperate_no',
        'researcher_no',
        'project_code',
        'assignment_no',
        'grant_name',
        'grant_project_name',
        'project_assignment_name',
        'grant_initial_decision_date',
        'grant_initial_start_date',
        'grant_initial_end_date',
        'grant_this_year_decision_date',
        'grant_this_year_start_date',
        'grant_this_year_end_date',
        'represent_type',
        'represent_researcher_name',
        'job_title',
        'department',
        'major_name',
        'institute_code',
        'school_code',
        'course_code',
        'grant_funds_institute',
        'grant_delivery_institute',
        'delegate_1',
        'delegate_2',
        'delegate_3',
        'delegate_4',
        'singular_or_multi',
        'balance_carried_forward',
        'grant_this_year_decision_money',
        'grant_this_year_reception_amount',
        'primary_cost',
        'indirect_cost',
        'general_administration_cost',
        'self_contribute_money',
        'other_cost',
        'delegate_1_money',
        'delegate_2_money',
        'delegate_3_money',
        'delegate_4_money',
        'billing_type',
        'kaken_system_registration_date',
        'reception_status_entry_date',
        'remarks1',
        'remarks2',
        'remarks3',
    );
    var $date_columns = array(
        'grant_initial_decision_date',
        'grant_initial_start_date',
        'grant_initial_end_date',
        'grant_this_year_decision_date',
        'grant_this_year_start_date',
        'grant_this_year_end_date',
        'kaken_system_registration_date',
        'reception_status_entry_date',
    );
    var $numeric_search_field = array(
        'year',
        'adoption_year',
        'balance_carried_forward',
        'grant_this_year_decision_money',
        'grant_this_year_reception_amount',
        'primary_cost',
        'indirect_cost',
        'general_administration_cost',
        'self_contribute_money',
        'other_cost',
        'delegate_1_money',
        'delegate_2_money',
        'delegate_3_money',
        'delegate_4_money',
    );
    var $numeric_non_currency_field = array(
        'adoption_year',
    );

    /**
     * 横断検索用テーブルへのマッピングデータ
     * @var <type>
     */
    var $summarize_field = array(
        'department' => 'department',
        'researcher_name' => 'represent_researcher_name',
        'job_title' => 'job_title',
        'amount' => 'grant_this_year_reception_amount',
        'direct_cost' => 'primary_cost',
        'indirect_cost' => 'indirect_cost',
        'year' => 'year',
        'research_type' => 'grant_project_name',
        'subject' => 'project_assignment_name',
        'fund_owner' => 'grant_funds_institute',
        'start_date' => 'grant_initial_start_date',
        'end_date' => 'grant_initial_end_date',
        'memo' => 'assignment_no',
        'research_area' => 'grant_project_name',
        'researcher_no' => 'researcher_no',
        'cooperate_no' => 'cooperate_no',
        'disabled' => 'disabled',
        'open_to_public' => 'open_to_public',
        'major_name' => 'major_name', // 270
        'unaggregate' => 'unaggregate', // ICI#26
        'project_code' => 'project_code', // ICI#27
        'institute_code' => 'institute_code',
        'school_code' => 'school_code',
        'course_code' => 'course_code',
    );
    var $hasMany = array(
        'GrantNode' => array(
            'className' => 'GrantNode',
            'foreign_key' => 'grant_id',
            'conditions' => array(
                "not" => array(
                    array('GrantNode.grant_id' => null),
                    array('GrantNode.disabled' => true),
                ),
            ),
            'order' => 'GrantNode.id asc',
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
     * 簡単検索の対象フィールド
     *
     * @var array
     */
    var $easy_search_field = array(
        'represent_researcher_name',
        'grant_project_name'
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
        return $this->setUserInfo("Grant");
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
    public function findWithLike($data = array()) {
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
    function makeNodeData($parent_id) {
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
        $copy_array = array("year", "project_code", "grant_name", "grant_project_name",
            "project_assignment_name",
        );
        $rec2 = array();
        foreach ($copy_array as $k) {
            $rec2["Grant"][$k] = $rec["Grant"][$k];
        }
        $rec2["Grant"]["grant_id"] = $parent_id;
        return $rec2;
    }

    /**
     * 子ノードを全件取得して再計算する
     *
     * @param int $parent_id 親データのID
     */
    function recalcNode($parent_id) {
        // まず子ノードを取得
        $this->recursive = 0;
        $rec = $this->findAllByGrantId($parent_id);
        if (!$rec) {
            return true;
        }

        // 取得した子ノードが1個だけなら親へコピーして終了
        if (1 == count($rec)) {
            // 親を取得
            $parent_rec = $this->read(null, $parent_id);
            foreach ($parent_rec["Grant"] as $k => $v) {
                if ($k != "id" && $k != "grant_id") {
                    $parent_rec["Grant"][$k] = $rec[0]["Grant"][$k];
                }
            }
            return $this->save($parent_rec);
        }

        // 再計算する項目
        $key_array = array("balance_carried_forward", "grant_this_year_decision_money", "grant_this_year_reception_amount", "primary_cost",
            "indirect_cost", "general_administration_cost", "self_contribute_money", "other_cost",
            "delegate_1_money",
            "delegate_2_money", "delegate_3_money", "delegate_4_money",
        );

        // 初期化
        $sum = array();
        foreach ($key_array as $k) {
            $sum[$k] = 0;
        }

        foreach ($rec as $item) {
            foreach ($key_array as $k) {
                // 必要な項目を足し算
                $sum[$k] += $item["Grant"][$k];
            }
        }
        // 足した項目を含めて保存
        $parent_rec = $this->read(null, $parent_id);

        foreach ($key_array as $k) {
            $parent_rec["Grant"][$k] = $sum[$k];
        }
        return $this->save($parent_rec);
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
