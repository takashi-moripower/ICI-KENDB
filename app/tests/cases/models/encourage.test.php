<?php

/* Encourage Test cases generated on: 2010-12-09 19:12:33 : 1291889553 */
App::import('Model', 'Encourage');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class EncourageTestCase extends KendbTestCase
{
    var $fixtures = array('app.encourage');

    function startTest()
    {
        $this->Encourage = & ClassRegistry::init('Encourage');
    }

    function endTest()
    {
        unset($this->Encourage);
        ClassRegistry::flush();
    }

    function testFileColumns()
    {
        $count = count($this->Encourage->getColumnTypes());
        $this->assertTrue($count - 7 == count($this->Encourage->file_columns));
    }

}

?>