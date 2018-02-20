<?php

/* Encourages Test cases generated on: 2010-12-09 19:12:16 : 1291889596 */
App::import('Controller', 'Encourages');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class EncouragesControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.encourage', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

	/**
	 * テスト開始処理
	 */
    function startTest() {
        $this->Encourages = & new TestEncouragesController();
        $this->Encourages->constructClasses();
    }

	/**
	 * テスト終了処理
	 */
    function endTest() {
        unset($this->Encourages);
        ClassRegistry::flush();
    }

	/**
	 * 一覧画面のテーブルの形式が正しいか
	 */
    function testIndexTableFormat() {
        $this->check_index_format($this->Encourages, "/test_encourages/index");
    }

	/**
	 * 一覧画面の数字のフォーマットが正しいか
	 */
    function testIndexNumberFormat() {
        $this->check_number_format($this->Encourages, "/test_encourages/index");
    }

	/**
	 * 閲覧画面の数字のフォーマットが正しいか
	 */
    function testViewNumberFormat() {
        $this->check_number_format($this->Encourages, "/test_encourages/view/1");
    }

    /**
     * 閲覧画面で過去履歴にアクセスできる
     */
    function testViewHistoryExists() {
        $this->check_history($this->Encourages, "/test_encourages/view/1");
    }

    /**
     * データコピー用リンクが存在するか
     */
    function testViewCopyExists() {
        $this->check_copyfunc_exists($this->Encourages, "/test_encourages/view/1");
    }

    /**
     * データ一覧ページ
     */
    function testIndex() {
        $this->Encourage = new Encourage();
        $this->Encourage->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Encourages, 1, "test_user");
        // 削除
        $url = "/test_encourages/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Encourage->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "encourage_id") {
                continue;
            }
            if(isset($this->Encourage->output_column_label_alias[$columns[$i]])) {
                $str = $this->Encourage->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/a><\/th>/", $result);
        }

    }

    /**
     * 詳細閲覧ページのテスト
     */
    function testView() {
        $this->Encourage = new Encourage();
        $this->Encourage->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Encourages, 1, "test_user");
        // 削除
        $url = "/test_encourages/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Encourage->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "encourage_id") {
                continue;
            }
            if(isset($this->Encourage->output_column_label_alias[$columns[$i]])) {
                $str = $this->Encourage->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/th>/", $result);
        }

    }

	/**
	 * 教員検索のボタンが表示されているか
	 */
    function testEdit() {
        $this->check_researcher_search($this->Encourages, "/test_encourages/edit/1");
    }

    /**
     * 編集項目のテスト
     */
    function testEdit2() {
        $this->Encourage = new Encourage();
        $this->Encourage->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Encourages, 1, "test_user");
        // 削除
        $url = "/test_encourages/edit/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Encourage->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "encourage_id" || $columns[$i] === "id") {
                continue;
            }
            if(isset($this->Encourage->output_column_label_alias[$columns[$i]])) {
                $str = $this->Encourage->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<label.*".preg_quote($str, '/') . "<\/label>/", $result);
        }

    }

	/**
	 * アップロード画面に空きIDの表示があるか
	 */
    function testUploadAvailableId() {
        $this->Encourage = new Encourage();
        $this->Encourage->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Encourages, 1, "test_user");
        // アップロード画面
        $url = "/test_encourages/upload";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
    }
}

?>