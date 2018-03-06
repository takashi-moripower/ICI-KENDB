<?php

/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   None
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link	  none
 */

/**
 * AppModel
 *
 * 共通基底モデルクラス
 *
 * @category  None
 * @package   None
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
class AppModel extends Model {

    var $file_columns = array();
    var $date_columns = array();
    var $download_file_prefix = "";
    var $numeric_search_field = array();

    /**
     * 検索フィルター利用時の検索条件(like検索か、equal検索か等)
     *
     * @var filterArgs
     */
    var $filterArgs = array();

    /**
     * Concatenate a field name with each validation error message in replaceValidationErrorMessagesI18n().
     * Field name is set with gettext __()
     *   true: Concatenate
     *   false: not Concatenate
     *
     * @var boolean
     * @access protected
     */
    var $_withFieldName = false;

    /**
     * Error messages
     *
     * @var array
     * @access protected
     */
    var $_error_messages = array();

    /**
     * 教員情報を一括更新する際の対象カラム(デフォルト値)
     */
    var $researcher_update_column = array(
        'researcher_no' => 'researcher_no',
        'researcher_name' => 'researcher_name',
        'cooperate_no' => 'cooperate_no',
        'department' => 'department',
        'job_title' => 'job_title',
        // 'major_name' => 'major_name',
        'extension' => 'extension',
        'fax' => 'fax',
        'email' => 'email',
        'post_no' => 'post_no',
    );

    /**
     * 簡単検索の際の対象フィールド
     * @var array
     */
    var $easy_search_field = array();

    /**
     * Excel出力やラベル出力で特定名称に置き換えを行うデータと値
     *
     * @var array
     */
    var $output_column_label_alias = array(
    );

    /**
     * 数値型で、通貨ではない項目の一覧
     *
     * @var array
     */
    var $numeric_non_currency_field = array();

    const VALIDATION_PERSONAL_NO = [
        'empty' => [
            'rule' => 'notEmpty',
            'message' => '値を入力してください'
        ],
        'alphaNumeric' => [
            'rule' => 'alphaNumeric',
            'message' => '英数字以外が含まれています'
        ],
        'length' => [
            'rule' => ['equallength', 8],
            'message' => '8文字で入力してください'
        ]
    ];

    /**
     * コンストラクタ
     *
     * @param boolean $id	id
     * @param string  $table 対象テーブル
     * @param string  $ds	対象データソース
     */
    function __construct($id = false, $table = null, $ds = null) {
        if (get_class($this) == "AppModel") {
            $this->useTable = false;
        }
        parent::__construct($id, $table, $ds);
    }

    /**
     * Define default validation error messages
     * $default_error_messages can include gettext __() value.
     *
     * @return array
     * @access protected
     */
    function _getDefaultErrorMessagesI18n() {
        //Write Default Error Message
        $default_error_messages = array(
            'notempty' => __('This field can not leave empty.', true),
            'require' => __('This field can not leave empty.', true),
            'email' => __('Invalid Email address.', true),
            'alphanumeric' => __('Please input numerical and alphabetical characters.', true),
            'between' => __('Between %2$d and %3$d characters.', true),
            'numeric' => __('Please input numerical characters.', true),
            'isUnique' => __('This value is not a unique.', true),
            'boolean' => __('This field can set boolean value.', true),
            'alphaNumericHyphen' => __('Please input numerical and alphabetical characters and hyphen.', true),
            'numericHyphen' => __('Please input numerical characters and hyphen.', true),
            'equalLength' => __('Please input %2$d characters.', true),
            'nendoRange' => __('Please input proper year.', true),
            'date' => __('Please input date.', true),
            'warekiRange' => __('Please input proper japanese year.', true),
            'userNameRule' => __('Please input numerical and alphabetical characters and hyphen, underscore, dot.', true),
            'passwordRule' => __('Please input proper password', true),
        );

        return $default_error_messages;
    }

    /**
     * 短い入力説明文を返す
     *
     * @param string $key バリデーションのルール名
     *
     * @return string メッセージ
     */
    function getShortInputMessage($key) {
        $message = array(
            'notempty' => __('Not empty', true),
            'require' => __('Required', true),
            'email' => __('Email', true),
            'alphanumeric' => __('Numerical and alphabetical', true),
            'between' => __('Between %2$d and %3$d', true),
            'numeric' => __('Numerical characters.', true),
            'isUnique' => __('Unique', true),
            'boolean' => __('Boolean', true),
            'alphaNumericHyphen' => __('Numerical and alphabetical and hyphen', true),
            'numericHyphen' => __('Numerical and hyphen', true),
            'equalLength' => __('%1$d characters', true),
            'nendoRange' => __('Year', true),
            'warekiRange' => __('Japanese Year', true),
            'date' => __('YYYY-MM-DD', true),
            'userNameRule' => __('Numerical and alphabetical characters and hyphen, underscore, dot.', true),
            'passwordRule' => __('Password Character', true),
        );
        $str = isset($message[$key]) ? $message[$key] : "";
        return $str;
    }

    /**
     * 複数フィールドでユニークかどうか検証する
     *
     * @param array $data   検証データ
     * @param array $fields 対象フィールドの配列
     *
     * @return boolean
     */
    function isUniqueWith($data, $fields) {
        if (!is_array($fields))
            $fields = array($fields);
        $fields = Set::merge($data, $fields);
        return $this->isUnique($fields, false);
    }

    /**
     * Set validation error messages.
     *
     * To change default validation error messages,
     *  set $add_error_message in each model.
     *
     * @param array   $add_error_message 追加するエラーメッセージ
     * @param boolean $all_change_flag   メッセージを置換するかどうか
     * 	true: change all default validation error messages
     * 	false: merge $add_error_message with default validation error messages
     *
     * @return None
     *
     * @access public
     */
    function setErrorMessageI18n($add_error_message = null, $all_change_flag = false) {


        $default_error_messages = $this->_getDefaultErrorMessagesI18n();

        if (!empty($add_error_message) && is_array($add_error_message)) {
            if ($all_change_flag) {
                $default_error_messages = $add_error_message;
            } else {
                $default_error_messages = array_merge($default_error_messages, $add_error_message);
            }
            $this->_error_messages = $default_error_messages;
        } elseif (empty($this->_error_messages)) {
            $this->_error_messages = $default_error_messages;
        }
    }

    /**
     * get validation error messages
     *
     * @return array
     * @access protected
     */
    function _getErrorMessageI18n() {
        return $this->_error_messages;
    }

    /**
     * Replace validation error messages for i18n
     *
     * @return None
     * @access public
     */
    function replaceValidationErrorMessagesI18n() {
        $this->setErrorMessageI18n();

        foreach ($this->validate as $fieldname => $ruleSet) {
            foreach ($ruleSet as $rule => $rule_info) {

                $rule_option = array();
                if (!empty($this->validate[$fieldname][$rule]['rule'])) {
                    $rule_option = $this->validate[$fieldname][$rule]['rule'];
                }

                $error_message_list = $this->_getErrorMessageI18n();
                $error_message = ( array_key_exists($rule, $error_message_list) ? $error_message_list[$rule] : null );

                if (!empty($error_message)) {
                    $this->validate[$fieldname][$rule]['message'] = vsprintf($error_message, $rule_option);
                } elseif (!empty($this->validate[$fieldname][$rule]['message'])) {
                    $this->validate[$fieldname][$rule]['message'] = __($this->validate[$fieldname][$rule]['message'], true);
                }


                if ($this->_withFieldName && !empty($this->validate[$fieldname][$rule]['message'])) {
                    $this->validate[$fieldname][$rule]['message'] = __($fieldname, true) . ' : ' . $this->validate[$fieldname][$rule]['message'];
                }
            }
        }
    }

    /**
     * 検証処理の直前処理
     *
     * @return boolean True
     */
    function beforeValidate() {
        $this->replaceValidationErrorMessagesI18n();

        // Excel参照のエラーチェック
        foreach ($this->data as $k1 => $val1) {
            foreach ($this->data[$k1] as $k2 => $val2) {
                $val = $this->data[$k1][$k2];
                if (!empty($val) && !is_array($val)) {
                    if ($val == "#REF!") {
                        $this->invalidate($k2, "Excelの式が解決できません");
                    } else if (substr($val, 0, 1) == "=") {
                        $this->invalidate($k2, "値の先頭文字に=は利用できません");
                    }
                }
            }
        }
        return true;
    }

    /**
     * Transaction Support for multi RDBMS
     *
     * @return None
     *
     * @access public
     */
    function begin() {
        $db = & ConnectionManager::getDataSource($this->useDbConfig);
        $db->begin($this);
    }

    /**
     * Transaction Support for multi RDBMS
     *
     * @return None
     *
     * @access public
     */
    function commit() {
        $db = & ConnectionManager::getDataSource($this->useDbConfig);
        $db->commit($this);
    }

    /**
     * Transaction Support for multi RDBMS
     *
     * @return None
     *
     * @access public
     */
    function rollback() {
        $db = & ConnectionManager::getDataSource($this->useDbConfig);
        $db->rollback($this);
    }

    /**
     * Release bind rules
     *
     * @return None
     *
     * @access public
     */
    function unbindFully() {
        $unbind = array();
        foreach ($this->belongsTo as $model => $info) {
            $unbind['belongsTo'][] = $model;
        }
        foreach ($this->hasOne as $model => $info) {
            $unbind['hasOne'][] = $model;
        }
        foreach ($this->hasMany as $model => $info) {
            $unbind['hasMany'][] = $model;
        }
        foreach ($this->hasAndBelongsToMany as $model => $info) {
            $unbind['hasAndBelongsToMany'][] = $model;
        }
        $this->unbindModel($unbind, false);
    }

    /**
     * convert string to sjis
     *
     * @param string $str 変換前文字列
     *
     * @return string 変換後文字列
     *
     * @access public
     */
    function sjis($str) {
        if (function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($str, "SJIS", "UTF-8");
        } else {
            return $str;
        }
    }

    /**
     * output csv
     *
     * @param string $filename 出力するファイル名
     * @param array  $list	 出力するリスト
     *
     * @return None
     *
     * @access public
     */
    function makeCSV($filename, $list) {
        $out = '';
        if (!empty($list)) {
            $fp = fopen("php://memory", 'r+');
            foreach ($list as $row) {
                fputcsv($fp, $row);
            }
            rewind($fp);
            $out = mb_convert_encoding(stream_get_contents($fp), 'SJIS', mb_internal_encoding());
            $out = stream_get_contents($fp);
        }
        header("Cache-Control:");
        header("Pragma:");
        header('Content-Type: application/octet-stream; charset=sjis');
        header('Content-Disposition: attachment; filename=' . $filename);
        echo $out;
        exit;
    }

    /**
     * アップロードファイルのヘッダーを作成する
     *
     * @return array ヘッダー項目の配列
     */
    function getFileHeader() {
        // header
        $row = array();
        for ($i = 0; $i < count($this->file_columns); $i++) {
            if ($this->file_columns[$i] == "id") {
                $row[] = $this->file_columns[$i];
            } else {
                $is_replace = false;

                // カラム名に別名があったらそちらに変更する
                foreach ($this->output_column_label_alias as $k => $v) {
                    if ($k == $this->file_columns[$i]) {
                        $row[] = $v;
                        $is_replace = true;
                        //break;
                    }
                }
                if (!$is_replace) {
                    $row[] = __(Inflector::humanize($this->file_columns[$i]), true);
                }
            }
        }
        return $row;
    }

    /**
     * CSVデータのカラムをモデルにまとめてセットする
     *
     * @param array  $cols	  CSVのカラム内容
     * @param string $modelname モデル名
     *
     * @return array データ
     */
    function columns2data($cols, $modelname) {
        App::import('vendor', 'phpexcel/phpexel');

        $val = array();
        for ($i = 0; $i < count($this->file_columns); $i++) {
            $str = trim($cols[$i]);
            if (in_array($this->file_columns[$i], $this->date_columns)) {
                $str = $this->convertDateNull($str);
                // Excelの日付値を読める形式に変換する
                // もし数字以外の文字だけで構成されていたら変換しない
                if (!is_null($str) && !preg_match("/[0-9]/", $str)) {
                    // 変換しない(モデルのバリデーションでエラー)
                } elseif (preg_match("/(\d{4})年(\d{1,2})月(\d{1,2})日/", $str, $matches)) {
                    $str = $matches[1] . "-" . $matches[2] . "-" . $matches[3];
                } elseif (preg_match("/平成(\d{4})年(\d{1,2})月(\d{1,2})日/", $str, $matches)) {
                    $str = ($matches[1] + 1988) . "-" . $matches[2] . "-" . $matches[3];
                } elseif (preg_match("/(\d{4})-(\d{1,2})-(\d{1,2})/", $str, $matches)) {
                    $str = $matches[1] . "-" . sprintf("%02d", $matches[2]) . "-" . sprintf("%02d", $matches[3]);
                } elseif (!is_null($str) && !preg_match("|^\d{4}\/\d{1,2}\/\d{1,2}$|", $str)) {
                    $str = strftime("%Y-%m-%d", PHPExcel_Shared_Date::ExcelToPHP($str));
                }
            }
            $val[$modelname][$this->file_columns[$i]] = $str;
        }
        if (!array_key_exists("disabled", $val[$modelname])) {
            $val[$modelname]["disabled"] = 0;
        }
        return $val;
    }

    /**
     * 日付の空白文字を統一する
     *
     * @param string $str 変換前文字列
     *
     * @return string
     */
    function convertDateNull($str) {
        $str = trim($str);
        if ($str == "0000-00-00" || $str == "" || $str == "0") {
            return null;
        } else {
            return $str;
        }
    }

    /**
     * 数値、アルファベット、ハイフンから構成されていることを検証する
     *
     * @param mixed $data 検証対象のデータ
     *
     * @return boolean 検証結果
     */
    function alphaNumericHyphen($data) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $v = preg_match("/[^A-z0-9\-]+/", $value) == 0;
                if (!$v) {
                    return false;
                }
            }
        } else {
            return preg_match("/[^A-z0-9\-]+/", $data) == 0;
        }
        return true;
    }

    /**
     * 数値、アルファベットから構成されていることを検証する
     *
     * @param mixed $data 検証対象のデータ
     *
     * @return boolean 検証結果
     */
    public function alphaNumeric($check) {
        $value = array_values($check);
        $value = $value[0];
        return preg_match('/^[a-zA-Z0-9]+$/', $value);
    }

    /**
     * 数値、アルファベット、ハイフン、アンスコ、ドットから構成されていることを検証する
     *
     * @param mixed $data 検証対象のデータ
     *
     * @return boolean 検証結果
     */
    function userNameRule($data) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $v = preg_match("/[^A-z0-9\-_\.]+/", $value) == 0;
                if (!$v) {
                    return false;
                }
            }
        } else {
            return preg_match("/[^A-z0-9\-_\.]+/", $data) == 0;
        }
        return true;
    }

    /**
     * パスワードが全角文字以外で構成されていることを検証する
     *
     * @param mixed $data 検証対象のデータ
     *
     * @return boolean 検証結果
     */
    function passwordRule($data) {
        $pattern = "/^[0-9A-z_\-!\"#\$\%&\'\(\)\=\~\^\\\@\`\[\{\}\]\:\*\;\+\<\>\/\?\.\,]+$/";
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $v = preg_match($pattern, $value);
                if (!$v) {
                    return false;
                }
            }
        } else {
            return preg_match($pattern, $data);
        }
        return true;
    }

    /**
     * 数値とハイフンから構成されていることを検証する
     *
     * @param mixed $data 検証対象のデータ
     *
     * @return boolean 検証結果
     */
    function numericHyphen($data) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $v = preg_match("/[^0-9\-]+/", $value) == 0;
                if (!$v) {
                    return false;
                }
            }
        } else {
            return preg_match("/[^0-9\-]+/", $data) == 0;
        }
        return true;
    }

    /**
     * 文字列の長さが同じかどうかを検証する
     *
     * @param mixed $data 検査対象データ
     * @param int   $len  期待する文字列長
     *
     * @return boolean
     */
    function equalLength($data, $len) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $v = strlen($value) == $len;
                if (!$v) {
                    return false;
                }
            }
        } else {
            return strlen($data) == $len;
        }
        return true;
    }

    /**
     * 西暦が指定した範囲内にあるか検証する
     *
     * @param mixed $data  検査対象データ
     * @param int   $start 開始年
     * @param int   $end   終了年
     *
     * @return boolean
     */
    function nendoRange($data, $start = null, $end = null) {
        if ($start == null || is_array($start)) {
            $start = 2004;
        }
        if ($end == null || is_array($end)) {
            $end = date('Y') + 1;
        }
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $v = ($value >= $start && $value <= $end);
                if (!$v) {
                    return false;
                }
            }
        } else {
            return ($data >= $start && $data <= $end);
        }
        return true;
    }

    /**
     * 和暦が指定した範囲内にあるか検証する
     *
     * @param mixed $data  検査対象データ
     * @param int   $start 開始年
     * @param int   $end   終了年
     *
     * @return boolean
     */
    function warekiRange($data, $start = null, $end = null) {
        if ($start == null || is_array($start)) {
            $start = 1;
        }
        if ($end == null || is_array($end)) {
            $end = date('Y') + 1 - 1988 + 10;
        }
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $v = ($value >= $start && $value <= $end);
                if (!$v) {
                    return false;
                }
            }
        } else {
            return ($data >= $start && $data <= $end);
        }
        return true;
    }

    /**
     * 文字列のプルダウン生成用のリストを作成する
     *
     * @return array
     */
    function makeRealValueList() {
        $rec = $this->find('all', array('fields' => $this->displayField));
        $result = array();
        $result[''] = '';
        foreach ($rec as $item) {
            $val = $item[$this->name][$this->displayField];
            $result[$val] = $val;
        }
        return $result;
    }

    /**
     * 現在の年度を取得する
     *
     * @param string $strdate 文字列での日付
     *
     * @return int
     */
    function getCurrentNendo($strdate = null) {
        if ($strdate == null) {
            $year = intval(date('Y'));
            $month = intval(date('m'));
        } else {
            $year = intval(date('Y', strtotime($strdate)));
            $month = intval(date('m', strtotime($strdate)));
        }
        if ($month <= 3) {
            $year -= 1;
        }
        return $year;
    }

    /**
     * 主キーを切り替える
     *
     * @return None
     */
    function switchPrimaryKey() {
        $this->primaryKey = "id";
    }

    /**
     * DBに登録するデータにユーザー情報をセットする
     *
     * @param string $modelname モデル名
     *
     * @return boolean
     */
    function setUserInfo($modelname) {
        App::import("Model", "User");
        if (!isset($this->data[$modelname]["id"])) {
            $this->data[$modelname]["created_by"] = User::get('displayname');
        }
        $this->data[$modelname]["updated_by"] = User::get('displayname');
        return true;
    }

    /**
     * ノードを再計算する（継承元）
     *
     * @param integer $parent_id 親データID
     *
     * @return boolean
     */
    function recalcNode($parent_id) {
        return true;
    }

    /**
     * 数値フィールド(From-To)用の検証ルールをマージする
     *
     * @return None
     */
    function mergeValidateRules() {
        $additional_validate = array();
        foreach ($this->numeric_search_field as $value) {
            $additional_validate[$value . "_f"]["numeric"]["rule"] = array("numeric");
            $additional_validate[$value . "_t"]["numeric"]["rule"] = array("numeric");
        }
        foreach ($this->date_columns as $value) {
            $additional_validate[$value . "_f"]["date"]["rule"] = array("date");
            $additional_validate[$value . "_t"]["date"]["rule"] = array("date");
        }

        $this->validate = array_merge($this->validate, $additional_validate);
    }

    /**
     * モデル名をモデルマスターIDに変換する
     *
     * @param string $modelname モデル名
     *
     * @return int
     */
    function modelName2ModelNameId($modelname) {
        $available_model = array(
            'Adoption' => 1,
            'OtherResearchGrant' => 2,
            'MhlwResearchGrant' => 3,
            'Encourage' => 4,
            'AssessedContribution' => 5,
            'Entrust' => 6,
            'Donation' => 7,
            'NedoJstOther' => 8,
            'Contract' => 9,
            'Grant' => 10,
        );

        foreach ($available_model as $k => $v) {
            if ($k === $modelname) {
                return $v;
            }
        }
        return false;
    }

    /**
     * サマリーテーブルにデータを保存する
     *
     * @param object  $model   モデルのインスタンス
     * @param boolean $created 新規作成フラグ
     */
    function saveToSummary($model, $created, $force_model_id = NULL) {
        $this->log("サマリーテーブルにデータを保存します", LOG_DEBUG);
        App::import("Model", "Summary");

        // モデル名
        $modelname = $this->name;
        // - テストの際のモデル名を置き換え
        $modelname = str_replace("Test", "", $modelname);
        $modelname = str_replace("Node", "", $modelname);

        $model_key = get_class($model);

        // 更新用データ作成
        $summary_data = array();
        $summary_data["Summary"]["model_name"] = $modelname;
        $summary_data["Summary"]["model_name_id"] = $this->modelName2ModelNameId($modelname);

        foreach ($model->summarize_field as $k => $v) {
            if (array_key_exists($v, $model->data[$model_key])) {
                $summary_data["Summary"][$k] = $model->data[$model_key][$v];
            }
        }

        // 合算対応
        if ($model_key === "AssessedContribution") {
            $summary_data["Summary"]["amount"] = @$summary_data["Summary"]["direct_cost"] +
                    @$summary_data["Summary"]["indirect_cost"];
        }

        // model_id
        if (!isset($force_model_id)) {
            if ($created) {
                $summary_data["Summary"]["model_id"] = $model->getLastInsertID();
            } else {
                $summary_data["Summary"]["model_id"] = $model->id;
            }
        } else {
            $summary_data["Summary"]["model_id"] = $force_model_id;
        }
        $this->log("サマリーテーブル用モデルデータのIDは" . $summary_data["Summary"]["model_id"], LOG_DEBUG);

        $this->log("サマリーテーブルのモデルキーは" . $model_key, LOG_DEBUG);
        $this->log("サマリーテーブルのデータは" . print_r($summary_data, true), LOG_DEBUG);
        // 親データのIDの割り当て
        if ($created) {
            $parent_id = NULL;
            if ($model_key === "EntrustNode" || $model_key === "Entrust") {
                $parent_id = isset($model->data[$model_key]["entrust_id"]) ?
                        $model->data[$model_key]["entrust_id"] : null;
            }
            if ($model_key === "NedoJstOtherNode" || $model_key === "NedoJstOther") {
                $parent_id = isset($model->data[$model_key]["nedo_jst_other_id"]) ?
                        $model->data[$model_key]["nedo_jst_other_id"] : null;
            }
            if ($model_key === "ContractNode" || $model_key === "Contract") {
                $parent_id = isset($model->data[$model_key]["contract_id"]) ?
                        $model->data[$model_key]["contract_id"] : null;
            }
            if ($model_key === "GrantNode" || $model_key === "Grant") {
                $parent_id = isset($model->data[$model_key]["grant_id"]) ?
                        $model->data[$model_key]["grant_id"] : null;
            }
            $summary_data["Summary"]["model_parent_id"] = $parent_id;

            // 親IDが設定されていたらプロジェクトレコードフラグをオフにする
            if (isset($parent_id)) {
                $summary_data["Summary"]["is_project_record"] = 0;
            } else {
                $summary_data["Summary"]["is_project_record"] = 1;
            }
        }
        // 更新対象のフィールド
        $fieldList = array();
        foreach ($summary_data["Summary"] as $k => $v) {
            $fieldList[] = $k;
        }

        // サマリーテーブルへのデータ更新
        $this->Summary = & ClassRegistry::init('Summary');
        if ($created) {
            $this->log("サマリーデータを新規作成します", LOG_DEBUG);
            $this->Summary->create();
            $this->Summary->save($summary_data);
        } else {
            $condition = array(
                "model_name" => $modelname,
                "model_id" => $summary_data["Summary"]["model_id"],
            );
            $rec = $this->Summary->find($condition);
            $rec = $this->Summary->read(null, $rec["Summary"]["id"]);
            $this->log("すでにデータが存在するので上書きします。IDは" . $rec["Summary"]["id"], LOG_DEBUG);
            $this->log("保存フィールドは" . print_r($fieldList, true), LOG_DEBUG);
            $this->Summary->save($summary_data, array('fieldList' => $fieldList));
        }
    }

    /**
     * 同じプロジェクトレコードを持つ他の明細レコードがいるかどうか
     *
     * @param int $id
     *
     * @return boolean
     */
    function hasSameParentNode($id = null) {
        if (!$id)
            return false;

        $this->recursive = -1;
        $rec = $this->read(null, $id);
        if (!$rec)
            return false;

        $parent_id_column = Inflector::underscore($this->name) . "_id";
        $parent_id = $rec[$this->name][$parent_id_column];
        if (!$parent_id)
            return false;

        $this->recursive = 1;
        $rec = $this->findById($parent_id);
        if (!$rec)
            return false;

        $node_count = count($rec[$this->name . "Node"]);
        return $node_count >= 2;
    }

    /**
     * 明細データを１つしか持っていないかどうかを確認する
     *
     * @param int $id 調査対象のデータのID
     *
     * @return boolean
     */
    function isSingleChild($id = null) {
        if (!$id)
            return false;

        $this->recursive = 1;
        $rec = $this->findById($id);
        if (!$rec)
            return false;

        if (array_key_exists($this->name . 'Node', $rec) &&
                1 == count($rec[$this->name . "Node"])) {
            return true;
        }
        return false;
    }

    /**
     * 利用可能なIDの最小値を返す
     *
     * @return int
     */
    function getAvailableMinimumId() {
        $result = $this->find('first', array("fields" => "MAX(id) + 1 as next_id"));
        $next_id = @$result[0]["next_id"];
        $next_id = isset($next_id) ? $next_id : 1;
        return $next_id;
    }

    /**
     * 末尾の全角スペースを削除する
     *
     * @param string $value 処理対象の文字列
     *
     * @return string
     */
    function zenTrim($value) {
        return trim(mb_convert_kana($value, "s"));
    }

    /**
     * 指定した年度のデータを全て削除する
     *
     * @param string $year 年度
     *
     * @return boolean
     */
    function deleteByYear($year) {
        // バックアップ実行
        // 削除対象のIDを取得
        $this->recursive = -1;
        $ids = $this->findAllByYear($year, array('fields' => 'id'));
        $id_array = array();
        foreach ($ids as $v) {
            $id_array[] = $v[$this->name]["id"];
        }
        if (empty($id_array)) {
            return true;
        }

        $id_array_str = "(" . implode(",", $id_array) . ")";

        $filename = sprintf('dump_before_delete_%s.gz', date("YmdHis"));
        $this->backup_database($filename);

        $this->begin();
        // 取得したIDに該当する履歴テーブルとサマリーテーブルのデータを削除
        App::import("Model", "History");
        $this->History = & ClassRegistry::init('History');
        if (!$this->History->query("DELETE FROM histories where model_name ='$this->name' and model_id in $id_array_str")) {
            $this->rollback();
            return false;
        }

        App::import("Model", "Summary");
        $this->Summary = & ClassRegistry::init('Summary');
        if (!$this->Summary->query("DELETE FROM summaries where model_name ='$this->name' and model_id in $id_array_str")) {
            $this->rollback();
            return false;
        }

        // データテーブルのデータを削除
        if (!$this->query("DELETE FROM $this->useTable where id in $id_array_str")) {
            $this->rollback();
            return false;
        }
        $this->commit();
        return true;
    }

    /**
     * データベースをバックアップする
     *
     * @param string $filename ファイル名
     *
     */
    function backup_database($filename) {
        $database_config = 'default';

        Configure::write('debug', 0);
        App::import('Core', 'ConnectionManager');
        $db = & ConnectionManager::getDataSource($database_config);
        $path = TMP . "dbbackup/" . $filename;
        $cmd = sprintf("mysqldump -u %s --password='%s' %s --opt | gzip> %s"
                , $db->config['login']
                , $db->config['password']
                , $db->config['database']
                , $path);
        exec($cmd);
    }

    /**
     * DBエラーフック
     */
    function onError($err) {
        $this->log("DB ERROR: error=" . var_export($err), LOG_DEBUG);
    }

    /**
     * 連携IDを更新する
     */
    function setCooperateNo() {
        $res = "researchers";
        $tbl = $this->useTable;

        $update_column_array = $this->researcher_update_column;
        $researcher_no = $update_column_array["researcher_no"]; // テーブルによってはフィールド名が異なる

        $sql = "UPDATE ${tbl} as A INNER JOIN ${res} as R ON(A.${researcher_no} = R.researcher_no COLLATE utf8_general_ci)
SET A.cooperate_no = R.cooperate_no WHERE A.cooperate_no = '' and A.${researcher_no} <> ''; ";
        $this->log($sql, LOG_DEBUG);
        $this->query($sql);

        // 横断検索を更新する
        $sql = "
UPDATE summaries as A INNER JOIN researchers as R ON A.personal_no = R.personal_no 
SET A.cooperate_no = R.cooperate_no
WHERE A.cooperate_no = '' and A.personal_no <> '' and R.cooperate_no <> '' and R.cooperate_no is not null;";
        $this->log($sql, LOG_DEBUG);
        $this->query($sql);
    }

}
