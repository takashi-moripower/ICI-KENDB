<?php

/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link      none
 */

/**
 * Researcher
 *
 * 研究者情報
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class Researcher extends AppModel
{

    var $name = 'Researcher';
    var $useTable = 'researchers';
    var $displayField = 'name';
    var $download_file_prefix = "kenkyusha";
    var $actsAs = array('Search.Searchable');
    var $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'cooperate_no' => array(
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => true,
            ),
//            'isUnique' => array(
//                'rule' => array('isUnique'),
//                'on'=>'create',
//            ),
        ),
        'personal_no' => array(
            'alphanumeric' => array(
                'rule' => array('alphaNumeric'),
                'allowEmpty' => true,
            ),
//            'isUnique' => array(
//                'rule' => array('isUnique'),
//                'on'=>'create',
//            ),
        ),
        'researcher_no' => array(
            'alphanumeric' => array(
                'rule' => array('Numeric'),
                'allowEmpty' => true,
            ),
            'between' => array(
                'rule' => array('between', 8, 8),
            ),
//            'isUnique' => array(
//                'rule' => array('isUnique'),
//                'on'=>'create',
//            ),
        ),
        'researcher_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'kana' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'sex' => array(
        //'notempty' => array(
        //    'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
        //),
        ),
        'birth_year' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'birth_month' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'birth_day' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'sex_no' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'degree_no' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'affiliation_no' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'job_no' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'allowEmpty' => true,
            ),
        ),
        'detail_no' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'allowEmpty' => true,
            ),
        ),
        'transfer_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
        'erad_change_date' => array(
            'date' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
            ),
        ),
    );
    /**
     * CSVヘッダーのカラム名(日本語変換前)
     * @var array
     */
    var $file_columns = array(
        "cooperate_no",
        "personal_no",
        "researcher_no",
        "researcher_name",
        "kana",
        "sex",
        "birth_year",
        "birth_month",
        "birth_day",
        "degree",
        "department",
        "job_title",
        "sex_no",
        "degree_no",
        "affiliation_no",
        "job_no",
        "notifying_department",
        "statistical_department",
        "counting_department",
        "major_name",
        /* 院コード/系コード/コースコード追加 2016/03/14 Start */
        "institute_code",
        "school_code",
        "course_code",
        /* 院コード/系コード/コースコード追加 2016/03/14 End */
        "statistical_job_title",
        "formal_job_title",
        "extension",
        "fax",
        "email",
        "post_no",
        "qualification",
        "applicant_qualification",
        "detail_no",
        "group_name",
        "discipline",
        "branch",
        "detail",
        "comments",
        "transfer_date",
        "erad_change_date",
        "moving_history",
        "old_job_title",
        "changes",
        "remarks",
    );
    /**
     * CSVヘッダーのカラム名(日本語変換前/旧形式)
     * @var array
     */
    var $old_file_columns = array(
        "cooperate_no",
        "personal_no",
        "researcher_no",
        "researcher_name",
        "kana",
        "sex",
        "birth_year",
        "birth_month",
        "birth_day",
        "degree",
        "department",
        "job_title",
        "sex_no",
        "degree_no",
        "affiliation_no",
        "job_no",
        "notifying_department",
        "statistical_department",
        "counting_department",
        "major_name",
        "statistical_job_title",
        "formal_job_title",
        "extension",
        "fax",
        "email",
        "post_no",
        "qualification",
        "applicant_qualification",
        "detail_no",
        "group_name",
        "discipline",
        "branch",
        "detail",
        "comments",
        "transfer_date",
        "erad_change_date",
        "moving_history",
        "old_job_title",
        "changes",
        "remarks",
    );
    /**
     * 検索フィルター利用時の検索条件
     *
     * @var filterArgs
     */
    var $filterArgs = array(
        array('name' => "id", 'type' => 'value'),
        array('name' => "cooperate_no", 'type' => 'value'),
        array('name' => "personal_no", 'type' => 'value'),
        array('name' => "researcher_no", 'type' => 'value'),
        array('name' => "researcher_name", 'type' => 'like'),
        array('name' => "kana", 'type' => 'like'),
        array('name' => "sex", 'type' => 'value'),
        array('name' => "birth_year", 'type' => 'value'),
        array('name' => "birth_month", 'type' => 'value'),
        array('name' => "birth_day", 'type' => 'value'),
        array('name' => "degree", 'type' => 'value'),
        array('name' => "department", 'type' => 'like'),
        array('name' => "job_title", 'type' => 'value'),
        array('name' => "sex_no", 'type' => 'value'),
        array('name' => "degree_no", 'type' => 'value'),
        array('name' => "affiliation_no", 'type' => 'value'),
        array('name' => "job_no", 'type' => 'value'),
        array('name' => "notifying_department", 'type' => 'like'),
        array('name' => "statistical_department", 'type' => 'like'),
        array('name' => "counting_department", 'type' => 'like'),
        array('name' => "major_name", 'type' => 'like'),
        array('name' => "statistical_job_title", 'type' => 'value'),
        array('name' => "formal_job_title", 'type' => 'value'),
        array('name' => "extension", 'type' => 'like'),
        array('name' => "fax", 'type' => 'like'),
        array('name' => "email", 'type' => 'like'),
        array('name' => "post_no", 'type' => 'like'),
        array('name' => "qualification", 'type' => 'value'),
        array('name' => "applicant_qualification", 'type' => 'value'),
        array('name' => "detail_no", 'type' => 'value'),
        array('name' => "group_name", 'type' => 'like'),
        array('name' => "discipline", 'type' => 'like'),
        array('name' => "branch", 'type' => 'like'),
        array('name' => "detail", 'type' => 'like'),
        array('name' => "comments", 'type' => 'value'),
        array('name' => "transfer_date", 'type' => 'value'),
        array('name' => "erad_change_date", 'type' => 'value'),
        array('name' => "moving_history", 'type' => 'like'),
        array('name' => "old_job_title", 'type' => 'value'),
        array('name' => "changes", 'type' => 'value'),
        array('name' => "remarks", 'type' => 'like'),
        /* 院コード/系コード/コースコード追加 2016/03/14 Start */
        array('name' => "institute_code", 'type' => 'like'),
        array('name' => "school_code", 'type' => 'like'),
        array('name' => "course_code", 'type' => 'like'),
        /* 院コード/系コード/コースコード追加 2016/03/14 End */
    );
    /**
     * 日付形式のカラム
     *
     * @var date_columns
     */
    var $date_columns = array(
        'transfer_date',
        'erad_change_date',
    );

    /**
     * 主キーを切り替える
     *
     * @return None
     */
    function switchPrimaryKey()
    {
        $this->primaryKey = "researcher_no";
    }

    /**
     * 研究者情報を更新する
     *
     * @param object $model     モデル本体
     * @param string $modelname モデルの名前
     * @param array  $key_array 置き換えするキー(任意)
     *
     * @return oject
     */
    function updateResearcherInfo(&$model, $modelname, $key_array = null)
    {
        // 対象とするカラム
        App::import('Model', $modelname);
        $obj = new $modelname();
        $update_column_array = $obj->researcher_update_column;

        $researcher_no = @$model[$modelname][$update_column_array["researcher_no"]];
        if (empty($researcher_no)) {
            return false;
        }
        $this->switchPrimaryKey();
        $rec = $this->read(null, $researcher_no);
        if (!$rec) {
            return false;
        }

        foreach ($update_column_array as $key => $value) {
            if (array_key_exists($value, $model[$modelname])) {
                $model[$modelname][$value] = $rec["Researcher"][$key];
            }
        }

        return true;
    }

    /**
     * テーブルをクリアする
     *
     * @return None
     */
    function clearTable() {
        $this->query("TRUNCATE TABLE ". $this->useTable);
    }

    /**
     * 一時テーブルからデータを移す
     *
     * @return None
     */
    function copyFromTmpTable() {
        $this->clearTable();
        $this->query("INSERT INTO researchers select * from tmp_researchers");
    }


	/**
	 * アップロードファイルの旧形式ヘッダーを作成する
	 *
	 * @return array ヘッダー項目の配列
	 */
	function getOldFileHeader()
	{
		// header
		$row = array();
		for ($i = 0; $i < count($this->old_file_columns); $i++) {
			if ($this->old_file_columns[$i] == "id") {
				$row[] = $this->old_file_columns[$i];
			} else {
				$is_replace = false;

				// カラム名に別名があったらそちらに変更する
				foreach ($this->output_column_label_alias as $k => $v) {
					if ($k == $this->old_file_columns[$i]) {
						$row[] = $v;
						$is_replace = true;
						//break;
					}
				}
				if(!$is_replace) {
					$row[] = __(Inflector::humanize($this->old_file_columns[$i]), true);
				}
			}
		}
		return $row;
	}

	/**
	 * Excelファイルでアップロードされた旧形式のデータレコードを新形式のデータに変換する
	 *
	 * @return array ヘッダー項目の配列
	 */
	function changeNewFormat($old_recode)
	{
		$new_recode = array();
		$add_new_recode = array_diff($this->file_columns, $this->old_file_columns);
		$del_new_recode = array_diff($this->old_file_columns, $this->file_columns);

		foreach ($old_recode as $old_pos => $recode_data) {
			while(array_key_exists(count($new_recode), $add_new_recode)) {
				$new_recode[] = '';
			}
			if (!isset($del_new_recode[$old_pos])) {
				$new_recode[] = $recode_data;
			}
		}

		return $new_recode;
	}
}

?>
