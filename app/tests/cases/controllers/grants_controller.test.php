<?php

/* Grants Test cases generated on: 2010-11-27 18:11:44 : 1290850664 */
App::import('Controller', 'Grants');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class GrantsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.grant', 'app.user', 'app.role', 'app.edit_status', 'app.history');

	/**
	 * テスト開始処理
	 */
    function startTest() {
        $this->Grants = & new TestGrantsController();
        $this->Grants->constructClasses();
    }

	/**
	 * テスト終了処理
	 */
    function endTest() {
        unset($this->Grants);
        ClassRegistry::flush();
    }

	/**
	 * 一覧画面のテーブルの形式が正しいか
	 */
    function testIndexTableFormat() {
        $this->check_index_format($this->Grants, "/test_grants/index");
    }

	/**
	 * 一覧画面の数字のフォーマットが正しいか
	 */
    function testIndexNumberFormat() {
        $this->check_number_format($this->Grants, "/test_grants/index");
    }

	/**
	 * 閲覧画面の数字のフォーマットが正しいか
	 */
    function testViewNumberFormat() {
        $this->check_number_format($this->Grants, "/test_grants/view/1");
    }

    /**
     * 閲覧画面で過去履歴にアクセスできる
     */
    function testViewHistoryExists() {
        $this->check_history($this->Grants, "/test_grants/view/1");
    }

    /**
     * データコピー用リンクが存在するか
     */
    function testViewCopyExists() {
        $this->check_copyfunc_exists($this->Grants, "/test_grants/view/1");
    }

    /**
     * 詳細閲覧ページ
     */
    function testView() {
        $this->Grant = new Grant();
        $this->Grant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Grants, 1, "test_user");
        // 削除
        $url = "/test_grants/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Grant->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "grant_id") {
                continue;
            }
            if(isset($this->Grant->output_column_label_alias[$columns[$i]])) {
                $str = $this->Grant->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/th>/", $result);
        }

    }

	/**
	 * 編集画面で教員検索ボタンが表示されるか
	 */
    function testEdit() {
        $this->check_researcher_search($this->Grants, "/test_grants/edit/1");
    }

    /**
     * 編集項目のテスト
     */
    function testEdit2() {
        $this->Grant = new Grant();
        $this->Grant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Grants, 1, "test_user");
        // 削除
        $url = "/test_grants/edit/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Grant->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "grant_id" || $columns[$i] === "id") {
                continue;
            }
            if(isset($this->Grant->output_column_label_alias[$columns[$i]])) {
                $str = $this->Grant->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<label.*".preg_quote($str, '/') . "<\/label>/", $result);
        }

    }

    /**
     * データ一覧ページ
     */
    function testIndex() {
        $this->Grant = new Grant();
        $this->Grant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Grants, 1, "test_user");
        // 削除
        $url = "/test_grants/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Grant->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "grant_id") {
                continue;
            }
            if(isset($this->Grant->output_column_label_alias[$columns[$i]])) {
                $str = $this->Grant->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/a><\/th>/", $result);
        }
    }

	/**
	 * アップロード画面に空きIDの表示があるか
	 */
    function testUploadAvailableId() {
        $this->Grant = new Grant();
        $this->Grant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Grants, 1, "test_user");
        // アップロード画面
        $url = "/test_grants/upload";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
    }


}

?>