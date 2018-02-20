<?php

/* OtherResearchGrant Test cases generated on: 2010-12-29 17:12:23 : 1293610403 */
App::import('Model', 'OtherResearchGrant');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class OtherResearchGrantTestCase extends KendbTestCase
{

    var $fixtures = array('app.other_research_grant');

    function startTest()
    {
        $this->OtherResearchGrant = & ClassRegistry::init('OtherResearchGrant');
    }

    function endTest()
    {
        unset($this->OtherResearchGrant);
        ClassRegistry::flush();
    }

    function testFileColumns()
    {
        $count = count($this->OtherResearchGrant->getColumnTypes());
        $this->assertTrue(
            $count - 7 == count($this->OtherResearchGrant->file_columns),
            "properly count=" . ($count - 7) . " actual count=" . count($this->OtherResearchGrant->file_columns)
        );
    }

}

?>