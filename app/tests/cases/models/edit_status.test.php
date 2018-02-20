<?php

/* EditStatus Test cases generated on: 2010-10-22 08:10:46 : 1287704626 */
App::import('Model', 'EditStatus');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class EditStatusTestCase extends KendbTestCase {

    var $fixtures = array('app.edit_status', 'app.user', 'app.role');
	var $dropTables = false;
    /**
     * 編集状況
     * @var EditStatus
     */
    var $EditStatus;

    function startTest() {
        $this->EditStatus = & ClassRegistry::init('EditStatus');
        $this->EditStatus->useDbConfig = 'test';
    }

    function endTest() {
        unset($this->EditStatus);
        ClassRegistry::flush();
    }

    /**
     * 現在編集中の一覧
     */
    function testGetCurrentEditingList() {
        $list = $this->EditStatus->getCurrentEditingIdList("model1");
        $this->assertTrue(count($list) == 2);
        $list = $this->EditStatus->getCurrentEditingIdList("model2");
        $this->assertTrue(count($list) == 1);
        $list = $this->EditStatus->getCurrentEditingIdList("model_nonexist");
        $this->assertTrue(count($list) == 0);
    }

    /**
     * 編集中レコードの削除
     */
    function testDeleteStatus() { return;
        $this->EditStatus->deleteStatus("model1", 1, 1);
        $list = $this->EditStatus->getCurrentEditingIdList("model1");
        $this->assertTrue(count($list) == 1);
        $this->EditStatus->deleteStatus("model1", 1, 2);
        $list = $this->EditStatus->getCurrentEditingIdList("model1");
        $this->assertTrue(count($list) == 0);
    }

    /**
     * 現在編集中かどうか
     */
    function testCurrentEditing() {
        $modelname = "model1";
        $dataid = 1;
        $rec = $this->EditStatus->isCurrentEditing($modelname, $dataid);
        $this->assertTrue($rec);
        $modelname = "model_nonexistent";
        $dataid = 9999;
        $rec = $this->EditStatus->isCurrentEditing($modelname, $dataid);
        $this->assertFalse($rec);
    }

    function testDeleteAll() {
        $this->assertFalse($this->EditStatus->find('count') == 0);
        $this->EditStatus->deleteAllStatus();
        $this->assertTrue($this->EditStatus->find('count') == 0);
    }

}

?>
