<?php

/* Projects Test cases generated on: 2010-12-28 18:12:29 : 1293528389 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class ProjectsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.project', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

    /**
     * テスト開始前準備
     */
    function startTest() {
        $this->Projects = & new TestProjectsController();
        $this->Projects->constructClasses();
    }

    /**
     * テスト終了時後始末
     */
    function endTest() {
        unset($this->Projects);
        ClassRegistry::flush();
    }

    /**
     * 一覧画面のテスト
     */
    function testIndex() {
        $this->login($this->Projects, 1, "test_user");
        $url = "/test_projects/index";
        $result = $this->testAction($url,
                        array('return' => 'content', 'method' => 'get', ));
        $this->assertPattern("/12345/", $result);
        $this->assertPattern("/テストプロジェクト長名/", $result);
        $this->assertPattern("/テスト短名/", $result);
        $this->assertPattern("/田中一郎/", $result);
        $this->assertPattern("/特任教授/", $result);
        $this->assertPattern("/1111/", $result);
        $this->assertPattern("/テスト研究科/", $result);
        $this->assertPattern("/プロジェクトの&lt;br \/&gt;ゴール/", $result);
        $this->assertPattern("/00000000/", $result);
        $this->assertPattern("/99999999/", $result);
    }

    /**
     * 閲覧画面のテスト
     */
    function testView() {
        $this->login($this->Projects, 1, "test_user");
        $url = "/test_projects/view/12345";
        $result = $this->testAction($url,
                        array('return' => 'content', 'method' => 'get',));
        $this->assertPattern("/12345/", $result);
        $this->assertPattern("/テストプロジェクト長名/", $result);
        $this->assertPattern("/テスト短名/", $result);
        $this->assertPattern("/田中一郎/", $result);
        $this->assertPattern("/特任教授/", $result);
        $this->assertPattern("/1111/", $result);
        $this->assertPattern("/テスト研究科/", $result);
        $this->assertPattern("/プロジェクトの&lt;br \/&gt;ゴール/", $result);
        $this->assertPattern("/00000000/", $result);
        $this->assertPattern("/99999999/", $result);
    }

    /**
     * 追加のテスト
     */
    function testAdd() {
        $this->login($this->Projects, 1, "test_user");
        $data = array(
            "Project" => array(
                "project_code" => "98765",
                "researcher_name" => "追加三郎",
                "job_title" => "技術職員",
            ),
        );
        $result = $this->testAction('/test_projects/add', array(
                    'data' => $data,
                    'fixturize' => true,
                    'method' => 'post',
                    'return' => 'view')
        );
        $url = "/test_projects/index";
        $result = $this->testAction($url,
                        array('return' => 'vars', 'method' => 'get'));
        $this->assertPattern("/追加三郎/", print_r($result, true));
        $this->assertPattern("/技術職員/", print_r($result, true));
    }

    /**
     * 編集のテスト
     */
    function testEdit() {
        $this->login($this->Projects, 1, "test_user");
        $data = array(
            "Project" => array(
                "project_code" => "12345",
                "researcher_name" => "近藤次郎",
                "job_title" => "助教",
            ),
        );
        $result = $this->testAction('/test_projects/edit/12345', array(
                    'data' => $data,
                    'fixturize' => true,
                    'method' => 'post',
                    'return' => 'view')
        );
        $url = "/test_projects/index";
        $result = $this->testAction($url,
                        array('return' => 'vars', 'method' => 'get'));
        $this->assertPattern("/近藤次郎/", print_r($result, true));
        $this->assertPattern("/助教/", print_r($result, true));
        $this->assertNoPattern("/田中一郎/", print_r($result, true));
        $this->assertNoPattern("/特任教授/", print_r($result, true));
    }

    /**
     * 削除のテスト
     */
    function testDelete() {
        $this->login($this->Projects, 1, "test_user");
        $url = "/test_projects/delete/12345";
        $result = $this->testAction($url,
                        array('method' => 'get', ));
        $url = "/test_projects/index";
        $result = $this->testAction($url,
                        array('return' => 'vars', 'method' => 'get'));
        $this->assertNoPattern("/テストプロジェクト長名/", print_r($result, true));
    }

    /**
     * JSONでデータ取得のテスト
     */
    function testGetJsonByProjectCode() {
        $this->login($this->Projects, 1, "test_user");
        $url = "/test_projects/getJsonByProjectCode/12345";
        $result = $this->testAction($url,
                        array('return' => 'content', 'method' => 'get',));
        $this->assertPattern("/12345/", $result);
        $enc = json_encode("テストプロジェクト長名");
        $this->assertPattern("/" . preg_quote($enc) . "/", $result);
    }

}

?>
