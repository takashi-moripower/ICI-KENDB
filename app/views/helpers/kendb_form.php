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
 * KendbFormHelper
 *
 * 研究力DB用のフォームヘルパー
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class KendbFormHelper extends FormHelper
{

    /**
     * 入力支援機能付きの入力フォームを作成する
     *
     * @param string $fieldName フィールド名
     * @param mixed  $options   オプション
     *
     * @return None
     */
    function input($fieldName, $options = array())
    {
        $modelKey = $this->model();
        $model_obj = $this->_introspectModel($modelKey);
        $rules = isset($model_obj->validate[$fieldName]) ? $model_obj->validate[$fieldName] : NULL;
        $input_first_rule = "";
        if (is_array($rules)) {
            foreach ($rules as $key => $rule) {
                if (array_key_exists("rule", $rule)) {
                    $input_first_rule = $key;
                    break;
                }
            }
            $message = $model_obj->getShortInputMessage($input_first_rule);
            if ($message) {
                $merge_options = array(
                    'title' => $message,
                );
                $options = array_merge($options, $merge_options);
                $op = isset($options['class']) ? $options['class'] : "";
                $options['class'] = $op . " help";
            }
        }
        return parent::input($fieldName, $options);
    }

    /**
     * 年度用プルダウンを自動生成する
     *
     * @param string $fieldName フィールド名
     * @param mixed  $options   オプション
     *
     * @return None
     */
    function nendoPullDown($fieldName, $options = array())
    {
        $start = 2004;
        $end = date('Y') + 1;
        $years = array();
        $years[''] = '';
        for ($i = $end; $i >= $start; $i--) {
            $years[$i] = $i . "/" . $this->convertJapaneseYear($i);
        }
        $op = array('type' => 'select', 'options' => $years);
        $options = array_merge($options, $op);
        return parent::input($fieldName, $options);
    }

    /**
     * 西暦を和暦に変換する
     * 
     * @param int $year 西暦
     *
     * @return string 和暦
     */
    function convertJapaneseYear($year) {
        if ($year >= 1989) {
            return "H" . ($year - 1988);
        } elseif ($year >= 1926) {
            return "S" . ($year - 1925);
        } else {
            return "";
        }
    }

    /**
     * 和暦用年度用プルダウンを自動生成する
     *
     * @param string $fieldName フィールド名
     * @param mixed  $options   オプション
     *
     * @return None
     */
    function warekiPullDown($fieldName, $options = array())
    {
        $start = 1;
        $end = date('Y') + 10 - 1988;
        $years = array();
        $years[''] = '';
        for ($i = $end; $i >= $start; $i--) {
            $years[$i] = $i;
        }
        $op = array('type' => 'select', 'options' => $years);
        $options = array_merge($options, $op);
        return parent::input($fieldName, $options);
    }


    /**
     * 年度用プルダウンを自動生成する
     *
     * @param string $fieldName フィールド名
     * @param mixed  $options   オプション
     *
     * @return None
     */
    function nendoPullDownWide($fieldName, $options = array())
    {
        $start = date('Y') - 20;
        $end = date('Y') + 10;
        $years = array();
        $years[''] = '';
        for ($i = $end; $i >= $start; $i--) {
            $years[$i] = $i . "/" . $this->convertJapaneseYear($i);
        }
        $op = array('type' => 'select', 'options' => $years);
        $options = array_merge($options, $op);
        return parent::input($fieldName, $options);
    }

    /**
     * フォームを生成する際にデフォルトでオプションをつける
     * 
     * @param string $model   モデル名
     * @param array  $options オプション配列
     *
     * @return None
     */
    function create($model = null, $options = array())
    {
        if(is_array($options)) {
            $a = true;
            foreach ($options as $k => $v) {
                if($k === "novalidate" && $v === "novalidate") {
                    $a = false;
                }
            }
            if($a) {
                $options["novalidate"] = "novalidate";
            }
        } else {
            $options = array("novalidate" => "novalidate");
        }
        return parent::create($model, $options);
    }


}

?>
