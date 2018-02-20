<?php
/* Api Test cases generated on: 2011-11-25 13:11:10 : 1322194990*/

require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class ApiControllerTestCase extends KendbTestCase {
	var $fixtures = array('app.api', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

	function startTest() {
		$this->Api =& new TestApiController();
		$this->Api->constructClasses();
	}

	function endTest() {
		unset($this->Api);
		ClassRegistry::flush();
	}

}
?>
