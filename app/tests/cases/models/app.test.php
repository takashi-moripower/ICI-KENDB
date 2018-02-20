<?php

/* User Test cases generated on: 2010-10-01 20:10:38 : 1285980818 */
App::import('Model', 'AppModel');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class AppTestCase extends KendbTestCase {

//	var $fixtures = array('app.user');

	function startTest() {
		$this->App = & ClassRegistry::init('AppModel');
	}

	function endTest() {
		unset($this->App);
		ClassRegistry::flush();
	}

	/**
	 * 日付が所定形式ではない場合はNULLに変換されること
	 */
	function testConvertDateNull() {
		$this->assertTrue($this->App->convertDateNull("0000-00-00") == null);
		$this->assertTrue($this->App->convertDateNull("") == null);
		$this->assertTrue($this->App->convertDateNull("2010/12/01") == "2010/12/01");
	}

	/**
	 * 数値アルファベットハイフンのみで構成されていることのチェック
	 */
	function testAlphaNumericHyphen() {
		$this->assertTrue($this->App->alphaNumericHyphen("0"));
		$this->assertTrue($this->App->alphaNumericHyphen("A"));
		$this->assertTrue($this->App->alphaNumericHyphen("-"));
		$this->assertTrue($this->App->alphaNumericHyphen("0A-"));
		$this->assertFalse($this->App->alphaNumericHyphen("$"));
		$this->assertFalse($this->App->alphaNumericHyphen("*"));
		//$this->assertFalse($this->App->alphaNumericHyphen("_"));
		$this->assertFalse($this->App->alphaNumericHyphen("テスト"));
	}

	/**
	 * パスワードに使える文字列のチェックされていることのチェック
	 */
	function testPasswordRule() {
		$this->assertTrue($this->App->passwordRule("01234567890AaZz"));
		$this->assertTrue($this->App->passwordRule("!#$%&'(-=^~\\)"));
		$this->assertTrue($this->App->passwordRule("@`[{]}*+_/?><.,"));
		$this->assertFalse($this->App->passwordRule("テスト"));
		$this->assertFalse($this->App->passwordRule("1234テストAz!"));
	}

	/**
	 * 数値とハイフンで構成されていることのチェック
	 */
	function testNumericHyphen() {
		$this->assertTrue($this->App->numericHyphen("0"));
		$this->assertTrue($this->App->numericHyphen("-"));
		$this->assertTrue($this->App->numericHyphen("000-0000"));
		$this->assertFalse($this->App->numericHyphen("A"));
		$this->assertFalse($this->App->numericHyphen("あ"));

		$arr = array("000", "0-0", "1-1");
		$this->assertTrue($this->App->numericHyphen($arr));
		$arr = array("000", "0-0", "A");
		$this->assertFalse($this->App->numericHyphen($arr));
	}

	/**
	 * 年度が指定の範囲内に収まっていること
	 */
	function testNendoRange() {
		$this->assertTrue($this->App->nendoRange("2010"));
		$this->assertTrue($this->App->nendoRange(date('Y') + 1));
		$this->assertFalse($this->App->nendoRange(date('Y') + 2));
		$this->assertFalse($this->App->nendoRange(2003));
		$this->assertTrue($this->App->nendoRange("2003", 2003, 2010));
	}

	/**
	 * 年度が指定の範囲に収まっていること２
	 */
	function testNendoRangeArray() {
		$data["year"] = 2010;
		$this->assertTrue($this->App->nendoRange($data));
		$data["year"] = date('Y') + 1;
		$this->assertTrue($this->App->nendoRange($data));
		$data["year"] = date('Y') + 2;
		$this->assertFalse($this->App->nendoRange($data));
		$data["year"] = 2003;
		$this->assertFalse($this->App->nendoRange($data));
		$this->assertTrue($this->App->nendoRange($data, 2003, 2010));
	}

	/**
	 * 文字列の長さチェックが動作すること
	 */
	function testEaualLength() {
		$this->assertTrue($this->App->equalLength("", 0));
		$this->assertTrue($this->App->equalLength("12345678", 8));
		$this->assertFalse($this->App->equalLength("1234", 1));
		$data["key1"] = "12345";
		$data["key2"] = "AAAAA";
		$this->assertTrue($this->App->equalLength($data, 5));
		$data["key3"] = "";
		$this->assertFalse($this->App->equalLength($data, 5));
	}

	/**
	 * 現在の年度が正しく取得されること
	 */
	function testGetCurrentNendo() {
		$this->assertTrue($this->App->getCurrentNendo("2010-03-31") === 2009);
		$this->assertTrue($this->App->getCurrentNendo("2010-04-01") === 2010);
		$this->assertTrue($this->App->getCurrentNendo("2010-12-31") === 2010);
		$this->assertTrue($this->App->getCurrentNendo("2011-01-01") === 2010);
		$this->assertTrue($this->App->getCurrentNendo("2011-03-31") === 2010);
		$this->assertTrue($this->App->getCurrentNendo("2011-04-01") === 2011);
	}

	/**
	 * ノードの再計算ができること
	 */
	function testRecalcNode() {
		$this->assertTrue($this->App->recalcNode(1) == true);
	}

	/**
	 * スペースを削除する
	 */
	function testzenTrim() {
		// 全角
		$str = "テスト　　";
		$this->assertEqual($this->App->zenTrim($str), "テスト");
		// 半角
		$str = "テスト  ";
		$this->assertEqual($this->App->zenTrim($str), "テスト");
		// 混合
		$str = "テスト　　  ";
		$this->assertEqual($this->App->zenTrim($str), "テスト");
		// 先頭も消す
		$str = " テスト　　  ";
		$this->assertEqual($this->App->zenTrim($str), "テスト");
		// 先頭も消す
		$str = "　　  テスト　　  ";
		$this->assertEqual($this->App->zenTrim($str), "テスト");
	}
}

?>
