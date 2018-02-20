<?php

/* Entrusts Test cases generated on: 2010-10-08 01:10:40 : 1286515780 */
App::import('Controller', 'Entrusts');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class EntrustsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.entrust', 'app.user', 'app.selectable_item', 'app.edit_status', 'app.history');
    var $dropTables = false;

	/**
	 * テスト開始処理
	 */
    function startTest() {
        $this->Entrusts = & new TestEntrustsController();
        $this->Entrusts->constructClasses();
    }

	/**
	 * テスト終了処理
	 */
    function endTest() {
        unset($this->Entrusts);
        ClassRegistry::flush();
    }

	/**
	 * 一覧画面のテーブルのフォーマットが正しいか
	 */
    function testIndexTableFormat() {
        $this->check_index_format($this->Entrusts, "/test_entrusts/index");
    }

	/**
	 * 一覧画面の数字のフォーマットが正しいか
	 */
    function testIndexNumberFormat() {
        $this->check_number_format($this->Entrusts, "/test_entrusts/index");
    }

	/**
	 * 閲覧画面の数字のフォーマットが正しいか
	 */
    function testViewNumberFormat() {
        $this->check_number_format($this->Entrusts, "/test_entrusts/view/1");
    }

	/**
	 * 過去履歴のリンクが存在すること
	 */
    function testViewHistoryExists() {
        $this->check_history($this->Entrusts, "/test_entrusts/view/1");
    }

    /**
     * データコピー用リンクが存在するか
     */
    function testViewCopyExists() {
        $this->check_copyfunc_exists($this->Entrusts, "/test_entrusts/view/1");
    }

    /**
     * データ作成者を追加したので、そのテスト
     */
    function testAddCreatedUser() {
        $this->login($this->Entrusts, 1, "test_user");
        $result = $this->testAction("/test_entrusts/view/1", array('method' => 'get', 'return' => 'contents'));
        $this->assertPattern("/" . __("Updated By", true) . "/", $result);
        $result = $this->testAction("/test_entrusts/index", array('method' => 'get', 'return' => 'contents'));
        $this->assertPattern("/" . __("Updated By", true) . "/", $result);
    }

	/**
	 * 編集
	 */
    function testEdit() {
        $this->login($this->Entrusts, 1, "test_user");
        $result = $this->testAction("/test_entrusts/edit/1", array('method' => 'get', 'return' => 'contents'));
        $this->assertPattern("/編集/", $result);
    }

    /**
     * 編集の際の項目チェック
     */
    function testEdit2() {
        $this->Entrust = new Entrust();
        $this->Entrust->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Entrusts, 1, "test_user");
        // 削除
        $url = "/test_entrusts/edit/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Entrust->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "entrust_id" || $columns[$i] === "id") {
                continue;
            }
            if(isset($this->Entrust->output_column_label_alias[$columns[$i]])) {
                $str = $this->Entrust->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<label.*".preg_quote($str, '/') . "<\/label>/", $result);
        }

    }

    /**
     * 教員名で検索
     */
    function testEditResearcherSearch() {
        $this->check_researcher_search($this->Entrusts, "/test_entrusts/edit/1");
    }

    /**
     * データ一覧ページ
     */
    function testIndex() {
        $this->Entrust = new Entrust();
        $this->Entrust->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Entrusts, 1, "test_user");
        // 削除
        $url = "/test_entrusts/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Entrust->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "entrust_id") {
                continue;
            }
            if(isset($this->Entrust->output_column_label_alias[$columns[$i]])) {
                $str = $this->Entrust->output_column_label_alias[$columns[$i]];
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
        $this->Entrust = new Entrust();
        $this->Entrust->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Entrusts, 1, "test_user");
        // 削除
        $url = "/test_entrusts/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Entrust->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "entrust_id") {
                continue;
            }
            if(isset($this->Entrust->output_column_label_alias[$columns[$i]])) {
                $str = $this->Entrust->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/th>/", $result);
        }

    }

	/**
	 * アップロード画面に空きIDの表示があるか
	 */
    function testUploadAvailableId() {
        $this->Entrust = new Entrust();
        $this->Entrust->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Entrusts, 1, "test_user");
        // アップロード画面
        $url = "/test_entrusts/upload";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
    }
}

?>
