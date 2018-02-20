<?php

/* Adoptions Test cases generated on: 2011-01-05 11:01:46 : 1294194586 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class AdoptionsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.adoption', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

    function startTest() {
        $this->Adoptions = & new TestAdoptionsController();
        $this->Adoptions->constructClasses();
    }

    function endTest() {
        unset($this->Adoptions);
        ClassRegistry::flush();
    }

    /**
     * 一覧表のテーブルレイアウトが正しいか
     */
    function testIndexTableFormat() {
        $this->check_index_format($this->Adoptions, "/test_adoptions/index");
    }

    /**
     * 一覧表の数値フォーマットが正しいか
     */
    function testIndexNumberFormat() {
        $this->check_number_format($this->Adoptions, "/test_adoptions/index");
    }

    /**
     * View画面の数値フォーマットが正しいか
     */
    function testViewNumberFormat() {
        $this->check_number_format($this->Adoptions, "/test_adoptions/view/1");
    }

    /**
     * 閲覧画面で過去履歴にアクセスできる
     */
    function testViewHistoryExists() {
        $this->check_history($this->Adoptions, "/test_adoptions/view/1");
    }

    /**
     * データコピー用リンクが存在するか
     */
    function testViewCopyExists() {
        $this->check_copyfunc_exists($this->Adoptions, "/test_adoptions/view/1");
    }

    /**
     * 一覧画面
     */
    function testIndex() {
        $this->Adoption = new Adoption();
        $this->Adoption->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Adoptions, 1, "test_user");
        // 削除
        $url = "/test_adoptions/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Adoption->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if(isset($this->output_column_label_alias[$columns[$i]])) {
                $str = $this->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }
            $ret = $this->_getLabel($columns[$i]);
            if($ret!="") {
                $str = $ret;
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/a><\/th>/", $result);
        }

    }

    function _getLabel($str) {
        if($str == "current_payment_sum") {
            return "本年度合計";
        }
        if($str == "contribution_partition") {
            return "分配金実配分額";
        }
        if($str == "achievement_report_reception_date") {
            return "実績報告書受付日";
        }
        return "";
    }    

    /**
     * 詳細表示画面の項目チェック
     */
    function testView() {
        $this->Adoption = new Adoption();
        $this->Adoption->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Adoptions, 1, "test_user");
        // 削除
        $url = "/test_adoptions/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Adoption->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if(isset($this->output_column_label_alias[$columns[$i]])) {
                $str = $this->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }
            $ret = $this->_getLabel($columns[$i]);
            if($ret!="") {
                $str = $ret;
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/th>/", $result);
        }

    }

    function testEdit() {
        $this->check_researcher_search($this->Adoptions, "/test_adoptions/edit/1");
    }

    /**
     * 編集画面の項目チェック
     */
    function testEdit2() {
        $this->Adoption = new Adoption();
        $this->Adoption->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Adoptions, 1, "test_user");
        // 削除
        $url = "/test_adoptions/edit/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Adoption->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] == "id") {
                continue;
            }

            if(isset($this->output_column_label_alias[$columns[$i]])) {
                $str = $this->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }
            $ret = $this->_getLabel($columns[$i]);
            if($ret!="") {
                $str = $ret;
            }

            $this->assertPattern("/<label.*".preg_quote($str, '/') . "<\/label>/", $result);
        }

    }


	/**
	 * アップロード画面に空きIDの表示があるか
	 */
    function testUploadAvailableId() {
        $this->Adoption = new Adoption();
        $this->Adoption->useDbConfig = "test";
        // 管理者でログイン
        $this->login($this->Adoptions, 1, "test_user");
        // アップロード画面
        $url = "/test_adoptions/upload";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
	}

}

?>
