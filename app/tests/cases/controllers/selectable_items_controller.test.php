<?php

/* SelectableItems Test cases generated on: 2010-10-20 09:10:01 : 1287535321 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");
App::import('Model', 'SelectableItem');

class SelectableItemsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.selectable_item', 'app.user');
    var $dropTables = false;

    function startTest() {
        $this->SelectableItems = & new TestSelectableItemsController();
        $this->SelectableItems->constructClasses();
    }

    function endTest() {
        unset($this->SelectableItems);
        ClassRegistry::flush();
    }

    function testIndex() {
        
    }

    /**
     * 選択肢の追加(正常系)
     */
    function testAdd() {
        $this->SelectableItem = new SelectableItem();
        $this->SelectableItem->useDbConfig = 'test';

        // 管理者でログイン
        $this->login($this->SelectableItems, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_selectable_items/add/Entrust/area_of_research";
        $data = array(
            "SelectableItem" => array(
                "category" => "Entrust",
                "list_name" => 'area_of_research',
                "name" => "hogehoge",
                "sort_order" => "1",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . __('The selectable item has been saved', true) . "/", $result);

        $rec = $this->SelectableItem->findAllByCategoryAndListNameAndName(
            "Entrust", "area_of_research", "hogehoge");
        $this->assertTrue(count($rec) == 1);
        
    }

    /**
     * 選択肢の追加(URLにカテゴリ名が含まれていなくてもPOSTされればOK)
     */
    function testAddWithNoCategoryAndListNameInURL() {
        $this->SelectableItem = new SelectableItem();
        $this->SelectableItem->useDbConfig = 'test';

        // 管理者でログイン
        $this->login($this->SelectableItems, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_selectable_items/add";
        $data = array(
            "SelectableItem" => array(
                "category" => "Entrust",
                "list_name" => 'area_of_research',
                "name" => "hogehoge",
                "sort_order" => "1",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . __('The selectable item has been saved', true) . "/", $result);

        $rec = $this->SelectableItem->findAllByCategoryAndListNameAndName(
            "Entrust", "area_of_research", "hogehoge");
        $this->assertTrue(count($rec) == 1);

    }

    /**
     * 選択肢の追加(既に存在する名前は追加できない)
     */
    function testAddWithSameItem() {
        $this->SelectableItem = new SelectableItem();
        $this->SelectableItem->useDbConfig = 'test';
        $org_count = $this->SelectableItem->find('count');

        // 管理者でログイン
        $this->login($this->SelectableItems, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_selectable_items/add/Entrust/area_of_research";
        $data = array(
            "SelectableItem" => array(
                "category" => "Entrust",
                "list_name" => 'area_of_research',
                "name" => "Item1-1-1",
                "sort_order" => "1",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));

        // 件数が変わっていないかチェック
        $new_count = $this->SelectableItem->find('count');
        if($this->assertEqual($org_count, $new_count));

        // エラーメッセージが表示されるか
        $this->assertPattern("/" . __('The selectable item could not be saved. Please, try again.', true) . "/", $result);

        $rec = $this->SelectableItem->findAllByCategoryAndListNameAndName(
            "Entrust", "area_of_research", "Item1-1-1");
        $this->assertTrue(count($rec) == 1);

    }

    /**
     * 選択肢編集のテスト(正常系)
     */
    function testEdit() {
        $this->SelectableItem = new SelectableItem();
        $this->SelectableItem->useDbConfig = 'test';
        $org_count = $this->SelectableItem->find('count');

        // 管理者でログイン
        $this->login($this->SelectableItems, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_selectable_items/edit/1";
        $data = array(
            "SelectableItem" => array(
                "id" => 1,
                "category" => "Entrust",
                "list_name" => 'area_of_research',
                "name" => "hogehoge",
                "sort_order" => "1",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . __('The selectable item has been saved', true) . "/", $result);

        $new_count = $this->SelectableItem->find('count');
        $this->assertEqual($org_count, $new_count);

        $rec2 = $this->SelectableItem->read(null, 1);
        $this->assertEqual("hogehoge", $rec2["SelectableItem"]["name"]);
    }

    /**
     * 選択肢編集のテスト(既に存在する項目と同名には変更できない)
     */
    function testEditWithSameValue() {
        $this->SelectableItem = new SelectableItem();
        $this->SelectableItem->useDbConfig = 'test';
        $org_count = $this->SelectableItem->find('count');

        // 管理者でログイン
        $this->login($this->SelectableItems, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_selectable_items/edit/1";
        $data = array(
            "SelectableItem" => array(
                "id" => 1,
                "category" => "Entrust",
                "list_name" => 'area_of_research',
                "name" => "Item1-1-2",
                "sort_order" => "1",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . __('The selectable item could not be saved. Please, try again.', true) . "/", $result);

        $new_count = $this->SelectableItem->find('count');
        $this->assertEqual($org_count, $new_count);

        $rec2 = $this->SelectableItem->read(null, 1);
        $this->assertEqual("Item1-1-1", $rec2["SelectableItem"]["name"]);
    }

    /**
     * 選択肢削除のテスト
     */
    function testDelete() {
        $this->SelectableItem = new SelectableItem();
        $this->SelectableItem->useDbConfig = 'test';
        $org_count = $this->SelectableItem->find('count');

        // 管理者でログイン
        $this->login($this->SelectableItems, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_selectable_items/delete/1";
        $result = $this->testAction($url,
                array('method' => 'get'));

        // DB登録チェック
        $rec2 = $this->SelectableItem->findById(1);
        $this->assertFalse($rec2);
        // 件数チェック
        $new_count = $this->SelectableItem->find('count');
        $this->assertEqual($org_count -1, $new_count);
    }

    /**
     * 選択肢削除のテスト(IDを指定しない場合は失敗する)
     */
    function testDeleteWithNoId() {

        // 管理者でログイン
        $this->login($this->SelectableItems, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_selectable_items/delete/";
        $result = $this->testAction($url,
                array('method' => 'get'));
        // error404にリダイレクトされるはずなので本文はなし
        $this->assertEqual($result, null);
    }

    /**
     * 選択肢削除のテスト(IDが存在しない場合は失敗する)
     */
    function testDeleteWithNoExistanceId() {

        // 管理者でログイン
        $this->login($this->SelectableItems, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_selectable_items/delete/65535";
        $result = $this->testAction($url,
                array('method' => 'get'));
        // error404にリダイレクトされるはずなので本文はなし
        $this->assertEqual($result, null);
    }

}

?>
