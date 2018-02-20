<?php

/* Users Test cases generated on: 2010-10-01 20:10:34 : 1285980874 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

App::import('Model', 'User');
App::import('Component', 'Auth');

class UsersControllerTestCase extends KendbTestCase
{

    var $fixtures = array('app.user', 'app.information');
    var $dropTables = false;

    function startTest()
    {
        $this->Users = & new TestUsersController();
        $this->Users->constructClasses();
    }

    function endTest()
    {
        unset($this->Users);
        ClassRegistry::flush();
    }

    /**
     * 管理者画面でのユーザー閲覧
     */
    function testAdminView()
    {
        Configure::write('cache.disabled', true);

        // 元のユーザー情報取得
        $this->User = new User();
        $this->User->useDbConfig = "test";
        $rec = $this->User->read(null, 2);

        // 管理者でログイン
        $this->login($this->Users, 1, "test_user");
        // 閲覧
        $url = "/admin/test_users/view/2";
        $result = $this->testAction($url,
                array('return' => 'content', 'method' => 'get'));

        foreach ($rec["User"] as $k => $v) {

            // 値が表示されているか。但しパスワードは*****になっていること
            if ($k == "role_id") {
                continue;
            }
            // キーの日本語名が表示されているか
            $this->assertPattern("/" . preg_quote(__(Inflector::humanize($k), true)) . "/", $result);

            if ($k != "password") {
                $this->assertPattern("/" . preg_quote($v) . "/", $result);
            } else {
                $this->assertPattern("/" . preg_quote("*****") . "/", $result);
            }
        }
    }

    /**
     * 管理者によってユーザーを削除する。ユーザーを削除した場合はDBからも消去する
     */
    function testAdminDelete()
    {
        Configure::write('cache.disabled', true);

        // 元のユーザー情報取得
        $this->User = new User();
        $this->User->useDbConfig = "test";
        $rec = $this->User->read(null, 2);

        // 管理者でログイン
        $this->login($this->Users, 1, "test_user");
        // 削除
        $url = "/admin/test_users/delete/2";
        $result = $this->testAction($url,
                array('method' => 'get'));

        $rec2 = $this->User->read(null, 2);
        $this->assertTrue($rec2 == false);
    }

    /**
     * 管理者によってユーザーを追加する
     */
    function testAdminAdd()
    {
        Configure::write('cache.disabled', true);

        $this->User = new User();
        $this->User->useDbConfig = "test";
        // 管理者でログイン
        $this->login($this->Users, 1, "test_user");
        // 編集画面へ行く
        $url = "/admin/test_users/add";
        $data = array(
            "User" => array(
                "username" => "notexist",
                "displayname" => 'not_exist',
                "new_password" => "foobar",
                "email" => "nobody@gmail.com",
                "dateformat" => 0,
                "grid_type" => 0,
                "role_id" => 2,
                "disabled" => 0,
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . __('The user has been saved', true) . "/", $result);

        $rec2 = $this->User->findByUsername("notexist");
        $this->assertEqual($rec2["User"]["username"], "notexist");
        $this->assertEqual($rec2["User"]["displayname"], "not_exist");
        $this->assertEqual($rec2["User"]["password"], AuthComponent::password("foobar"));
    }

    /**
     * 管理者によってユーザーを追加する
     */
    function testAdminAddWithEmptyField()
    {
        Configure::write('cache.disabled', true);

        $this->User = new User();
        $this->User->useDbConfig = "test";
        // 管理者でログイン
        $this->login($this->Users, 1, "test_user");
        // 編集画面へ行く
        $url = "/admin/test_users/add";
        $data = array(
            "User" => array(
                "username" => "notexist",
                "new_password" => "",
                "displayname" => 'not_exist',
                "email" => "nobody@gmail.com",
                "dateformat" => 0,
                "grid_type" => 0,
                "role_id" => 2,
                "disabled" => 0,
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));

        $this->assertPattern("/" . __('The user could not be saved. Please, try again.', true) . "/", $result);

        $rec2 = $this->User->findByUsername("notexist");
        $this->assertTrue($rec2 == false);
    }

    /**
     * ユーザー情報の編集
     */
    function testEdit()
    {
        Configure::write('cache.disabled', true);

        // 元のユーザー情報取得
        $this->User = new User();
        $this->User->useDbConfig = "test";
        $rec = $this->User->read(null, 1);

        $this->login($this->Users, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_users/edit/1";
        $data = array(
            "User" => array(
                "username" => "foobar",
                "displayname" => 'foobar',
                "id" => 1,
                "new_password" => "bar1234567",
                "email" => "example@gmail.com",
                "dateformat" => 0,
                "grid_type" => 0,
                "role_id" => 1,
                "disabled" => 0,
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/ユーザー情報を保存しました/", $result);

        $rec2 = $this->User->read(null, 1);
        $this->assertNotEqual($rec["User"]["password"], $rec2["User"]["password"]);
        $expected_password = AuthComponent::password("bar1234567");
        $this->assertEqual($rec2["User"]["password"], $expected_password);
    }

    /**
     * パスワードが空白のまま更新した場合はパスワードが変わらないことを確認
     */
    function testEditWithEmptyPassword()
    {
        Configure::write('cache.disabled', true);

        // 元のユーザー情報取得
        $this->User = new User();
        $this->User->useDbConfig = "test";
        $rec = $this->User->read(null, 1);

        $this->login($this->Users, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_users/edit/1";
        $data = array(
            "User" => array(
                "username" => "foobar",
                "displayname" => 'foobar',
                "id" => 1,
                "new_password" => "",
                "email" => "example@gmail.com",
                "dateformat" => 0,
                "grid_type" => 0,
                "role_id" => 1,
                "disabled" => 0,
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/ユーザー情報を保存しました/", $result);

        $rec2 = $this->User->read(null, 1);
        $this->assertEqual($rec["User"]["password"], $rec2["User"]["password"]);
    }

    /**
     * 管理者画面での編集
     */
    function testAdminEdit()
    {
        Configure::write('cache.disabled', true);

        // 元のユーザー情報取得
        $this->User = new User();
        $this->User->useDbConfig = "test";
        // 対象ユーザーの情報を拾っておく
        $rec = $this->User->read(null, 2);

        // 管理者でログイン
        $this->login($this->Users, 1, "test_user");
        // 編集画面へ行く
        $url = "/admin/test_users/edit/2";
        $data = array(
            "User" => array(
                "username" => "test2user",
                "displayname" => 'test2operator',
                "id" => 2,
                "new_password" => "bar1234567",
                "email" => "example2@gmail.com",
                "dateformat" => 0,
                "grid_type" => 0,
                "role_id" => 2,
                "disabled" => 0,
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/ユーザー情報を保存しました/", $result);

        $rec2 = $this->User->read(null, 2);
        $this->assertNotEqual($rec["User"]["password"], $rec2["User"]["password"]);
        $expected_password = AuthComponent::password("bar1234567");
        $this->assertEqual($rec2["User"]["password"], $expected_password);
    }

    /**
     * 管理者画面での編集でパスワードが空の場合は以前のパスワードを使うことを確認
     */
    function testAdminEditWithEmptyPassword()
    {
        Configure::write('cache.disabled', true);

        // 元のユーザー情報取得
        $this->User = new User();
        $this->User->useDbConfig = "test";
        // 対象ユーザーの情報を拾っておく
        $rec = $this->User->read(null, 2);

        // 管理者でログイン
        $this->login($this->Users, 1, "test_user");
        // 編集画面へ行く
        $url = "/admin/test_users/edit/2";
        $data = array(
            "User" => array(
                "username" => "test2user",
                "displayname" => 'test2operator',
                "id" => 2,
                "new_password" => "",
                "email" => "example2@gmail.com",
                "dateformat" => 0,
                "grid_type" => 0,
                "role_id" => 2,
                "disabled" => 0,
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/ユーザー情報を保存しました/", $result);

        $rec2 = $this->User->read(null, 2);
        $this->assertEqual($rec["User"]["password"], $rec2["User"]["password"]);
    }

}

?>
