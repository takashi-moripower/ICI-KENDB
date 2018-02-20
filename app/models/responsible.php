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
 * Responsible
 *
 * 担当テーブル
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class Responsible extends AppModel
{

    var $name = 'Responsible';
    var $useTable = 'responsibles';
    var $displayField = 'id';
    var $download_file_prefix = "responsible";
    var $actsAs = array();
    var $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'researcher_id' => array(
            'custom' => array(
                'rule' => '/^[a-zA-Z0-9 \-_]*$/',
                'message' => '半角英数記号を入力してください',
                'allowEmpty' => false,
            ),
        ),
        'personal_no' => array(
            'alphanumeric' => array(
                'rule' => array('alphaNumeric'),
                'allowEmpty' => false,
            ),
        ),
        'organization' => array(
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'allowEmpty' => false,
            ),
        ),
        'responsible_code' => array(
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'allowEmpty' => false,
            ),
            'between' => array(
                'rule' => array('between', 0, 255),
            ),
        ),
        // 'institute_code' => array(
        //     'alphanumeric' => array(
        //         'rule' => array('alphanumeric'),
        //         'allowEmpty' => false,
        //     ),
        //     'between' => array(
        //         'rule' => array('between', 0, 255),
        //     ),
        // ),
        // 'school_code' => array(
        //     'alphanumeric' => array(
        //         'rule' => array('alphanumeric'),
        //         'allowEmpty' => false,
        //     ),
        //     'between' => array(
        //         'rule' => array('between', 0, 255),
        //     ),
        // ),
        // 'course_code' => array(
        //     'alphanumeric' => array(
        //         'rule' => array('alphanumeric'),
        //         'allowEmpty' => false,
        //     ),
        //     'between' => array(
        //         'rule' => array('between', 0, 255),
        //     ),
        // ),
    );
    /**
     * CSVヘッダーのカラム名(日本語変換前)
     * @var array
     */
    var $file_columns = array(
        "personal_no",
        "organization",
        "responsible_code",
        "institute_code",
        "school_code",
        "course_code",
    );
	/**
	 * 出力時の文字列置き換え(Excel,CSVダウンロードとか)
	 *
	 * @var array
	 */
	var $output_column_label_alias = array(
		'personal_no' => '職員番号',
		'organization' => '所属',
		'responsible_code' => '主副コード',
        'institute_code' => '学院名等',
        'school_code' => '系名等',
        'course_code' => 'コース名等',
	);

	public $belongsTo = array(
		'Researcher' => array(
			'className' => 'Researcher',
			'foreignKey' => 'researcher_id'
		)
	);

    /**
     * 担当テーブル情報を更新する
     *
     * @param object $model     モデル本体
     * @param string $modelname モデルの名前
     * @param array  $key_array 置き換えするキー(任意)
     *
     * @return oject
     */
    function updateResponsibleInfo(&$model, $modelname, $key_array = null)
    {
        return true;
    }

    /**
     * テーブルをクリアする
     *
     * @return None
     */
    function clearTable() {
    }

    /**
     * 一時テーブルからデータを移す
     *
     * @return None
     */
    function copyFromTmpTable() {
    }

    public function beforeSave() {
    	App::import('Model', 'Researcher');
    	$Researcher = new Researcher();
    	$rec = $Researcher->findByPersonalNo(sprintf('%08d', $this->data[$this->alias]['personal_no']));
    	if (!empty($rec)) {
    		$this->data[$this->alias]['researcher_id'] = $rec['Researcher']['id'];
    	} else {
    		$this->data[$this->alias]['researcher_id'] = null;
    	}
    	return true;
    }

}

?>
