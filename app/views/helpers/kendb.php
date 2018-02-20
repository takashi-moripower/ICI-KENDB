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
 * KendbHelper
 *
 * Long description for class (if any)...
 *
 * @category  None
 * @package   None
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
class KendbHelper extends AppHelper {

	/**
	 * 年度を示すURLを作成する
	 *
	 * @param string $strdate
	 *
	 * @return string
	 */
	function nendo($strdate = null) {
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
		return $this->output("/year:" . $year);
	}

	/**
	 * テーブルのセルを描画する
	 *
	 * @param object $model
	 * @param string $model_name
	 * @param string $key
	 * @param object $compare_model
	 * @param string $class
	 * @param string $format
	 * @return string
	 */
	function writeCell($model, $model_name, $key, $compare_model = null, $class = null, $format = null) {

		$value = @$model[$model_name][$key];
		$old_value = "";
		$cellclass = "";
		if ($compare_model && array_key_exists($key, $compare_model[$model_name])) {
			$old_value = $compare_model[$model_name][$key];
			if ($old_value != $value) {
				$cellclass = "valuechanged";
			}
		}
		if ($format == "number") {
			$value = number_format($value);
		} else if ($format == "date") {
			$value = $this->make_date($value);
		}

		if ($cellclass != null || $class != null) {
			$class_value = $cellclass . " " . $class;
			$class_value = trim($class_value);
			if ($format == "number" && $value < 0) {
				$class_value .= " minus";
				$class_value = trim($class_value);
			}
			$cellclass = " class=\"" . $class_value . "\"";
		}
		if ($class == "memo") {
			return $this->output("<td colspan=\"5\"$cellclass>" . nl2br(h($value)) . "</td>\n");
		} else {
			return $this->output("<td$cellclass>" . nl2br(h($value)) . "</td>\n");
		}
	}

	/**
	 * 日付を整形出力する
	 *
	 * @param string $str
	 *
	 * @return string
	 */
	function print_date($str) {
		return $this->output($this->make_date($str));
	}

	/**
	 * 日付をフォーマットする
	 *
	 * @param string $str
	 *
	 * @return string
	 */
	function make_date($str) {
		if (!$str) {
			return "";
		} else {
			App::import("Model", "User");
			$date_type = @User::get("dateformat");
			if ($date_type == "1") {
				// H22.12.01
				$y = date('Y', strtotime($str)) - 1988;
				return "H" . $y . "." . date('m.d', strtotime($str));
			} elseif ($date_type == "2") {
				// 2010-12-01
				return date('Y-m-d', strtotime($str));
			} else {
				// 平成22年12月04日
				$y = date('Y', strtotime($str)) - 1988;
				return "平成" . $y . "年" . date('m月d日', strtotime($str));
			}
		}
	}

	/**
	 * 今日の日付を作成する
	 *
	 * @return string
	 */
	function print_today() {
		$youbi = array('月', '火', '水', '木', '金', '土', '日');
		$y = date('N') - 1;
		$str = date('Y年');
		$str .= sprintf("(平成%d年)", date('Y') - 1988);
		$str .= date('m月d日');
		$str .= "(" . $youbi[$y] . ")";
		return $this->output($str);
	}

	/**
	 * 文字列を短縮する
	 *
	 * @param string $str 対象文字列
	 *
	 * @return string
	 */
	function shorten_string($str)
	{
		if(!defined('SHORTEN_STRING_MAX_LEN')) {
			define('SHORTEN_STRING_MAX_LEN', 30);
		}
		$str = preg_replace("/\r/", "", $str);
		$str = preg_replace("/\n/", " ", $str);
		if (mb_strlen($str) <= SHORTEN_STRING_MAX_LEN) {
			return $str;
		} else {
			return mb_substr($str, 0, SHORTEN_STRING_MAX_LEN) . "...";
		}
	}

	/**
	 * 教員名にSSへのリンクを貼る
	 *
	 * @param string $name 教員名
	 * @param string $researcher_no 研究者番号
	 *
	 * @return string
	 *
	 */
	function makeResearcherLink($name, $researcher_no = null)
	{
		$name = htmlspecialchars(trim(str_replace('　', ' ', $name)));

		if ($researcher_no  == null || trim($researcher_no) == "") {
			return $name;
		} else {
			$url = 'http://search.star.titech.ac.jp/titech-ss/resolver.act?target=STARSearch.Researcher&key_reid=%s&lang=ja';
			$url = sprintf($url, $researcher_no);
			return '<a href="'.$url.'" target="_blank">'.$name.'</a>';
		}
	}

}

?>
