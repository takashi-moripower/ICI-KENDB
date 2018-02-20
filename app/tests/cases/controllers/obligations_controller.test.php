<?php

/* Obligations Test cases generated on: 2010-12-28 18:12:34 : 1293528514 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");
App::import('Model', 'Obligation');

class ObligationsControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.obligation', 'app.user', 'app.role', 'app.edit_status', 'app.history', 'app.researcher');

    function startTest() {
        $this->Obligations = & new TestObligationsController();
        $this->Obligations->constructClasses();
    }

    function endTest() {
        unset($this->Obligations);
        ClassRegistry::flush();
    }

    /**
     * 表示するカラムの確認
     */
    function testView() {
        $this->Obligation = new Obligation();
        $this->Obligation->useDbConfig = 'test';
        // 管理者でログイン
        $this->login($this->Obligations, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_obligations/view/131131";
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'get'));

        // チェックするカラム表示内容
        $columns = array(
            "obligation_code", "obligation_name", "ob_job_title",
            "ob_represent_name", "ob_postal_code_address",
            "ob_section", "ob_person_in_charge", "obligation_name_short",
            "ob_postal_code", "ob_address",
        );
        foreach ($columns as $c) {
            $this->assertPattern("/". preg_quote(__(Inflector::humanize($c), true)) . "/", $result);
        }
    }

    /**
     * 新規債主データの追加テスト
     */
    function testAdd() {
        $this->Obligation = new Obligation();
        $this->Obligation->useDbConfig = 'test';
        $org_count = $this->Obligation->find('count');

        // 管理者でログイン
        $this->login($this->Obligations, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_obligations/add";
        $data = array(
            "Obligation" => array(
                "obligation_code" => "new1",
                "obligation_name" => '債主テスト１',
                "ob_job_title" => "代表取締役社長",
                "ob_represent_name" => "代表者",
                "ob_postal_code_address" => "100-0000 東京都港区赤坂1-1-1",
                "ob_section" => "テスト部",
                "ob_person_in_charge" => "担当太郎",
                "obligation_name_short" => "債テ",
                "ob_postal_code" => "100-0000",
                "ob_address" => "東京都港区赤坂1-1-1",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . __('The obligation has been saved', true) . "/", $result);

        // DB登録チェック
        $rec2 = $this->Obligation->findByObligationCode("new1");
        $this->assertEqual($rec2["Obligation"]["obligation_name"], "債主テスト１");
        $this->assertEqual($rec2["Obligation"]["ob_represent_name"], "代表者");

        // 件数チェック
        $new_count = $this->Obligation->find('count');
        $this->assertEqual($org_count + 1, $new_count);
    }

    /**
     * 新規債主データの追加テスト(必須入力漏れ)
     */
    function testAddWithEmptyField() {
        $this->Obligation = new Obligation();
        $this->Obligation->useDbConfig = 'test';
        $org_count = $this->Obligation->find('count');

        // 管理者でログイン
        $this->login($this->Obligations, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_obligations/add";
        $data = array(
            "Obligation" => array(
                "obligation_code" => "",
                "obligation_name" => '債主テスト１',
                "ob_job_title" => "代表取締役社長",
                "ob_represent_name" => "代表者",
                "ob_postal_code_address" => "100-0000 東京都港区赤坂1-1-1",
                "ob_section" => "テスト部",
                "ob_person_in_charge" => "担当太郎",
                "obligation_name_short" => "債テ",
                "ob_postal_code" => "100-0000",
                "ob_address" => "東京都港区赤坂1-1-1",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . __('The obligation could not be saved. Please, try again.', true) . "/", $result);

        // 件数チェック
        $new_count = $this->Obligation->find('count');
        $this->assertEqual($org_count, $new_count);
    }


    /**
     * 既存債主データの編集
     */
    function testEdit() {
        $this->Obligation = new Obligation();
        $this->Obligation->useDbConfig = 'test';
        $org_count = $this->Obligation->find('count');

        // 管理者でログイン
        $this->login($this->Obligations, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_obligations/edit/131131";
        $data = array(
            "Obligation" => array(
                "obligation_code" => "131131",
                "obligation_name" => '債主テスト１',
                "ob_job_title" => "代表取締役社長",
                "ob_represent_name" => "代表者",
                "ob_postal_code_address" => "100-0000 東京都港区赤坂1-1-1",
                "ob_section" => "テスト部",
                "ob_person_in_charge" => "担当太郎",
                "obligation_name_short" => "債テ",
                "ob_postal_code" => "100-0000",
                "ob_address" => "東京都港区赤坂1-1-1",
            ),
        );
        $result = $this->testAction($url,
                array('return' => 'view', 'method' => 'post', 'data' => $data));
        $this->assertPattern("/" . __('The obligation has been saved', true) . "/", $result);

        // DB登録チェック
        $rec2 = $this->Obligation->findByObligationCode("131131");
        $this->assertEqual($rec2["Obligation"]["obligation_name"], "債主テスト１");
        $this->assertEqual($rec2["Obligation"]["ob_represent_name"], "代表者");

        // 件数チェック
        $new_count = $this->Obligation->find('count');
        $this->assertEqual($org_count, $new_count);
    }

    /**
     * 債主データ削除のテスト
     */
    function testDelete() {
        $this->Obligation = new Obligation();
        $this->Obligation->useDbConfig = 'test';
        $org_count = $this->Obligation->find('count');

        // 管理者でログイン
        $this->login($this->Obligations, 1, "test_user");
        // 編集画面へ行く
        $url = "/test_obligations/delete/131131";
        $result = $this->testAction($url,
                array('method' => 'get'));

        // DB登録チェック
        $rec2 = $this->Obligation->findByObligationCode("131131");
        var_dump($rec2);
        $this->assertFalse($rec2);
        // 件数チェック
        $new_count = $this->Obligation->find('count');
        $this->assertEqual($org_count -1, $new_count);
    }

    /**
     * 債主コードをキーにしてデータをJSONで取得するテスト
     */
    function testGetJsonByObligationCode() {
        $this->login($this->Obligations, 1, "test_user");
        $url = "/test_obligations/getJsonByObligationCode/131131";
        $result = $this->testAction($url,
                        array('return' => 'content', 'method' => 'get'));
        var_dump($result);
        $this->assertPattern("/131131/", $result);
        $enc = json_encode("代表太郎");
        $this->assertPattern("/".preg_quote($enc)."/", $result);
    }

}

?>