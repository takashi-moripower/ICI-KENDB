<?php

/* User Test cases generated on: 2010-10-01 20:10:38 : 1285980818 */
App::import('Model', 'User');

require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class UserTestCase extends KendbTestCase
{

    var $fixtures = array('app.user', 'app.role');

    function startTest()
    {
        $this->User = & ClassRegistry::init('User');
    }

    function endTest()
    {
        unset($this->User);
        ClassRegistry::flush();
    }

    function testStore()
    {
        $result = User::store(null);
        $this->assertFalse($result);
    }

}

?>