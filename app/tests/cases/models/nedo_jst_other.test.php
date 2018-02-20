<?php

/* NedoJstOther Test cases generated on: 2010-11-05 10:11:36 : 1288920816 */
App::import('Model', 'NedoJstOther');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class NedoJstOtherTestCase extends KendbTestCase
{

	var $fixtures = array('app.nedo_jst_other','app.summary');

	function startTest()
	{
		$this->NedoJstOther = & ClassRegistry::init('NedoJstOther');
		$this->NedoJstOtherTest = & ClassRegistry::init('NedoJstOtherTest');
	}

	function endTest()
	{
		unset($this->NedoJstOther);
		unset($this->NedoJstOtherTest);
		ClassRegistry::flush();
	}

	function testFileColumns()
	{
		$columns = $this->NedoJstOther->getColumnTypes();
		$propery = array();
		foreach ($columns as $k => $v) {
			if ($k != "disabled" && $k != "hidden" && $k != "open_to_public" && $k != "created" &&
				$k != "updated" && $k != "created_by" && $k != "updated_by") {
				$propery[] = $k;
			}
		}
		$actual = $this->NedoJstOther->file_columns;

		$count = count($this->NedoJstOther->getColumnTypes());
		$this->assertTrue(
			$count - 7 == count($this->NedoJstOther->file_columns),
			"properly count=" . ($count - 7) . " actual count=" . count($this->NedoJstOther->file_columns)
		);
	}

	function testDefaultValue() {
		$id = 3000;
		$data["NedoJstOtherTest"] = array(
			"id" => $id,
			"year" => 2011,
		);
		$this->NedoJstOtherTest->save($data);
		$this->NedoJstOther->recursive = -1;
		$rec = $this->NedoJstOther->findById($id);
		$this->assertTrue($rec["NedoJstOther"]["open_to_public"] == 1);
		$this->assertTrue($rec["NedoJstOther"]["disabled"] == 0);
		$this->assertTrue($rec["NedoJstOther"]["hidden"] == 0);
	}

	function testArrangeNo1ValidateRule() {
		$this->NedoJstOther->query('TRUNCATE TABLE summaries');
		$this->NedoJstOtherTest->create();
		$data["NedoJstOtherTest"] = array(
			"year" => 2011,
			"arrange_no_1" => '1234-1234',
		);
		$this->assertFalse($this->NedoJstOtherTest->save($data));
		$data["NedoJstOtherTest"] = array(
			"year" => 2011,
			"arrange_no_1" => '12341234',
		);
		$this->assertTrue($this->NedoJstOtherTest->save($data));
	}

	// contract_management_no
	function testContractManagementNoRule() {
		$this->NedoJstOther->query('TRUNCATE TABLE summaries');
		$this->NedoJstOtherTest->create();
		$data["NedoJstOtherTest"] = array(
			"year" => 2011,
			"contract_management_no" => '英数字ハイフン以外',
		);
		$this->assertTrue($this->NedoJstOtherTest->save($data));
	}
}

?>
