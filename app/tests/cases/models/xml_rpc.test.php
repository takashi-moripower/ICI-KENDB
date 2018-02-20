<?php

/* XmlRpc Test cases generated on: 2011-11-17 05:11:04 : 1321476064 */
App::import('Model', 'XmlRpc');

require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class XmlRpcTestCase extends KendbTestCase
{

	var $fixtures = array();

	function startTest()
	{
		$this->XmlRpc = & ClassRegistry::init('XmlRpc');
	}

	function endTest()
	{
		unset($this->XmlRpc);
		ClassRegistry::flush();
	}

	/**
	 * XMLRPC引数のデータ種別からモデル名を取得するテスト
	 */
	function testGetModelName()
	{
		$data = $this->XmlRpc->available_model;
		foreach ($data as $k => $v) {
			$this->assertTrue($this->XmlRpc->_getModelName($k) === $v);
		}
		// 廃止したデータ種別
		$this->assertFalse($this->XmlRpc->_getModelName("4"));
	}

	/**
	 * モデル名からXMLRPCの引数のデータIDに変換する
	 */
	function testGetModelId()
	{
		$data = $this->XmlRpc->available_model;
		foreach ($data as $k => $v) {
			$this->assertTrue($this->XmlRpc->_getModelId($v) === $k);
		}
		// 廃止したデータ種別
		$this->assertFalse($this->XmlRpc->_getModelId("Encourage"));
	}

	/**
	 * 応答フィールドの型を特定する
	 */
	function testGetResponseProperty() {
		$columns = array("id", "year", "amount" ,"direct_cost", "indirect_cost" );
		foreach($columns as $k => $v) {
			$arr = array($v => $v);
			$property = $this->XmlRpc->_makeResponseProperty($arr);
			$this->assertEqual("Integer", $property[0]["Type"]);
		}
		$columns = array("updated" );
		foreach($columns as $k => $v) {
			$arr = array($v => $v);
			$property = $this->XmlRpc->_makeResponseProperty($arr);
			$this->assertEqual("Date", $property[0]["Type"]);
		}
	}

}

?>