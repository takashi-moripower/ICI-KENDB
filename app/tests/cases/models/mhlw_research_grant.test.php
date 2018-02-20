<?php

/* MhlwResearchGrant Test cases generated on: 2010-12-30 07:12:09 : 1293660009 */
App::import('Model', 'MhlwResearchGrant');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class MhlwResearchGrantTestCase extends KendbTestCase {

    var $fixtures = array('app.mhlw_research_grant');
    var $dropTables = false;

    function startTest() {
        $this->MhlwResearchGrant = & ClassRegistry::init('MhlwResearchGrant');
    }

    function endTest() {
        unset($this->MhlwResearchGrant);
        ClassRegistry::flush();
    }

    function testFileColumns() {
        $count = count($this->MhlwResearchGrant->getColumnTypes());
        $this->assertTrue($count -7 == count($this->MhlwResearchGrant->file_columns));
    }


}

?>