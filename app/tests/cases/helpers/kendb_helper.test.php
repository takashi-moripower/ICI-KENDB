<?php
/* Adoptions Test cases generated on: 2011-01-05 11:01:46 : 1294194586 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");
App::import("Helper", "Kendb");

class KendbHelperTestCase extends KendbTestCase {

	function startTest() {
		$this->Kendb = & new KendbHelper();
	}

	// 文字列の短縮テスト
	function testShortenString()
	{
		$str = "1234567890";
		$this->assertEqual($str, $this->Kendb->shorten_string($str));

		$str = "1234567890123456789012345678901";
		$this->assertEqual("123456789012345678901234567890...", $this->Kendb->shorten_string($str));

		$str = "１２３４５６７８９０";
		$this->assertEqual($str, $this->Kendb->shorten_string($str));

		$str = "１２３４５６７８９０１２３４５６７８９０１２３４５６７８９０１";
		$this->assertEqual("１２３４５６７８９０１２３４５６７８９０１２３４５６７８９０...", $this->Kendb->shorten_string($str));

		$str = "123456789012345678901234567890\r\n";
		$this->assertEqual("123456789012345678901234567890...", $this->Kendb->shorten_string($str));

		$str = "1234567890123456789012345\r\n67890";
		$this->assertEqual("1234567890123456789012345 6789...", $this->Kendb->shorten_string($str));

	}

	// 教員名へのリンクテスト
	function testMakeResearcherLink()
	{
		$name = "横田";
		$researcher_no = "10242570";
		$result = $this->Kendb->makeResearcherLink($name, $researcher_no);
		$this->assertEqual($result, '<a href="http://search.star.titech.ac.jp/titech-ss/resolver.act?target=STARSearch.Researcher&key_reid=10242570&lang=ja" target="_blank">横田</a>');
		$name = "横田　　　　　　"; // 全角スペース入り
		$researcher_no = "10242570";
		$result = $this->Kendb->makeResearcherLink($name, $researcher_no);
		$this->assertEqual($result, '<a href="http://search.star.titech.ac.jp/titech-ss/resolver.act?target=STARSearch.Researcher&key_reid=10242570&lang=ja" target="_blank">横田</a>');
		// 研究者番号なし
		$name = "横田";
		$researcher_no = "";
		$result = $this->Kendb->makeResearcherLink($name, $researcher_no);
		$this->assertEqual($result, "横田");
	}

	function endTest() {
		ClassRegistry::flush();
	}

}

?>
