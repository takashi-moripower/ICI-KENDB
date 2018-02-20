<?php

/* Donation Test cases generated on: 2010-12-09 19:12:20 : 1291889540 */
App::import('Model', 'Donation');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class DonationTestCase extends KendbTestCase
{

    var $fixtures = array('app.donation');
    var $dropTables = false;

    function startTest()
    {
        $this->Donation = & ClassRegistry::init('Donation');
    }

    function endTest()
    {
        unset($this->Donation);
        ClassRegistry::flush();
    }

    function testFileColumns()
    {
        $count = count($this->Donation->getColumnTypes());
        $this->assertTrue($count - 7 == count($this->Donation->file_columns));
    }

}

?>