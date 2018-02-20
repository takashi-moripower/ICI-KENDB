<?php
/* Summary Test cases generated on: 2011-06-23 11:06:52 : 1308797992*/
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");
App::import('Model', 'Summary');

class SummaryTestCase extends KendbTestCase {
	var $fixtures = array('app.summary');

	function startTest() {
		$this->Summary =& ClassRegistry::init('Summary');
	}

	function endTest() {
		unset($this->Summary);
		ClassRegistry::flush();
	}

	function testFindForApi() {
		$condition = null;
		$rec = $this->Summary->findForApi($condition);
		for($i = 0; $i<count($rec); $i++) {
			$d = $rec[$i]["Summary"];
			$this->assertNotEqual($d["open_to_public"], 0);
			$this->assertNotEqual($d["disabled"], 1);
			$this->assertNotEqual($d["model_name"], "Encourage");
			$this->assertNotEqual($d["model_name_id"], 4);
		}
	}
	function testFindForApi2() {
		Configure::write('debug', 0);
		$condition = "this is illegal parameter";
		$rec = $this->Summary->findForApi($condition);
		$this->assertFalse($rec);
	}

	function testFindForApi3() {
		Configure::write('debug', 0);
		$condition = array("non_existence_field" => true);
		$rec = $this->Summary->findForApi($condition);
		$this->assertFalse($rec);
	}

	function testFindForApiHankaku() {
		Configure::write('debug', 0);
		mb_language("Japanese");
		//$condition = array("subject collate utf8_unicode_ci" => mb_convert_kana("データベース","k"));
		$condition = array("subject" => mb_convert_kana("データベース","k"));
		$rec = $this->Summary->findForApi($condition);
		$this->assertTrue($rec);
	}

	/**
	 * 完全一致
	 */
	function testConvertSearchCondition1() {
		$search_cond = array(
			"PROPERTY" => "subject",
			"WORD" => "データベース",
			"STRICT" => true,
		);
		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["subject"], "データベース");

