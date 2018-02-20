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
 * @license   public http://www.titech.ac.jp/
 * @link	  none
 */

function api_cond_cmp($a, $b) {
	if	 ($a == "AND") { $a = 1; }
	elseif ($a == "OR")  { $a = 2; }
	elseif ($a == "NOT") { $a = 3; }
	else				 { $a = 4; }

	if	 ($b == "AND") { $b = 1; }
	elseif ($b == "OR")  { $b = 2; }
	elseif ($b == "NOT") { $b = 3; }
	else				 { $b = 4; }

	if($a == $b) return 0;
	return ($a < $b) ? -1 : 1;
}

/**
 * Summary
 *
 * Long description for class (if any)...
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp public
 * @link	  None
 */
class Summary extends AppModel {
	var $name = 'Summary';
	var $actsAs = array('Search.Searchable');
	var $download_file_prefix = "oudan";

	var $easy_search_field = array(
        "major_name",               // #270
		"department",
		"job_title",
        "personal_no",              // ICI#19
		"researcher_name",
		"research_type",
		"subject",
		"fund_owner",
		"memo",
		'institute_code',		// 院
		'school_code',		// 系
		'course_code',		// コース
	);

	var $base_cond = array(
		"AND" => array(
			"disabled" => 0,
			"open_to_public" => 1,
			"model_name !=" => "Encourage",
			"!(model_name = 'Contract' and model_parent_id is NULL)",
			"!(model_name = 'Entrust' and model_parent_id is NULL)",
			"!(model_name = 'Grant' and model_parent_id is NULL)",
			"!(model_name = 'NedoJstOther' and model_parent_id is NULL)",
		),
	);
	var $columns = array(
		'id',
		'model_name',
		'model_name_id',
		//'model_id',
		//'model_parent_id',
		'department',
		'researcher_name',
		'job_title',
		'amount',
		'direct_cost',
		'indirect_cost',
		'year',
		'research_type',
		'subject',
		'fund_owner',
		'start_date',
		'end_date',
		'memo',
		'researcher_no',
		'cooperate_no',
        'personal_no',          // ICI#19
		'updated',
		'is_project_record',
		'institute_code',		// 院
		'school_code',		// 系
		'course_code',		// コース
	);

	var $column_description = array(
		"year" => "年度",
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
		"personal_no" => "職員番号",            // ICI#19
		"updated" => "更新日",
		"id" => "id",
		"model_name_id" => "データ種別ID",
		"model_name" => "データ種別",
		"model_id" => "データ内ID",
		"model_parent_id" => "データ内プロジェクトレコードID",
		"is_project_record" => "プロジェクトレコード",
		'institute_code' => '院',		// 院
		'school_code' => '系',		// 系
		'course_code' => 'コース',		// コース
	);

	var $available_model = array(
		"1" => 'Adoption',
		"2" => 'OtherResearchGrant',
		"3" => 'MhlwResearchGrant',
		"5" => 'AssessedContribution',
		"6" => 'Entrust',
		"7" => 'Donation',
		"8" => 'NedoJstOther',
		"9" => 'Contract',
		"10" => 'Grant',
	);

	const DEFAULT_LIMIT = 20;
	const MAXIMUM_LIMIT = 5000;

	public function findAllForApi($condition, $attribute = array(), $order = array(), $offset = null, $limit = null) {
		$condition = $this->makeSearchCondition($condition);
		$this->log(print_r($condition, true), LOG_DEBUG);
		$order = $this->convertSortConditionToArray($order);
		$record = $this->findForApi($condition, $order, $offset, $limit);
		if ($record === false) {
			return false;
		}
		return $this->filterColumns($record, $attribute);
	}

	public function findAllForApiById($condition, $attribute = array()) {
		$cond[] = $this->base_cond;
		$cond[] = array("id" => $condition);
		$this->recursive = -1;
		$result = $this->find('all', array("conditions" => $cond));
		if ($result === false) {
			return false;
		}
		return $this->filterColumns($result, $attribute);
	}

	public function findAllForApiByCooperateNo($condition, $attribute = array()) {
		$cond[] = $this->base_cond;
		$cond[] = array("cooperate_no" => $condition);
		$this->recursive = -1;
		$result = $this->find('all', array("conditions" => $cond));
		if ($result === false) {
			return false;
		}
		return $this->filterColumns($result, $attribute);
	}

