<?php

/* Obligation Test cases generated on: 2010-12-28 18:12:16 : 1293528496 */
App::import('Model', 'Obligation');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class ObligationTestCase extends KendbTestCase
{

    var $fixtures = array('app.obligation');
    var $dropTables = false;

    function startTest()
    {
        $this->Obligation = & ClassRegistry::init('Obligation');
    }

    function endTest()
    {
        unset($this->Obligation);
        ClassRegistry::flush();
    }

}

?>