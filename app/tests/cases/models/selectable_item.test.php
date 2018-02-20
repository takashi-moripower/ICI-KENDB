<?php

/* SelectableItem Test cases generated on: 2010-10-20 08:10:51 : 1287532251 */
App::import('Model', 'SelectableItem');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class SelectableItemTestCase extends KendbTestCase
{

    var $fixtures = array('app.selectable_item');

    function startTest()
    {
        $this->SelectableItem = & ClassRegistry::init('SelectableItem');
    }

    function testMakeRealValueList()
    {
        $m = "Entrust";
        $l = "area_of_research";
        $rec = $this->SelectableItem->makeRealValueList($m, $l);
        $this->assertTrue(count($rec) == 3);
        $this->assertTrue($rec["Item1-1-1"] == "Item1-1-1");
        $this->assertTrue($rec["Item1-1-2"] == "Item1-1-2");
        // 順番の確認
        $this->assertTrue(array_shift($rec) == "");
        $this->assertTrue(array_shift($rec) == "Item1-1-2");
        $this->assertTrue(array_shift($rec) == "Item1-1-1");

        $m = "Category_non";
        $l = "List_non";
        $rec = $this->SelectableItem->makeRealValueList($m, $l);
        $this->assertTrue(count($rec) == 1);
        $this->assertTrue(array_shift($rec) == "");
    }

    function endTest()
    {
        unset($this->SelectableItem);
        ClassRegistry::flush();
    }

}

?>