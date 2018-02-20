<?php

/* Contract Test cases generated on: 2010-11-27 05:11:52 : 1290803572 */
App::import('Model', 'Contract');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class ContractTestCase extends KendbTestCase
{

    var $fixtures = array('app.contract');
    var $dropTables = false;

    function startTest()
    {
        $this->Contract = & ClassRegistry::init('Contract');
    }

    function endTest()
    {
        unset($this->Contract);
        ClassRegistry::flush();
    }

    function testFileColumns()
    {
        $count = count($this->Contract->getColumnTypes());
        $this->assertTrue($count - 7 == count($this->Contract->file_columns));
    }

}

?>