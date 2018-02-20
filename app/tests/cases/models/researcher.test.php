<?php

/* Researcher Test cases generated on: 2010-10-04 03:10:39 : 1286178939 */
App::import('Model', 'Researcher');
App::import('Model', 'Entrust');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class ResearcherTestCase extends KendbTestCase
{

    var $fixtures = array('app.researcher', 'app.entrust');
    var $useDBConfig = 'test';

    function startTest()
    {
        $this->Researcher = & ClassRegistry::init('Researcher');
        $this->Entrust = & ClassRegistry::init('Entrust');
    }

    function testCooperateNo()
    {
        $data = "1000000";
        $this->assertTrue($this->Researcher->alphaNumericHyphen($data));
        $data = "1000000-Z";
        $this->assertTrue($this->Researcher->alphaNumericHyphen($data));
        $data = "1000000-/#!";
        $this->assertFalse($this->Researcher->alphaNumericHyphen($data));

        // 配列
        $data = array();
        $data["hoge"] = "1000000";
        $this->assertTrue($this->Researcher->alphaNumericHyphen($data));
        $data["hoge"] = "1000000-Z";
        $this->assertTrue($this->Researcher->alphaNumericHyphen($data));
        $data["hoge"] = "1000000-/#!";
        $this->assertFalse($this->Researcher->alphaNumericHyphen($data));
    }

    function testRollback()
    {
        $c = $this->Researcher->find('count');
        $this->Researcher->begin();
        $data["Researcher"]["cooperate_no"] = "1234";
        $data["Researcher"]["personal_no"] = "1234";
        $data["Researcher"]["researcher_no"] = "12345678";
        $data["Researcher"]["researcher_name"] = "研究者名";
        $data["Researcher"]["kana"] = "ケンキュウシャメイ";
        $this->Researcher->create();
        $this->assertTrue($this->Researcher->save($data));
        $this->assertTrue($this->Researcher->find('count') == $c + 1);
        $this->Researcher->rollback();
        $this->assertTrue($this->Researcher->find('count') == $c);
    }

    function testCommit()
    {
        $c = $this->Researcher->find('count');
        $this->Researcher->begin();
        $data["Researcher"]["cooperate_no"] = "1234";
        $data["Researcher"]["personal_no"] = "1234";
        $data["Researcher"]["researcher_no"] = "12345678";
        $data["Researcher"]["researcher_name"] = "研究者名";
        $data["Researcher"]["kana"] = "ケンキュウシャメイ";
        $this->Researcher->create();
        $this->assertTrue($this->Researcher->save($data));
        $this->assertTrue($this->Researcher->find('count') == $c + 1);
        $this->Researcher->commit();
        $this->assertTrue($this->Researcher->find('count') == $c + 1);
    }

    function testSwitchPrimaryKey()
    {
        $this->Researcher->switchPrimaryKey();
        // これで研究者番号がキーのはず
        $rec = $this->Researcher->read(null, "88888888");
        $this->assertTrue($rec);

        $this->Researcher->switchPrimaryKey();
        $this->assertTrue($this->Researcher->primaryKey ==="researcher_no");
    }

    function testUpdateResearcherInfo()
    {
        $entrust = $this->Entrust->read(null, 1);
        $entrust_save = $entrust;
        $result = $this->Researcher->updateResearcherInfo($entrust, "Entrust", null);
        $this->assertTrue($result);
        // 特定のフィールドは書き換え対象となる
        $this->assertTrue($entrust["Entrust"]["researcher_name"] == "漢字の名前");
        $this->assertTrue($entrust["Entrust"]["department"] == "テスト部");
        $this->assertTrue($entrust["Entrust"]["major_name"] != $entrust_save["Entrust"]["major_name"]);
        $this->assertTrue($entrust["Entrust"]["post_no"] != $entrust_save["Entrust"]["post_no"]);
        $this->assertTrue($entrust["Entrust"]["email"] != $entrust_save["Entrust"]["email"]);
        // 特定のフィールドは書き換えない
        $this->assertTrue($entrust["Entrust"]["created"] == $entrust_save["Entrust"]["created"]);
        $this->assertTrue($entrust["Entrust"]["updated"] == $entrust_save["Entrust"]["updated"]);
    }

    function testUpdateResearcherInfoNoTarget()
    {
        $this->Researcher->deleteAll("1=1");
        $entrust = $this->Entrust->read(null, 1);
        $entrust_save = $entrust;
        $result = $this->Researcher->updateResearcherInfo($entrust, "Entrust", null);
        $this->assertFalse($result);
    }

    function endTest()
    {
        unset($this->Researcher);
        unset($this->Entrust);
        ClassRegistry::flush();
    }

}

?>
