<?php

/* MhlwResearchGrants Test cases generated on: 2010-12-30 07:12:28 : 1293660028 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class MhlwResearchGrantsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.mhlw_research_grant', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

	/**
	 * テスト開始処理
	 */
    function startTest() {
        $this->MhlwResearchGrants = & new TestMhlwResearchGrantsController();
        $this->MhlwResearchGrants->constructClasses();
    }

	/**
	 * テスト終了処理
	 */
    function endTest() {
        unset($this->MhlwResearchGrants);
        ClassRegistry::flush();
    }

	/**
	 * 一覧画面でテーブルの形式が正しいか
	 */
    function testIndexTableFormat() {
        $this->check_index_format($this->MhlwResearchGrants, "/test_mhlw_research_grants/index");
    }

	/**
	 * 一覧画面で数字のフォーマットが正しいか
	 */
    function testIndexNumberFormat() {
        $this->check_number_format($this->MhlwResearchGrants, "/test_mhlw_research_grants/index");
    }

	/**
	 * 閲覧画面で数字のフォーマットが正しいか
	 */
    function testViewNumberFormat() {
        $this->check_number_format($this->MhlwResearchGrants, "/test_mhlw_research_grants/view/1");
    }

    /**
     * 閲覧画面で過去履歴にアクセスできる
     */
    function testViewHistoryExists() {
        $this->check_history($this->MhlwResearchGrants, "/test_mhlw_research_grants/view/1");
    }

    /**
     * データコピー用リンクが存在するか
     */
    function testViewCopyExists() {
        $this->check_copyfunc_exists($this->MhlwResearchGrants, "/test_mhlw_research_grants/view/1");
    }

    /**
     * データ一覧ページ
     */
    function testIndex() {
        $this->MhlwResearchGrant = new MhlwResearchGrant ();
        $this->MhlwResearchGrant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->MhlwResearchGrants, 1, "test_user");
        // 削除
        $url = "/test_mhlw_research_grants/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->MhlwResearchGrant->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "mhlw_research_grant_id") {
                continue;
            }
            if(isset($this->MhlwResearchGrant->output_column_label_alias[$columns[$i]])) {
                $str = $this->MhlwResearchGrant->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/a><\/th>/", $result);
        }

    }

    /**
     * 詳細閲覧ページ
     */
    function testView() {
        $this->MhlwResearchGrant = new MhlwResearchGrant ();
        $this->MhlwResearchGrant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->MhlwResearchGrants, 1, "test_user");
        // 削除
        $url = "/test_mhlw_research_grants/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->MhlwResearchGrant->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "mhlw_research_grant_id") {
                continue;
            }
            if(isset($this->MhlwResearchGrant->output_column_label_alias[$columns[$i]])) {
                $str = $this->MhlwResearchGrant->output_column_label_alias[$columns[$i]];
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
        $this->check_researcher_search($this->MhlwResearchGrants, "/test_mhlw_research_grants/edit/1");
    }

    /**
     * 編集項目のテスト
     */
    function testEdit2() {
        $this->MhlwResearchGrant = new MhlwResearchGrant ();
        $this->MhlwResearchGrant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->MhlwResearchGrants, 1, "test_user");
        // 削除
        $url = "/test_mhlw_research_grants/edit/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->MhlwResearchGrant->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "mhlw_research_grant_id" || $columns[$i] === "id") {
                continue;
            }
            if(isset($this->MhlwResearchGrant->output_column_label_alias[$columns[$i]])) {
                $str = $this->MhlwResearchGrant->output_column_label_alias[$columns[$i]];
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
        $this->MhlwResearchGrant = new MhlwResearchGrant();
        $this->MhlwResearchGrant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->MhlwResearchGrants, 1, "test_user");
        // アップロード画面
        $url = "/test_mhlw_research_grants/upload";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
    }
}

?>