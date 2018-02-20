<?php

/* Grant Test cases generated on: 2010-11-27 18:11:26 : 1290850646 */
App::import('Model', 'Grant');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class GrantTestCase extends KendbTestCase {
    var $fixtures = array('app.grant');

    function startTest() {
        $this->Grant = & ClassRegistry::init('Grant');
    }

    function endTest() {
        unset($this->Grant);
        ClassRegistry::flush();
    }

    function testFileColumns() {
        $count = count($this->Grant->getColumnTypes());
        $this->assertTrue($count -7 == count($this->Grant->file_columns));
    }


}

?>