	public function countAllForApi($condition) {
		$condition = $this->makeSearchCondition($condition);
		$cond[] = $this->base_cond;
		$cond[] = $condition;
		$result = $this->find('count', array('conditions' => $cond));
		return $result;
	}

	public function filterColumns($rec, $targetAttribute)
	{
		$return_columns = $this->columns;
		$return_array = array();

		if(!is_array($targetAttribute) || count($targetAttribute) == 0) {
			$targetAttribute = $this->columns;
		}

		// 必要なカラムだけ読み込み
		for ($i = 0; $i < count($rec); $i++) {
			$ret_data = $rec[$i]["Summary"];

			foreach ($ret_data as $k => $v) {
				// プロジェクトレコードフラグの書き換え
				if (strcmp($k, "is_project_record") === 0) {
					switch ($ret_data["model_name"]) {
						case "Adoption":
							$ret_data["is_project_record"] = 1;
							break;
						case "AssessedContribution":
							$ret_data["is_project_record"] = 0;
							break;
						case "Encourage":
							$ret_data["is_project_record"] = 1;
							break;
						case "MhlwResearchGrant":
							$ret_data["is_project_record"] = 1;
							break;
						default:
							$ret_data["is_project_record"] = 2;
							break;
					}
				}
			}

			// 応答フィールドの絞り込み
			foreach ($ret_data as $k => $v) {
				if (!in_array($k, $targetAttribute)) {
					unset($ret_data[$k]);
				} else {

					// 研究題目が空の場合のみ初期値を埋める
					if (strcmp($k, "subject") === 0 && $ret_data[$k] === "") {
						$ret_data[$k] = "題目なし";
					}

					// モデル名を変換
					if (strcmp($k, "model_name") === 0) {
						$ret_data[$k] = __($v, true);
					} else {
						$ret_data[$k] = mb_convert_kana($this->zenTrim($v), "KV", "UTF-8");
					}
				}
			}
			$return_array[] = $ret_data;
		}
		return $return_array;
	}

	public function makeLimit($limit = null) {
		if(isset($limit) && is_numeric($limit)) {
			$l = intval($limit);
			if($l > Summary::MAXIMUM_LIMIT) {
				$l = Summary::MAXIMUM_LIMIT;
			}
			return $l;
		} else {
			return Summary::DEFAULT_LIMIT;
		}
	}

	public function findForApi($condition = array(), $order = array(), $offset = null, $limit = null)
	{
		$cond[] = $this->base_cond;
		$cond[] = $condition;
		if ($order == array() || $order == null) {
			$order = array("year desc", "id asc");
		}
		$find_param = array('conditions' => $cond, 'order' => $order);
		if(isset($offset) && is_numeric($offset)) {
			$find_param["offset"] = intval($offset);
		}
		$find_param["limit"] = $this->makeLimit($limit);
		$this->recursive = -1;

		try {
			$result = @$this->find('all', $find_param);
		} catch(Exception $e) {
			$result = false;
		}
		return $result;
	}

	public function makeSearchCondition($data) {
		if ($this->isMultipleArray($data) == false) {
			$cond = $this->convertSearchCondition($data);
		} else {
			$cond = array();
			$this->convertMultipleSearchCondition($data, $cond);
		}

		return $cond;
	}

	/**
	 * 多次元配列かどうか検証する
	 *
	 * @param array $arr 配列
	 *
	 * @return boolean
	 */
	public function isMultipleArray($arr)
	{
		if (!is_array($arr)) {
			return false;
		}
		foreach ($arr as $k => $v) {
			if (is_array($v)) {
				return true;
			}
		}
		return false;
	}

