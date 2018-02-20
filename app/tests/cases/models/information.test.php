<?php

/* Information Test cases generated on: 2011-01-06 16:01:30 : 1294299750 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

App::import('Model', 'Information');

class InformationTestCase extends KendbTestCase {

    var $fixtures = array('app.information');
    var $dropTables = false;

    function startTest() {
        $this->Information = & ClassRegistry::init('Information');
    }

    function endTest() {
        unset($this->Information);
        ClassRegistry::flush();
    }

}

?>