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
 * XmlRpc
 *
 * XmlRpc関連
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class Api extends AppModel
{

	var $useTable = false;
	/**
	 * 第一引数名とそれに対応した検索モデル
	 *
	 * @var array
	 */
	var $available_model = array(
		"0" => 'Researcher',
		"1" => 'Adoption',
		"2" => 'OtherResearchGrant',
		"3" => 'MhlwResearchGrant',
		//"4" => 'Encourage', // 特別研究員奨励費は検索対象から完全除外
		"5" => 'AssessedContribution',
		"6" => 'Entrust',
		"7" => 'Donation',
		"8" => 'NedoJstOther',
		"9" => 'Contract',
		"10" => 'Grant',
	);
	/**
	 * フィールドの説明
	 *
	 * @var array
	 */
	var $column_description = array(
		"year" => "年度",
		//"research_type" => "資金元/研究種目",
		"research_type" => "プログラム名",
		"researcher_name" => "氏名",
		"department" => "所属部局名",
		"job_title" => "職",
		"subject" => "研究題目",
		"start_date" => "研究開始日",
		"end_date" => "研究終了日",
		"amount" => "受入総額",
		"direct_cost" => "直接経費",
		"indirect_cost" => "間接経費",
		"fund_owner" => "資金元",
		"memo" => "備考",
		"researcher_no" => "研究者番号",
		"cooperate_no" => "東工大連携Id",
		"updated" => "更新日",
		"id" => "id",
		"datatype" => "データ種別",
	);

	/**
	 * 引数のデータ種別をチェック
	 *
	 * @param string $datatype データ種別
	 *
	 * @return string
	 */
	function _getModelName($datatype)
	{
		if (is_null($datatype)) {
			return false;
		}
		foreach ($this->available_model as $k => $v) {
			if ($datatype == $k) {
				return $v;
			}
		}
		return false;
	}

	/**
	 * モデル名からモデルIDを取得する
	 *
	 * @param string $modelname モデル名
	 *
	 * @return mixed
	 */
	function _getModelId($modelname)
	{
		foreach ($this->available_model as $k => $v) {
			if ($modelname === $v) {
				return $k;
			}
		}
		return false;
	}

	/**
	 * Describeの応答フィールドのプロパティを作成する
	 *
	 * @param array $columns カラム名の配列
	 *
	 * @return array
	 */
	function _makeResponseProperty($columns)
	{
		$property = array();
		foreach ($columns as $kk => $vv) {
			if (!is_null($vv)) {
				$index = count($property);
				// 応答データのプロパティと型
				$property[$index]["Property"] = $kk;
				if (strcmp($kk, "year") == 0 || strcmp($kk, "id") == 0 || strcmp($kk, "amount") == 0 ||
					strcmp($kk, "direct_cost") == 0 || strcmp($kk, "indirect_cost") == 0) {
					$property[$index]["Type"] = "Integer";
				} elseif (strcmp($kk, "updated") == 0 || strcmp($kk, "start_date") == 0 || strcmp($kk, "end_date") == 0) {
					$property[$index]["Type"] = "Date";
				} else {
					$property[$index]["Type"] = "String";
				}
				$desc = @$this->column_description[$kk];
				$property[$index]["Description"] = $desc;
			}
		}
		return $property;
	}

}

?>