	public function convertSearchCondition($vv)
	{
		$q = null;

		$bFind = false;
		foreach($this->columns as $k) {
			if ($k == $vv["PROPERTY"]) {
				$vv["PROPERTY"] = $k;
				$bFind = true;
			}
		}
		if(!$bFind) {
			return $q;
		}

		if (isset($vv["WORD"])) {
			if ($this->isIntegerField($vv["PROPERTY"])) {
				$q = array($vv["PROPERTY"] => $vv["WORD"]);
			} elseif (isset($vv["STRICT"]) && $vv["STRICT"] == true) {
				$q = array($vv["PROPERTY"] => $vv["WORD"]);
			} else {
				$q = array($vv["PROPERTY"] . " LIKE" => "%" . $vv["WORD"] . "%");
			}
		} else {
			if (isset($vv["MIN"]) && isset($vv["MAX"])) {
				$q = array($vv["PROPERTY"] . " BETWEEN ? AND ?" => array($vv["MIN"], $vv["MAX"]));
			} elseif (isset($vv["MIN"])) {
				$q = array($vv["PROPERTY"] . " >= " => $vv["MIN"]);
			} elseif (isset($vv["MAX"])) {
				$q = array($vv["PROPERTY"] . " <= " => $vv["MAX"]);
			}
		}
		if (isset($vv['NOT']) && $vv["NOT"] == true) {
			$q = array("NOT" => $q);
		}

		return $q;
	}

	public function convertMultipleSearchCondition($data, &$cond) {
		if (!is_array($data)) {
			return;
		}
		// Itemsの中身を並べ替える
		uksort($data, "api_cond_cmp");

		$and_or = "";
		$not = null;
		foreach ($data as $k => $v) {
			if ($k == "AND" && $v == true) {
				$and_or = "AND";
			} elseif ($k == "OR" && $v == true) {
				$and_or = "OR";
			}
			if ($k == "NOT" && $v == true) {
				$not = "NOT";
			}
			# ITEMS項目が存在し、その配列の中にITEMSが存在しなかったら条件化する
			if ($k == "ITEMS") {
				foreach ($v as $kk => $vv) {
					if (!is_array($vv)) {
						continue;
					}
					if (!array_key_exists("ITEMS", $vv)) {
						$q = $this->convertSearchCondition($vv);
						$this->log($q, LOG_DEBUG);
						if (isset($not)) {
							$cond["NOT"][$and_or][] = $q;
						} else {
							$cond[$and_or][] = $q;
						}
					} else {
						if (isset($not)) {
							$this->convertMultipleSearchCondition($vv, $cond["NOT"][$and_or][]);
						} else {
							$this->convertMultipleSearchCondition($vv, $cond[$and_or][]);
						}
					}
				}
			}
		}
		return false;
	}

	/**
	 * ソート条件の作成
	 *
	 * @param string $modelname モデル名
	 * @param array  $data	  ソート条件の配列データ
	 *
	 * @return array
	 */
	public function convertSortConditionToArray($data)
	{
		$order = array();

		$columns = $this->columns;

		foreach($data as $item) {
			$item = preg_replace("/\s+/", " ", trim($item));

			$arr = explode(" ", $item);

			if (count($arr) == 1) {
				$column = $arr[0];
				$asc_desc = " ASC ";
			} elseif(strtoupper($arr[1]) == "DESC") {
				$column = $arr[0];
				$asc_desc = " DESC ";
			} elseif(strtoupper($arr[1]) == "ASC") {
				$column = $arr[0];
				$asc_desc = " ASC ";
			} else {
				$column = $arr[0];
				$asc_desc = " ASC ";
			}

			// カラムを実カラムに変換
			$bFind = false;
			for($i=0; $i<count($columns); $i++) {
				if ($columns[$i] == $column) {
					$bFind = true;
				}
			}
			if(!$bFind) {
				continue;
			}
			// 並び順
			$order[] = $column . $asc_desc;
		}
		return $order;
	}

	public function makeResponseProperty()
	{
		$property = array();
		foreach ($this->columns as $kk => $vv) {
			if (!is_null($vv)) {
				$index = count($property);
				// 応答データのプロパティと型
				$property[$index]["Property"] = $vv;
				if ($this->isIntegerField($vv)) {
					$property[$index]["Type"] = "Integer";
				} elseif (strcmp($vv, "updated") == 0 || strcmp($vv, "start_date") == 0 || strcmp($vv, "end_date") == 0) {
					$property[$index]["Type"] = "Date";
				} else {
					$property[$index]["Type"] = "String";
				}
				$desc = @$this->column_description[$vv];
				$property[$index]["Description"] = $desc;
			}
		}
		return $property;
	}

	private function isIntegerField($column_name)
	{
		$integer_fields = array(
			"year", "id", "amount",
			"direct_cost", "indirect_cost",
			"model_name_id", "model_id",
		);
		return in_array($column_name, $integer_fields);
	}
}
?>