		// NOT
		$search_cond["NOT"] = true;
		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["NOT"]["subject"], "データベース");

	}

	/**
	 * Like 検索
	 **/
	function testConvertSearchCondition2() {
		$search_cond = array(
			"PROPERTY" => "subject",
			"WORD" => "データベース",
			"STRICT" => false,
		);
		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["subject LIKE"], "%データベース%");

		// NOT
		$search_cond["NOT"] = true;
		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["NOT"]["subject LIKE"], "%データベース%");
	}

	/**
	 * Between 検索
	 **/
	function testConvertSearchCondition3() {
		$search_cond = array(
			"PROPERTY" => "amount",
			"MIN" => 0,
			"MAX" => 100,
		);

		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["amount BETWEEN ? AND ?"], array(0, 100));

		// NOT
		$search_cond["NOT"] = true;
		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["NOT"]["amount BETWEEN ? AND ?"], array(0, 100));

		$search_cond = array(
			"PROPERTY" => "amount",
			"MIN" => 10,
		);
		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["amount >= "], 10);
		// NOT
		$search_cond["NOT"] = true;
		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["NOT"]["amount >= "], 10);

		$search_cond = array(
			"PROPERTY" => "amount",
			"MAX" => 1000,
		);
		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["amount <= "], 1000);
		// NOT
		$search_cond["NOT"] = true;
		$result = $this->Summary->convertSearchCondition($search_cond);
		$this->assertEqual($result["NOT"]["amount <= "], 1000);
	}

	function testConvertSearchCondition4() {

		$search_cond = array(
			"AND" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "subject",
					"WORD" => "研究題目: [SS] テストデータ 2011|23年度",
					"STRICT" => false,
				),
				array(
					"OR" => true,
					"ITEMS" => array(
						array(
							"PROPERTY" => "model_name_id",
							"STRICT" => true,
							"WORD" => 1,
						),
						array(
							"PROPERTY" => "model_name_id",
							"STRICT" => true,
							"WORD" => 3,
						),
					),
				),
				array(
					"OR" => true,
					"ITEMS" => array(
						array(
							"PROPERTY" => "model_name_id",
							"STRICT" => true,
							"WORD" => 2,
						),
						array(
							"PROPERTY" => "model_name_id",
							"STRICT" => true,
							"WORD" => 10,
						),
					),
				),
			),
		);
		$result = array();
		$this->Summary->convertMultipleSearchCondition($search_cond, $result);
		var_dump($result);
		$this->assertEqual($result["AND"][0]["subject LIKE"], "%研究題目: [SS] テストデータ 2011|23年度%");
		$this->assertEqual($result["AND"][1]["OR"][0]["model_name_id"], 1);
		$this->assertEqual($result["AND"][1]["OR"][1]["model_name_id"], 3);
		$this->assertEqual($result["AND"][2]["OR"][0]["model_name_id"], 2);
		$this->assertEqual($result["AND"][2]["OR"][1]["model_name_id"], 10);
	}

	function testMultipleSearchCondition() {
		$search_cond = array(
			"AND" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "教授",
					"STRICT" => true,
				),
				array(
					"PROPERTY" => "researcher_name",
					"WORD" => "横田",
					"STRICT" => true,
				),
			),
		);
		$result = array();
		$this->Summary->convertMultipleSearchCondition($search_cond, $result);
		$this->assertEqual($result["AND"][0]["job_title"], "教授");
		$this->assertEqual($result["AND"][1]["researcher_name"], "横田");

		$search_cond = array(
			"OR" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "教授",
					"STRICT" => true,
				),
				array(
					"PROPERTY" => "researcher_name",
					"WORD" => "横田",
					"STRICT" => true,
				),
			),
		);
		$result = array();
		$this->Summary->convertMultipleSearchCondition($search_cond, $result);
		$this->assertEqual($result["OR"][0]["job_title"], "教授");
		$this->assertEqual($result["OR"][1]["researcher_name"], "横田");
	}

	function testMultipleSearchCondition2() {
		$search_cond = array(
			"AND" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "教授",
					"STRICT" => true,
				),
				array(
					"OR" => true,
					"ITEMS" => array(
						array(
							"PROPERTY" => "researcher_name",
							"WORD" => "横田",
							"STRICT" => true,
						),
						array(
							"PROPERTY" => "researcher_name",
							"WORD" => "田中",
							"STRICT" => true,
						),
					),
				),
			),
		);
		$result = array();
		$this->Summary->convertMultipleSearchCondition($search_cond, $result);
		$this->assertEqual($result["AND"][0]["job_title"], "教授");
		$this->assertEqual($result["AND"][1]["OR"][0]["researcher_name"], "横田");
		$this->assertEqual($result["AND"][1]["OR"][1]["researcher_name"], "田中");
	}

	function testMultipleSearchCondition5() {
		$search_cond = array(
			"AND" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "教授",
					"STRICT" => true,
				),
				array(
					"OR" => true,
					"ITEMS" => array(
						array(
							"PROPERTY" => "model_name_id",
							"WORD" => 1,
						),
						array(
							"PROPERTY" => "model_name_id",
							"WORD" => 2, 
						),
					),
				),
			),
		);
		$result = array();
		$this->Summary->convertMultipleSearchCondition($search_cond, $result);
		$this->assertEqual($result["AND"][0]["job_title"], "教授");
		$this->assertEqual($result["AND"][1]["OR"][0]["model_name_id"], 1);
		$this->assertEqual($result["AND"][1]["OR"][1]["model_name_id"], 2);
	}

	// ANDの位置には依存性はないことを確認
	function testMultipleSearchCondition4() 
	{
		$search_cond = array(
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "教授",
					"STRICT" => true,
				),
				array(
					"PROPERTY" => "researcher_name",
					"WORD" => "横田",
					"STRICT" => true,
				),
			),
			"AND" => true,
		);
		$result = array();
		$this->Summary->convertMultipleSearchCondition($search_cond, $result);
		$this->assertEqual($result["AND"][0]["job_title"], "教授");
		$this->assertEqual($result["AND"][1]["researcher_name"], "横田");
	}

	function testMakeSearchCondition() {
		$search_cond = array(
			"PROPERTY" => "subject",
			"WORD" => "データベース",
			"STRICT" => true,
		);
		$result = $this->Summary->makeSearchCondition($search_cond);
		$this->assertEqual($result["subject"], "データベース");

		$search_cond = array(
			"AND" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "教授",
					"STRICT" => true,
				),
				array(
					"OR" => true,
					"ITEMS" => array(
						array(
							"PROPERTY" => "researcher_name",
							"WORD" => "横田",
							"STRICT" => true,
						),
						array(
							"PROPERTY" => "researcher_name",
							"WORD" => "田中",
							"STRICT" => true,
						),
					),
				),
			),
		);
		$result = $this->Summary->makeSearchCondition($search_cond);
		var_dump($result);
		$this->assertEqual($result["AND"][0]["job_title"], "教授");
		$this->assertEqual($result["AND"][1]["OR"][0]["researcher_name"], "横田");
		$this->assertEqual($result["AND"][1]["OR"][1]["researcher_name"], "田中");
	}

	function testConvertSortConditionToArray() {
		$order = array("department desc", "id desc");
		$result = $this->Summary->convertSortConditionToArray($order);
		$this->assertEqual($result[0], "department DESC ");
		$this->assertEqual($result[1], "id DESC ");
	}

	function testFindAllForApi() {
		$search_cond = array(
			"PROPERTY" => "model_name_id",
			"WORD" => 8,
			"STRICT" => true,
		);
		$result = $this->Summary->findAllForApi($search_cond, array("id", "subject"), array("id asc"), 0 , 1);
		$this->assertEqual(1, count($result));
		$this->assertEqual("はじめのデータ", $result[0]["subject"]);
		$this->assertEqual(1, $result[0]["id"]);
	}

	function testFindAllForApiOR() {
		$search_cond = array(
			"OR" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "cooperate_no",
					"WORD" => "2345678",
					"STRICT" => true,
			 	),
			 	array(
					 "PROPERTY" => "researcher_no",
				 	"WORD" => "666666",
					"STRICT" => true,
			 	),
		 	),
	 	);
		$result = $this->Summary->findAllForApi($search_cond, array(), array("id asc"));
		#$this->assertEqual(0, count($result));
	}

	function testFindAllForApiNoRec() {
		$search_cond = array(
			"AND" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "ほげ教授",
					"STRICT" => true,
			 	),
			 	array(
					 "PROPERTY" => "researcher_name",
				 	"WORD" => "久堀",
			 	),
		 	),
	 	);
		$result = $this->Summary->findAllForApi($search_cond, array("id", "subject"), array("id asc"), 0 , 1);
		$this->assertEqual(0, count($result));
	}

	function testFindAllForApiBadPos()
	{
		$search_cond = array(
			"ITEMS" => array(
				array(
					// "NOT" => true,
					"WORD" => "教授",
					"STRICT" => true,
					"PROPERTY" => "job_title",
				),
				"AND" => true,	
			),
		);
		$result = $this->Summary->findAllForApi($search_cond);
		$this->assertFalse($result);
	}

	// limitの件数
	function testSetLimit() {
		// 未実装
	}

	// ANDの位置がどこにあっても正常に動作すること
	function testFindAllForApiAndPos() {
		$search_cond = array(
			"AND" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "助手",
					"STRICT" => true,
				),
				array(
					"PROPERTY" => "researcher_name",
					"WORD" => "田中",
				),
			),
		);
		$search_cond2 = array(
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "助手",
					"STRICT" => true,
				),
				array(
					"PROPERTY" => "researcher_name",
					"WORD" => "田中",
				),
			),
			"AND" => true,
		);

		$result = $this->Summary->findAllForApi($search_cond);
		$result2 = $this->Summary->findAllForApi($search_cond2);
		$this->assertEqual($result, $result2);
	}


	function testCountAllForApi() {
		$search_cond = array(
			"PROPERTY" => "model_name_id",
			"WORD" => 8,
			"STRICT" => true,
		);
		$result = $this->Summary->countAllForApi($search_cond);
		$this->assertEqual(9, $result);
		$search_cond = array(
			"PROPERTY" => "subject",
			"WORD" => "はじめのデータ",
			"STRICT" => true,
		);
		$result = $this->Summary->countAllForApi($search_cond);
		$this->assertEqual(1, $result);
	}

	function testFindAllForApiById() {
		$result = $this->Summary->findAllForApiById(array(1,2), array("id", "subject"));
		$this->assertEqual(count($result), 2);
	}

	function testFindAllForApiByCooperateNo() {
		$result = $this->Summary->findAllForApiByCooperateNo(array("1234567","2345678"), array("id", "subject"));
		$this->assertEqual(count($result), 2);
	}

	function testFindAllForApiNOT() {
		$search_cond = array(
			"AND" => true,
			"ITEMS" => array(
				array(
					"PROPERTY" => "job_title",
					"WORD" => "特任准教授",
					"STRICT" => true,
				),
				array(
					"NOT" => true,
					"PROPERTY" => "researcher_name",
					"WORD" => "佐藤",
				),
			),
		);
		$result = $this->Summary->findAllForApi($search_cond);
		$this->assertEqual(1, count($result));
		$this->assertEqual("田中三郎", $result[0]["researcher_name"]);
	}

	// 戻り値からスペースを削除すること
	function testFindAllForApiTrimSpace() {
		$str = "スペース２つ入りの研究課題";
		$search_cond = array(
			"PROPERTY" => "subject",
			"WORD" => $str,
			"STRICT" => false,
		);
		$result = $this->Summary->findAllForApi($search_cond);
		$this->assertEqual($str, $result[0]["subject"]);
	}

	// 応答カラムのフィルターが出来ているか
	function testFilterColumn() {
		$rec[0]["Summary"]["id"] = 1;
		$rec[0]["Summary"]["model_name"] = "NedoJstOther";
		$rec[0]["Summary"]["model_name_id"] = 1;
		$rec[0]["Summary"]["subject"] = "テストタイトル";
		$rec[0]["Summary"]["cooperate_no"] = "1234567";
		$rec[0]["Summary"]["job_title"] = "准教授";
		$rec[0]["Summary"]["amount"] = 12345;
		$targetAttribute = array(
			"id", "subject", "amount", "model_name_id",
		);
		$result = $this->Summary->filterColumns($rec, $targetAttribute);
		$this->assertTrue(array_key_exists("id", $result[0]));
		$this->assertTrue(array_key_exists("model_name_id", $result[0]));
		$this->assertTrue(array_key_exists("subject", $result[0]));
		$this->assertTrue(array_key_exists("amount", $result[0]));
		$this->assertFalse(array_key_exists("model_name", $result[0]));
		$this->assertFalse(array_key_exists("cooperate_no", $result[0]));
		$this->assertFalse(array_key_exists("job_title", $result[0]));
	}

	function testHankaku() {

		$data["Summary"]["model_name"] = "Adoption";
		$data["Summary"]["model_name_id"] = 1;
		$data["Summary"]["model_id"] = 9000;
		$data["Summary"]["subject"] = mb_convert_kana("ダミーテストタイトル", "k");
		$data["Summary"]["cooperate_no"] = "987654321";
		$data["Summary"]["job_title"] = "准教授";
		$data["Summary"]["amount"] = 12345;
		$data["Summary"]["is_project_record"] = 1;
		$data["Summary"]["open_to_public"] = 1;
		$this->Summary->create();
		if(!$this->Summary->save($data)) {
			echo "データ登録に失敗";
		}
		$cond = "987654321";
		$result = $this->Summary->findAllForApiByCooperateNo($cond);
		$this->assertTrue($result[0]["subject"] == "ダミーテストタイトル");
	}

	function testProjectRecordFlag() {
		// 科研費（文科・学振）
		$data["Summary"]["model_name"] = "Adoption";
		$data["Summary"]["model_name_id"] = 1;
		$data["Summary"]["model_id"] = 9000;
		$data["Summary"]["subject"] = "テストタイトル";
		$data["Summary"]["cooperate_no"] = "987654321";
		$data["Summary"]["job_title"] = "准教授";
		$data["Summary"]["amount"] = 12345;
		$data["Summary"]["is_project_record"] = 1;
		$data["Summary"]["open_to_public"] = 1;
		$this->Summary->create();
		if(!$this->Summary->save($data)) {
			echo "データ登録に失敗";
		}
		$cond = "987654321";
		$result = $this->Summary->findAllForApiByCooperateNo($cond);
		$this->assertTrue($result[0]["is_project_record"] == 1);
		$this->assertTrue($result[0]["subject"] == "テストタイトル");
		$this->assertTrue($result[0]["job_title"] == "准教授");

		$this->Summary->query("TRUNCATE table summaries");

		// 科研費分担金
		$data["Summary"]["model_name"] = "AssessedContribution";
		$this->Summary->create();
		if(!$this->Summary->save($data)) {
			echo "データ登録に失敗";
		}
		$cond = "987654321";
		$result = $this->Summary->findAllForApiByCooperateNo($cond);
		$this->assertTrue($result[0]["is_project_record"] == 0);

		$this->Summary->query("TRUNCATE table summaries");

		// 科研費（特別研究員奨励費）データとしてヒットしないこと
		$data["Summary"]["model_name"] = "Encourage";
		$this->Summary->create();
		if(!$this->Summary->save($data)) {
			echo "データ登録に失敗";
		}
		$cond = "987654321";
		$result = $this->Summary->findAllForApiByCooperateNo($cond);
		$this->assertTrue(count($result) == 0);

		// 研究補助金（環境・その他）
		$this->Summary->query("TRUNCATE table summaries");
		$data["Summary"]["model_name"] = "OtherResearchGrant";
		$this->Summary->create();
		if(!$this->Summary->save($data)) {
			echo "データ登録に失敗";
		}
		$cond = "987654321";
		$result = $this->Summary->findAllForApiByCooperateNo($cond);
		$this->assertTrue($result[0]["is_project_record"] == 2);

		// 受託研究（政府系） 親子関係あり。子のみ応答のはず
		$this->Summary->query("TRUNCATE table summaries");
		$data["Summary"]["model_name"] = "NedoJstOther";
		$this->Summary->create();
		if(!$this->Summary->save($data)) {
			echo "データ登録に失敗2";
		}
		// 子データ作る
		$data["Summary"]["model_parent_id"] = 9000;
		$data["Summary"]["model_id"] = 9001;
		$data["Summary"]["subject"] = "明細データ";
		$data["Summary"]["cooperate_no"] = "987654321";
		$data["Summary"]["job_title"] = "助手";
		$this->Summary->create();
		if(!$this->Summary->save($data)) {
			echo "データ登録に失敗3";
		}
		$cond = "987654321";
		$result = $this->Summary->findAllForApiByCooperateNo($cond);
		$this->assertTrue(count($result) == 1);
		$this->assertTrue($result[0]["is_project_record"] == 2);
		$this->assertTrue($result[0]["subject"] == "明細データ");

	}
}
?>
