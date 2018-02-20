<?php

/* Adoption Test cases generated on: 2011-01-05 11:01:06 : 1294194546 */
App::import('Model', 'Adoption');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class AdoptionTestCase extends KendbTestCase {

    var $fixtures = array('app.adoption');
    var $dropTables = false;

    function startTest() {
        $this->Adoption = & ClassRegistry::init('Adoption');
    }

    function endTest() {
        unset($this->Adoption);
        ClassRegistry::flush();
    }

    function testFileColumns() {
        $count = count($this->Adoption->getColumnTypes());
        $this->assertTrue($count -7 == count($this->Adoption->file_columns));
    }

}

?>