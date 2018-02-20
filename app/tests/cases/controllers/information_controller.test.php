<?php

/* Information Test cases generated on: 2011-01-06 16:01:48 : 1294299768 */
App::import('Controller', 'Information');
App::import('Model', 'Information');

require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class InformationControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.information', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

    function startTest() {
        $this->Information = & new TestInformationController();
        $this->Information->constructClasses();
    }

    function endTest() {
        unset($this->Information);
        ClassRegistry::flush();
    }

    /**
     * お知らせの追加テスト(正常系)
     */
    function testAdd() {
        $this->ModelInformation = new Information();
        $this->ModelInformation->useDbConfig = "test";
        // 管理者でログイン
        $this->login($this->Information, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_information/add";
        $data = array(
            "Information" => array(
                "name" => "テストタイトル",
                "description" => 'お知らせ本文',
                "startdate" => array('year' => date('Y'), 'month' => date('m'), 'day' => date('d')),
                "startdate" => array('year' => date('Y'), 'month' => date('m'), 'day' => date('d')),
                "disabled" => 0,
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . sprintf(__('The %s has been saved', true), __('Information', true)) . "/", $result);

        // 本当にデータが入っているか検証する
        $rec = $this->ModelInformation->findAllByName("テストタイトル");
        foreach ($rec as $item) {
            $this->assertEqual("テストタイトル", $item["Information"]["name"]);
            $this->assertEqual("お知らせ本文", $item["Information"]["description"]);
            $this->assertEqual(0, $item["Information"]["disabled"]);
        }
    }

    /**
     * お知らせの追加テスト(正常系)
     */
    function testAddWithEmptyField() {
        $this->ModelInformation = new Information();
        $this->ModelInformation->useDbConfig = "test";
        // 管理者でログイン
        $this->login($this->Information, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_information/add";
        $data = array(
            "Information" => array(
                "name" => "",
                "description" => '',
                "startdate" => array('year' => date('Y'), 'month' => date('m'), 'day' => date('d')),
                "startdate" => array('year' => date('Y'), 'month' => date('m'), 'day' => date('d')),
                "disabled" => 0,
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . sprintf(__('The %s could not be saved. Please, try again.', true), __('Information', true)) . "/", $result);

        // 本当にデータが入っているか検証する
        $rec = $this->ModelInformation->findAllByName("テストタイトル");
        $this->assertFalse($rec);
    }

    /**
     * お知らせ編集のテスト(正常系)
     */
    function testEdit() {
        $this->ModelInformation = new Information();
        $this->ModelInformation->useDbConfig = "test";
        $org_count = $this->ModelInformation->find('count');

        // 管理者でログイン
        $this->login($this->Information, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_information/edit/1";
        $data = array(
            "Information" => array(
                "id" => 1,
                "name" => "foo",
                "description" => 'bar',
                "startdate" => array('year' => date('Y'), 'month' => date('m'), 'day' => date('d')),
                "startdate" => array('year' => date('Y'), 'month' => date('m'), 'day' => date('d')),
                "disabled" => 0,
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . sprintf(__('The %s has been saved', true), __('Information', true)) . "/", $result);

        // 本当にデータが入っているか検証する
        $rec = $this->ModelInformation->findAllByName("foo");
        foreach ($rec as $item) {
            $this->assertEqual("foo", $item["Information"]["name"]);
            $this->assertEqual("bar", $item["Information"]["description"]);
            $this->assertEqual(0, $item["Information"]["disabled"]);
        }
        $new_count = $this->ModelInformation->find('count');
        $this->assertEqual($org_count, $new_count);

    }

    /**
     * お知らせの削除のテスト
     */
    function testDelete() {
        // 元のユーザー情報取得
        $this->ModelInformation = new Information();
        $this->ModelInformation->useDbConfig = "test";
        $org_count = $this->ModelInformation->find('count');

        // 管理者でログイン
        $this->login($this->Information, 1, "test_user");
        // 削除
        $url = "/test_information/delete/1";
        $result = $this->testAction($url,
                array('method' => 'get'));

        $rec2 = $this->ModelInformation->read(null, 1);
        $this->assertTrue($rec2 == false);
        $new_count = $this->ModelInformation->find('count');
        $this->assertTrue($org_count - 1 == $new_count);

    }

    /**
     * お知らせ一覧表示のテスト
     */
    function testIndex() {
        // 管理者でログイン
        $this->login($this->Information, 1, "test_user");
        // 閲覧
        $url = "/test_information/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
        $this->assertPattern("/". preg_quote(__("name", true)) . "/", $result);
        $this->assertPattern("/". preg_quote(__("description", true)) . "/", $result);
        $this->assertPattern("/". preg_quote(__("disabled", true)) . "/", $result);
        $this->assertPattern("/". preg_quote(__("startdate", true)) . "/", $result);
        $this->assertPattern("/". preg_quote(__("enddate", true)) . "/", $result);
        $this->assertPattern("/<table id=\"flexme\">/", $result);
    }

    /**
     * お知らせの閲覧テスト
     */
    function testView() {
        // 管理者でログイン
        $this->login($this->Information, 1, "test_user");
        // 閲覧
        $url = "/test_information/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
        $this->assertPattern("/お知らせテストタイトル/", $result);
        $this->assertPattern("/これはお知らせテストです/", $result);

        $url = "/test_information/view/65535";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
        $pattern = sprintf(__('Invalid %s', true), __('Information', true));
        
        $this->assertPattern("/".$pattern."/", $result);
    }

}

?>