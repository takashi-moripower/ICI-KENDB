<?php

/* History Test cases generated on: 2010-10-27 18:10:34 : 1288172794 */
App::import('Model', 'History');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class HistoryTestCase extends KendbTestCase
{
    var $fixtures = array('app.history');
    var $dropTables = false;

    function startTest()
    {
        $this->History = & ClassRegistry::init('History');
    }

    function endTest()
    {
        unset($this->History);
        ClassRegistry::flush();
    }

    function testLoadAndSave()
    {
        $model_name = "Entrust";
        $model_id = 2;
        $data = array(
            "Entrust" => array(
                "id" => 1,
                "hoge" => "huga",
            ),
        );
        $data2 = array(
            "Entrust" => array(
                "id" => 999,
                "foo" => "bar",
            ),
        );
        $result = $this->History->saveToHistory($model_name, $model_id, $data);
        $this->assertTrue($result);
        $rec = $this->History->loadFromHistory($model_name, $model_id);
        $this->assertTrue($data == $rec);

        $result = $this->History->saveToHistory($model_name, $model_id, $data2);
        $this->assertTrue($result);
        $rec = $this->History->loadFromHistory($model_name, $model_id);
        $this->assertTrue($data2 == $rec);
        $this->assertFalse($data == $rec);
    }

    function testNonExistentHistory()
    {
        $model_name = "NonExistent";
        $model_id = 9999;
        $rec = $this->History->loadFromHistory($model_name, $model_id);
        $this->assertFalse($rec);
    }

    function testHistoryExists()
    {
        $model_name = "NonExistent";
        $model_id = 9999;
        $rec = $this->History->historyExists($model_name, $model_id);
        $this->assertFalse($rec);

        $model_name = "Existent";
        $model_id = 9999;
        $data = "hoge";
        $result = $this->History->saveToHistory($model_name, $model_id, $data);
        $this->assertTrue($result);
        $rec = $this->History->historyExists($model_name, $model_id);
        $this->assertTrue($rec);

    }

}

?>
