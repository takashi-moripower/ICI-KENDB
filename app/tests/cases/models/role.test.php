<?php

/* Role Test cases generated on: 2010-11-26 10:11:24 : 1290735804 */
App::import('Model', 'Role');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class RoleTestCase extends KendbTestCase
{

    var $fixtures = array('app.role', 'app.user');

    function startTest()
    {
        $this->Role = & ClassRegistry::init('Role');
    }

    function endTest()
    {
        unset($this->Role);
        ClassRegistry::flush();
    }

}

?>