<?php
/* EditStatuses Test cases generated on: 2010-10-22 08:10:52 : 1287704692*/
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class EditStatusesControllerTestCase extends KendbTestCase {
    var $fixtures = array('app.edit_status', 'app.user', 'app.entrusts','app.nedo_jst_others','app.selectable_item');
    var $dropTables = false;

    function startTest() {
        $this->EditStatuses =& new TestEditStatusesController();
        $this->EditStatuses->constructClasses();
        $this->Entrusts =& new TestEntrustsController();
        $this->Entrusts->constructClasses();
        $this->NedoJstOthers =& new TestNedoJstOthersController();
        $this->NedoJstOthers->constructClasses();
        $this->_clearStatus();
    }

    function _check_edit_conflict($controller_var, $checked_string_array) 
    {
        $modelname = Inflector::singularize($controller_var);
        $urlname = Inflector::tableize($modelname);

        $this->login($this->EditStatuses, 1, "test_user");
        $this->login($this->$controller_var, 1, "test_user");
        // ロックかける
        $result = $this->testAction("/test_edit_statuses/start/".$modelname."/1", array('method' => 'get', 'return' => 'contents'));
        $this->assertPattern("/true/", $result);
        // 編集画面
        $result = $this->testAction("/test_".$urlname."/edit/1", array('method' => 'get', 'return' => 'contents'));
        $this->assertPattern("/このデータはtest_operatorさんによって/", $result);
        $this->assertPattern("/編集中です/", $result);
   
        // ロック解除
        $result = $this->testAction("/test_edit_statuses/finish/".$modelname."/1", array('method' => 'get', 'return' => 'contents'));
        $this->assertPattern("/true/", $result);

        // 編集画面
        $result = $this->testAction("/test_".$urlname."/edit/1", array('method' => 'get', 'return' => 'contents'));
        foreach ($checked_string_array as $str) {
            $this->assertPattern("/".$str."/", $result);
        }
    }

    function testEditConflictEntrust()
    {
        $check = array('事業所データ','システムデータ','備考');
        $this->_check_edit_conflict("Entrusts", $check);
    }


    function testEditConflictNedoJstOther()
    {
        $check = array('システムデータ','備考');
        $this->_check_edit_conflict("NedoJstOthers", $check);
    }

    function _clearStatus() {
	App::import('Model', 'EditStatus');
	$this->EditStatus = new EditStatus();
	$this->EditStatus->deleteAll("1=1");
    }

    function endTest() {
        $this->_clearStatus();
        unset($this->EditStatuses);
        ClassRegistry::flush();
    }
}
?>
