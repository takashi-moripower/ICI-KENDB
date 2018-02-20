<?php

/* Donations Test cases generated on: 2010-12-09 19:12:58 : 1291889578 */
App::import('Controller', 'Donations');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class DonationsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.donation', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

	/**
	 * テスト開始処理
	 */
    function startTest() {
        $this->Donations = & new TestDonationsController();
        $this->Donations->constructClasses();
    }

	/**
	 * テスト終了処理
	 */
    function endTest() {
        unset($this->Donations);
        ClassRegistry::flush();
    }

	/**
	 * 一覧画面でテーブルのフォーマットが正しいか
	 */
    function testIndexTableFormat() {
        $this->check_index_format($this->Donations, "/test_donations/index");
    }

	/**
	 * 一覧画面で数字のフォーマットが正しいか
	 */
    function testIndexNumberFormat() {
        $this->check_number_format($this->Donations, "/test_donations/index");
    }

	/**
	 * 閲覧画面で数字のフォーマットが正しいか
	 */
    function testViewNumberFormat() {
        $this->check_number_format($this->Donations, "/test_donations/view/1");
    }

    /**
     * 閲覧画面で過去履歴にアクセスできる
     */
    function testViewHistoryExists() {
        $this->check_history($this->Donations, "/test_donations/view/1");
    }

    /**
     * データコピー用リンクが存在するか
     */
    function testViewCopyExists() {
        $this->check_copyfunc_exists($this->Donations, "/test_donations/view/1");
    }


    /**
     * データ一覧ページ
     */
    function testIndex() {
        $this->Donation = new Donation();
        $this->Donation->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Donations, 1, "test_user");
        // 削除
        $url = "/test_donations/index";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Donation->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "donation_id") {
                continue;
            }
            if(isset($this->Donation->output_column_label_alias[$columns[$i]])) {
                $str = $this->Donation->output_column_label_alias[$columns[$i]];
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
        $this->Donation = new Donation();
        $this->Donation->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Donations, 1, "test_user");
        // 削除
        $url = "/test_donations/view/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Donation->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "donation_id") {
                continue;
            }
            if(isset($this->Donation->output_column_label_alias[$columns[$i]])) {
                $str = $this->Donation->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/th>/", $result);
        }

    }

    /**
     * 編集項目のテスト
     */
    function testEdit() {
        $this->Donation = new Donation();
        $this->Donation->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Donations, 1, "test_user");
        // 削除
        $url = "/test_donations/edit/1";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));

        // 表示フィールドの検証
        $columns = $this->Donation->file_columns;
        for($i=0; $i<count($columns); $i++) {
            if($columns[$i] === "donation_id" || $columns[$i] === "id") {
                continue;
            }
            if(isset($this->Donation->output_column_label_alias[$columns[$i]])) {
                $str = $this->Donation->output_column_label_alias[$columns[$i]];
            } else {
                $str = __(Inflector::humanize($columns[$i]), true);
            }

            $this->assertPattern("/<label.*".preg_quote($str, '/') . "<\/label>/", $result);
        }

    }

    /**
     * 編集画面で教員検索できること
     */
    function testResearcherSearchAtEdit() {
        $this->check_researcher_search($this->Donations, "/test_donations/edit/1");
    }

    /**
     * 更新の際に更新日や更新者が更新されていること
     */
    function testEditAndChangeUpdatedInfo() {
        $this->Donation = new Donation();
        $this->Donation->useDbConfig = 'test';

        $this->login($this->Donations, 1, "test_user");

        $data = array(
            "Donation" => array(
                "id" => 1,
                "researcher_name" => "テスト教員",
            ),
        );
        $url = "/test_donations/edit/1";
        $rec = $this->Donation->read(null, 1);

        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        //var_dump($result);
        
        // 正しく更新されること
        $str = sprintf(__('The %s has been saved', true), __("Donations", true));
        $this->assertPattern("/".preg_quote($str)."/", $result);

        $rec2 = $this->Donation->read(null,1);

        // 日付や更新者が更新されていること
        $this->assertNotEqual($rec["Donation"]["updated"], $rec2["Donation"]["updated"]);
        $this->assertNotEqual($rec["Donation"]["updated_by"], $rec2["Donation"]["updated_by"]);

    }

	/**
	 * アップロード画面に空きIDの表示があるか
	 */
    function testUploadAvailableId() {
        $this->Donation = new Donation();
        $this->Donation->useDbConfig = "test";

        // 管理者でログイン
        $this->login($this->Donations, 1, "test_user");
        // アップロード画面
        $url = "/test_donations/upload";
        $result = $this->testAction($url,
                array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
    }

}

?>
