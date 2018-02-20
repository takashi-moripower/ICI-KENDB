<?php

/* Entrust Test cases generated on: 2010-10-08 01:10:15 : 1286515755 */
App::import('Model', 'Entrust');
App::import('Model', 'User');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class EntrustTestCase extends KendbTestCase {
    var $fixtures = array('app.entrust', 'app.user');
    var $Entrust;
    var $User;

    function startTest() {
        $this->Entrust = & ClassRegistry::init('Entrust');
        $this->User = & ClassRegistry::init('User');
    }

    function endTest() {
        unset($this->Entrust);
        ClassRegistry::flush();
    }

    /**
     * 保存前の書き換えテスト
     */
    function testBeforeSave() {
        $displayname = "test_operator";
        $rec = $this->User->read(null, 1);
        User::store($rec);

        $rec = $this->Entrust->findById(1);
        $initial_creator = $rec["Entrust"]["created_by"];
        $initial_updated = $rec["Entrust"]["updated"];
        $rec["Entrust"]["ow_email"] = "test@example.jp";
        // このデータは自動書き換えさせるため無効にする
        unset($rec["Entrust"]["created"]);
        unset($rec["Entrust"]["updated"]);
        $result = $this->Entrust->beforeSave($rec);
        $this->assertTrue($result);

        $result = $this->Entrust->save($rec);
        if (!$result) {
            var_dump($this->Entrust->validationErrors);
        }
        $this->assertTrue($result);

        $rec = $this->Entrust->findById(1);
        $result = ($displayname == $rec["Entrust"]["updated_by"]);
        if (!$result) {
            var_dump($rec);
        }
        $this->assertTrue($result);
        $this->assertTrue($rec["Entrust"]["created_by"] == $initial_creator);
        var_dump($initial_updated);
        var_dump($rec["Entrust"]["updated"]);
        $this->assertTrue($rec["Entrust"]["updated"] != $initial_updated);
    }

    function testBeforeSaveWithExcelRef() {
        $displayname = "test_operator";
        $rec = $this->User->read(null, 1);
        User::store($rec);

        $rec = $this->Entrust->findById(1);
        $rec["Entrust"]["researcher_name"] = "#REF!";
        $result = $this->Entrust->save($rec);
        if (!$result) {
            $errors = $this->Entrust->validationErrors;
        }
        $this->assertFalse($result);
        $this->assertPattern("/Excel/", $errors["researcher_name"]);

        $rec["Entrust"]["researcher_name"] = "=Test";
        $result = $this->Entrust->save($rec);
        if (!$result) {
            $errors = $this->Entrust->validationErrors;
        }
        $this->assertFalse($result);
        $this->assertPattern("/先頭文字/", $errors["researcher_name"]);
    }

    function testBeforeSaveOnCreate() {
        $displayname = "test_operator";
        $rec = $this->User->read(null, 1);
        User::store($rec);

        $this->Entrust->create();
        $this->data["Entrust"]["year"] = date('Y');
        $this->data["Entrust"]["project_code"] = "AAAAA";
        $this->assertTrue($this->Entrust->save($this->data));
        $rec = $this->Entrust->findByYearAndProjectCode(date('Y'), "AAAAA");
        if (!$rec) {
            var_dump($rec);
        }
        $this->assertTrue($displayname == $rec["Entrust"]["created_by"]);
    }

    function testFileColumns() {
        $count = count($this->Entrust->getColumnTypes());
        $this->assertTrue($count -7 == count($this->Entrust->file_columns));
    }


}

?>
