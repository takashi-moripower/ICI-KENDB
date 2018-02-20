<?php

/* Contracts Test cases generated on: 2010-11-27 05:11:14 : 1290803594 */
App::import('Controller', 'Contracts');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class ContractsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.contract', 'app.user', 'app.role', 'app.edit_status', 'app.history');

	/**
	 * テスト開始処理
	 */
    function startTest() {
        $this->Contracts = & new TestContractsController();
        $this->Contracts->constructClasses();
    }

	/**
	 * テスト終了処理
	 */
    function endTest() {
        unset($this->Contracts);
        ClassRegistry::flush();
    }

    /**
     * 一覧ページのテーブルレイアウトが正しいか
     */
    function testIndexTableFormat() {
        $this->check_index_format($this->Contracts, "/test_contracts/index");
    }

    /**
     * 一覧ページの数値形式が正しいか
     */
    function testIndexNumberFormat() {
        $this->check_number_format($this->Contracts, "/test_contracts/index");
    }

    /**
     * 閲覧ページの数値形式が正しいか
     */
    function testViewNumberFormat() {
        $this->check_number_format($this->Contracts, "/test_contracts/view/1");
    }

    /**
     * 閲覧画面で過去履歴にアクセスできる
     */
    function testViewHistoryExists() {
        $this->check_history($this->Contracts, "/test_contracts/view/1");
    }

    /**
     * データコピー用リンクが存在するか
     */
    function testViewCopyExists() {
        $this->check_copyfunc_exists($this->Contracts, "/test_contracts/view/1");
    }

    /**
     * データ一覧ページ
     */
    function testIndex() {
        $this->Contract = new Contract();
        $this->Contract->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Contracts, 1, "test_user");
        // 削除
        $url = "/test_contracts/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Contract->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "contract_id") {
                continue;
            }
            if(isset($this->Contract->output_column_label_alias[$columns[$i]])) {
                $str = $this->Contract->output_column_label_alias[$columns[$i]];
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
        $this->Contract = new Contract();
        $this->Contract->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Contracts, 1, "test_user");
        // 削除
        $url = "/test_contracts/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Contract->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "contract_id") {
                continue;
            }
            if(isset($this->Contract->output_column_label_alias[$columns[$i]])) {
                $str = $this->Contract->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/th>/", $result);
        }

    }

	/**
	 * 編集画面で教員検索できること
	 */
    function testEdit() {
        $this->check_researcher_search($this->Contracts, "/test_contracts/edit/1");
    }

    /**
     * 編集項目のテスト
     */
    function testEdit2() {
        $this->Contract = new Contract();
        $this->Contract->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Contracts, 1, "test_user");
        // 削除
        $url = "/test_contracts/edit/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Contract->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "contract_id" || $columns[$i] === "id") {
                continue;
            }
            if(isset($this->Contract->output_column_label_alias[$columns[$i]])) {
                $str = $this->Contract->output_column_label_alias[$columns[$i]];
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
        $this->Contract = new Contract();
        $this->Contract->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Contracts, 1, "test_user");
        // アップロード画面
        $url = "/test_contracts/upload";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
    }

}

?>