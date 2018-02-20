<?php

App::import('Model', 'NedoJstOther');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class App2TestCase extends KendbTestCase
{

    var $fixtures = array('app.nedo_jst_other2', 'app.summary');

    function startTest()
    {
        $this->NedoJstOther = & ClassRegistry::init('NedoJstOther');
        $this->NedoJstOtherTest = & ClassRegistry::init('NedoJstOtherTest');
        $this->Summary = & ClassRegistry::init('Summary');
        $this->History = & ClassRegistry::init('History');
    }

    function endTest()
    {
        unset($this->NedoJstOther);
        unset($this->NedoJstOtherTest);
        unset($this->Summary);
        unset($this->History);
        ClassRegistry::flush();
    }

	/**
	 * 同じ親を持つノードが自分以外にいるかどうかのテスト
	 */
    function testHasSameParentNode() 
    {
        $this->assertFalse($this->NedoJstOther->hasSameParentNode(null));
        $this->assertFalse($this->NedoJstOther->hasSameParentNode(999));
        $this->assertFalse($this->NedoJstOther->hasSameParentNode(1)); // 親
        $this->assertFalse($this->NedoJstOther->hasSameParentNode(2)); // 1が親で2が子。兄弟なし 
        $this->assertTrue($this->NedoJstOther->hasSameParentNode(4)); // 3が親で4と5が子
        $this->assertTrue($this->NedoJstOther->hasSameParentNode(5)); // 3が親で4と5が子
        $this->assertFalse($this->NedoJstOther->hasSameParentNode(7)); // 6が親で7と8が子.ただし8は削除レコード
        $this->assertFalse($this->NedoJstOther->hasSameParentNode(10)); // 9が親で10と11が子.ただし9,10とも削除レコード
    }

	/**
	 * 親から見て子が１つであるかどうかのテスト
	 */
    function testIsSingleChild()
    {
        $this->assertFalse($this->NedoJstOther->isSingleChild(null));
        $this->assertFalse($this->NedoJstOther->isSingleChild(999));
        $this->assertTrue($this->NedoJstOther->isSingleChild(1)); // 1が親で子が2
        $this->assertFalse($this->NedoJstOther->isSingleChild(2)); // 子で呼び出し
        $this->assertFalse($this->NedoJstOther->isSingleChild(3)); // 3が親で子が4,5
        $this->assertTrue($this->NedoJstOther->isSingleChild(6)); // 6が親で子が7,8.ただし8が削除済み
        $this->assertFalse($this->NedoJstOther->isSingleChild(9)); // 9が親で子が10,11.ただし10,11が削除済み
    }

	/**
	 * データテーブルのIDの利用可能な最小の値を取得する
	 */
	function testGetAvailableMinimumId()
	{
		$data["NedoJstOtherTest"]["id"] = 5000;
		$this->NedoJstOtherTest->save($data);
		$this->assertTrue($this->NedoJstOther->getAvailableMinimumId(), 5001);

		$data["NedoJstOtherTest"]["id"] = 5001;
		$data["NedoJstOtherTest"]["disabled"] = true;
		$this->NedoJstOtherTest->save($data);
		$this->assertTrue($this->NedoJstOther->getAvailableMinimumId(), 5002);

		$this->NedoJstOtherTest->query("TRUNCATE TABLE `" . $this->NedoJstOtherTest->useTable . "`");
		$this->assertTrue($this->NedoJstOther->getAvailableMinimumId(), 1);
	}

	function testDeleteByYear()
	{
		$this->NedoJstOtherTest->query("TRUNCATE TABLE `" . $this->NedoJstOtherTest->useTable . "`");
		$this->Summary->query("TRUNCATE TABLE `" . $this->Summary->useTable . "`");
		$this->History->query("TRUNCATE TABLE `" . $this->History->useTable . "`");

		// 新規データ作成
		$data["NedoJstOtherTest"]["id"] = 5000;
		$data["NedoJstOtherTest"]["year"] = 2011;
		$this->NedoJstOtherTest->save($data);
		$data["NedoJstOtherTest"]["id"] = 5001;
		$data["NedoJstOtherTest"]["year"] = 2011;
		$this->NedoJstOtherTest->save($data);

		// 編集データ作成
		$data["History"]["model_id"] = 5000;
		$data["History"]["model_name"] = "NedoJstOthers";
		$data["History"]["archivedata"] = "test";
		$this->History->save($data);

		$this->assertTrue($this->NedoJstOther->find('count') == 2);
		$this->assertTrue($this->Summary->find('count') == 2);
		$this->assertTrue($this->History->find('count') == 1);

		$this->NedoJstOther->deleteByYear(2011);

		$this->assertTrue($this->Summary->find('count') == 0);
		$this->assertTrue($this->NedoJstOtherTest->find('count') == 0);

	}
}

?>
