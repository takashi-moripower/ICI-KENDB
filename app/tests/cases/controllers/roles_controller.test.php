<?php

/* Roles Test cases generated on: 2010-11-26 10:11:13 : 1290735853 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class RolesControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.role', 'app.user', 'app.edit_status', 'app.history');
    var $dropTables = false;

    function startTest() {
        $this->Roles = & new TestRolesController();
        $this->Roles->constructClasses();
    }

    function endTest() {
        unset($this->Roles);
        ClassRegistry::flush();
    }

    /**
     * 管理者画面での権限一覧のテスト
     */
    function testAdminIndex() {
        // 管理者でログイン
        $this->login($this->Roles, 1, "test_user");

        // 閲覧
        $url = "/admin/test_roles/index";
        $result = $this->testAction($url,
                array('return' => 'content', 'method' => 'get'));
        $this->assertPattern("/閲覧/", $result);
        $this->assertPattern("/編集/", $result);
        $this->assertPattern("/削除/", $result);
        $this->assertPattern("/新規権限作成/", $result);
        $this->assertPattern("/ユーザー一覧/", $result);
        $this->assertPattern("/新規ユーザー/", $result);

    }

    /**
     * 管理画面での権限詳細のテスト
     */
    function testAdminView()
    {
        Configure::write('cache.disabled', true);

        // 元のユーザー情報取得
        $this->Role = new Role();
        $this->Role->useDbConfig = "test";
        $rec = $this->Role->read(null, 2);

        // 管理者でログイン
        $this->login($this->Roles, 1, "test_user");

        // 閲覧
        $url = "/admin/test_roles/view/2";
        $result = $this->testAction($url,
                array('return' => 'content', 'method' => 'get'));

        foreach ($rec["Role"] as $k => $v) {

            // キーの日本語名が表示されているか
            $this->assertPattern("/" . preg_quote(__(Inflector::humanize($k), true)) . "/", $result);

            $this->assertPattern("/" . preg_quote($v) . "/", $result);
        }
    }

    /**
     * 管理画面で権限の追加ができること
     */
    function testAdminAdd()
    {
        Configure::write('cache.disabled', true);

        $this->Role = new Role();
        $this->Role->useDbConfig = "test";
        // 管理者でログイン
        $this->login($this->Roles, 1, "test_user");
        // 編集画面へ行く
        $url = "/admin/test_roles/add";
        $data = array(
            "Role" => array(
                "name" => "テスト権限",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . __('The role has been saved', true) . "/", $result);

        $rec2 = $this->Role->findByName("テスト権限");
        $this->assertEqual($rec2["Role"]["name"], "テスト権限");
        $id = $rec2["Role"]["id"];

        // 削除する
        $url = "/admin/test_roles/delete/".$id;
        $result = $this->testAction($url,
                array('method' => 'get'));

        // 関連ユーザーがいないので削除されているはず
        $rec3 = $this->Role->read(null, $id);
        $this->assertTrue($rec3 == false);

    }

    /**
     * 管理画面で権限の編集ができること
     */
    function testAdminEdit()
    {
        Configure::write('cache.disabled', true);

        // 元のユーザー情報取得
        $this->Role = new Role();
        $this->Role->useDbConfig = "test";
        // 対象ユーザーの情報を拾っておく
        $rec = $this->Role->read(null, 2);

        // 管理者でログイン
        $this->login($this->Roles, 1, "test_user");
        // 編集画面へ行く
        $url = "/admin/test_roles/edit/2";
        $data = array(
            "Role" => array(
                "id" => 2,
                "name" => "テストできる権限",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/保存しました/", $result);

        $rec2 = $this->Role->read(null, 2);
        $this->assertNotEqual($rec["Role"]["name"], $rec2["Role"]["name"]);
    }

    /**
     * 管理画面での権限削除の際に、既にユーザーがいる権限は削除できないこと
     */
    function testAdminDeleteWithUser() {
        Configure::write('cache.disabled', true);

        // 元のユーザー情報取得
        $this->Role = new Role();
        $this->Role->useDbConfig = "test";
        $rec = $this->Role->read(null, 1);

        // 管理者でログイン
        $this->login($this->Roles, 1, "test_user");
        // 削除
        $url = "/admin/test_roles/delete/1";
        $result = $this->testAction($url,
                array('method' => 'get'));

        // 関連ユーザーがいると削除できない
        $rec2 = $this->Role->read(null, 1);
        $this->assertTrue($rec2 == $rec);

    }


}

?>
