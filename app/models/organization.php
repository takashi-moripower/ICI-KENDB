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
 * Organization
 *
 * 組織テーブル
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class Organization extends AppModel
{

    var $name = 'Organization';
    var $useTable = 'organizations';
    var $displayField = 'id';
    var $download_file_prefix = "organization";
    var $actsAs = array();
    var $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'classifier' => array(
            'custom' => array(
                'rule' => array("inList", array('institute', 'school', 'course', 'responsible', '院', '系', 'コース', '主副') ),
                'message' => '院、系、コース、主副のいずれかで入力をしてください',
                'allowEmpty' => false,
            ),
        ),
        'code' => array(
            'alphanumeric' => array(
                'rule' => array('alphaNumeric'),
                'allowEmpty' => false,
            ),
            'between' => array(
                'rule' => array('between', 0, 255),
            ),
        ),
        'japanese_name' => array(
        	'notempty' => array(
                'rule' => array('notempty'),
        	),
            'between' => array(
                'rule' => array('between', 0, 1024),
            ),
        ),
        'english_name' => array(
            'custom' => array(
                'rule' => '/^[a-zA-Z0-9 -\/:-@\[-\`\{-\~]*$/',
                'message' => '半角英数記号を入力してください',
                'allowEmpty' => true,
            ),
            'between' => array(
                'rule' => array('between', 0, 1024),
            ),
        ),
    );
    /**
     * CSVヘッダーのカラム名(日本語変換前)
     * @var array
     */
    var $file_columns = array(
        "classifier",
        "code",
        "japanese_name",
        "english_name",
    );
	/**
	 * 出力時の文字列置き換え(Excel,CSVダウンロードとか)
	 *
	 * @var array
	 */
	var $output_column_label_alias = array(
		'classifier' => '分類',
		'code' => 'コード',
		'japanese_name' => '名称',
        'english_name' => '英語名称',
	);

	var $classifier_view = array(
		'institute' => '院',
		'school' => '系',
		'course' => 'コース',
		'responsible' => '主副',
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
    function updateOrganizationInfo(&$model, $modelname, $key_array = null)
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
    	if (!$this->classifierExistsCode($this->data[$this->alias]['classifier'])) {
    		$classifier_code = $this->classifierToCode($this->data[$this->alias]['classifier']);
    		if ($classifier_code) {
	    		$this->data[$this->alias]['classifier'] = $classifier_code;
    		}
    	}

    	return true;
    }

	public function classifierToView($classifier) {
		return $this->classifier_view[$classifier];
	}

	public function classifierToCode($view) {
		return array_search($view, $this->classifier_view);
	}

	public function classifierExistsCode($classifier) {
		return array_key_exists($classifier, $this->classifier_view);
	}
}

?>
