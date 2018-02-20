<?php

/* AssessedContributions Test cases generated on: 2011-01-05 11:01:03 : 1294194603 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class AssessedContributionsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.assessed_contribution', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

	/**
	 * テスト開始処理　
	 */
    function startTest() {
        $this->AssessedContributions = & new TestAssessedContributionsController();
        $this->AssessedContributions->constructClasses();
    }

	/**
	 * テスト終了処理
	 */
    function endTest() {
        unset($this->AssessedContributions);
        ClassRegistry::flush();
    }

    /**
     * 一覧表のテーブル形式が正しいか
     */
    function testIndexTableFormat() {
        $this->check_index_format($this->AssessedContributions, "/test_assessed_contributions/index");
    }

    /**
     * 一覧表の数値形式が正しいか
     */
    function testIndexNumberFormat() {
        $this->check_number_format($this->AssessedContributions, "/test_assessed_contributions/index");
    }

    /**
     * 閲覧画面の数値形式が正しいか
     */
    function testViewNumberFormat() {
        $this->check_number_format($this->AssessedContributions, "/test_assessed_contributions/view/1");
    }

    /**
     * 閲覧画面で過去履歴にアクセスできる
     */
    function testViewHistoryExists() {
        $this->check_history($this->AssessedContributions, "/test_assessed_contributions/view/1");
    }

    /**
     * データコピー用リンクが存在するか
     */
    function testViewCopyExists() {
        $this->check_copyfunc_exists($this->AssessedContributions, "/test_assessed_contributions/view/1");
    }

    /**
     * データ一覧ページのテスト
     */
    function testIndex() {
        $this->AssessedContribution = new AssessedContribution();
        $this->AssessedContribution->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->AssessedContributions, 1, "test_user");
        // 削除
        $url = "/test_assessed_contributions/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->AssessedContribution->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if(isset($this->AssessedContribution->output_column_label_alias[$columns[$i]])) {
                $str = $this->AssessedContribution->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/a><\/th>/", $result);
        }

    }

    /**
     * 詳細表示ページのテスト
     */
    function testView() {
        $this->AssessedContribution = new AssessedContribution();
        $this->AssessedContribution->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->AssessedContributions, 1, "test_user");
        // 削除
        $url = "/test_assessed_contributions/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->AssessedContribution->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if(isset($this->AssessedContribution->output_column_label_alias[$columns[$i]])) {
                $str = $this->AssessedContribution->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/th>/", $result);
        }

    }

	/**
	 * 編集画面に教員検索ボタンがあるかどうか
	 */
    function testEdit() {
        $this->check_researcher_search($this->AssessedContributions, "/test_assessed_contributions/edit/1");
    }

    /**
     * 編集項目の確認
     */
    function testEdit2() {
        $this->AssessedContribution = new AssessedContribution();
        $this->AssessedContribution->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->AssessedContributions, 1, "test_user");
        // 削除
        $url = "/test_assessed_contributions/edit/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->AssessedContribution->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "id") {
                continue;
            }
            if(isset($this->AssessedContribution->output_column_label_alias[$columns[$i]])) {
                $str = $this->AssessedContribution->output_column_label_alias[$columns[$i]];
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
        $this->AssessedContribution = new AssessedContribution();
        $this->AssessedContribution->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->AssessedContributions, 1, "test_user");
        // アップロード画面
        $url = "/test_assessed_contributions/upload";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
    }

}

?>