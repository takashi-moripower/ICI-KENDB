<?php

/* OtherResearchGrants Test cases generated on: 2010-12-29 17:12:44 : 1293610424 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class OtherResearchGrantsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.other_research_grant', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

	/**
	 * テスト開始処理
	 */
    function startTest() {
        $this->OtherResearchGrants = & new TestOtherResearchGrantsController();
        $this->OtherResearchGrants->constructClasses();
    }

	/**
	 * テスト終了処理
	 */
    function endTest() {
        unset($this->OtherResearchGrants);
        ClassRegistry::flush();
    }

	/**
	 * 一覧画面のテーブルの形式が正しいか
	 */
    function testIndexTableFormat() {
        $this->check_index_format($this->OtherResearchGrants, "/test_other_research_grants/index");
    }

	/**
	 * 一覧画面の数字のフォーマットが正しいか
	 */
    function testIndexNumberFormat() {
        $this->check_number_format($this->OtherResearchGrants, "/test_other_research_grants/index");
    }

	/**
	 * 閲覧画面の数字のフォーマットが正しいか
	 */
    function testViewNumberFormat() {
        $this->check_number_format($this->OtherResearchGrants, "/test_other_research_grants/view/1");
    }

    /**
     * 閲覧画面で過去履歴にアクセスできる
     */
    function testViewHistoryExists() {
        $this->check_history($this->OtherResearchGrants, "/test_other_research_grants/view/1");
    }

    /**
     * データコピー用リンクが存在するか
     */
    function testViewCopyExists() {
        $this->check_copyfunc_exists($this->OtherResearchGrants, "/test_other_research_grants/view/1");
    }

    /**
     * データ一覧ページ
     */
    function testIndex() {
        $this->OtherResearchGrant = new OtherResearchGrant ();
        $this->OtherResearchGrant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->OtherResearchGrants, 1, "test_user");
        // 削除
        $url = "/test_other_research_grants/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->OtherResearchGrant->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "other_research_grant_id") {
                continue;
            }
            if(isset($this->OtherResearchGrant->output_column_label_alias[$columns[$i]])) {
                $str = $this->OtherResearchGrant->output_column_label_alias[$columns[$i]];
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
        $this->OtherResearchGrant = new OtherResearchGrant ();
        $this->OtherResearchGrant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->OtherResearchGrants, 1, "test_user");
        // 削除
        $url = "/test_other_research_grants/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->OtherResearchGrant->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "other_research_grant_id") {
                continue;
            }
            if(isset($this->OtherResearchGrant->output_column_label_alias[$columns[$i]])) {
                $str = $this->OtherResearchGrant->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/th>/", $result);
        }
    }

	/**
	 * 編集画面で教員検索のボタンが表示されているか
	 */
    function testEdit() {
        $this->check_researcher_search($this->OtherResearchGrants, "/test_other_research_grants/edit/1");
    }

    /**
     * 編集の際のカラムチェック
     */
    function testEdit2() {
        $this->OtherResearchGrant = new OtherResearchGrant ();
        $this->OtherResearchGrant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->OtherResearchGrants, 1, "test_user");
        // 削除
        $url = "/test_other_research_grants/edit/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->OtherResearchGrant->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "other_research_grant_id" || $columns[$i] === "id") {
                continue;
            }
            if(isset($this->OtherResearchGrant->output_column_label_alias[$columns[$i]])) {
                $str = $this->OtherResearchGrant->output_column_label_alias[$columns[$i]];
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
        $this->OtherResearchGrant = new OtherResearchGrant();
        $this->OtherResearchGrant->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->OtherResearchGrants, 1, "test_user");
        // アップロード画面
        $url = "/test_other_research_grants/upload";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
    }
}

?>