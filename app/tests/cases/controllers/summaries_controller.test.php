<?php
/* Summaries Test cases generated on: 2011-08-15 09:08:07 : 1313369047*/
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");
App::import('Model', 'Summary');


class SummariesControllerTestCase extends KendbTestCase {
	var $fixtures = array('app.summary', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

	function startTest() {
		$this->Summaries =& new TestSummariesController();
		$this->Summaries->constructClasses();
	}

	function endTest() {
		unset($this->Summaries);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>