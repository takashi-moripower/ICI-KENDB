<?php

/* Project Test cases generated on: 2010-12-28 18:12:06 : 1293528366 */
App::import('Model', 'Project');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class ProjectTestCase extends KendbTestCase
{

    var $fixtures = array('app.project');
    var $dropTables = false;

    function startTest()
    {
        $this->Project = & ClassRegistry::init('Project');
    }

    function endTest()
    {
        unset($this->Project);
        ClassRegistry::flush();
    }

    /**
     * プライマリーキーの切り替え
     */
    function testSwitchPrimaryKey() {
        $this->Project->switchPrimaryKey();
        $this->assertEqual($this->Project->primaryKey, "project_code");
    }

}

?>