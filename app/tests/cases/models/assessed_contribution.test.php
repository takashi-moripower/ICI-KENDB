<?php

/* AssessedContribution Test cases generated on: 2011-01-05 11:01:17 : 1294194557 */
App::import('Model', 'AssessedContribution');
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class AssessedContributionTestCase extends KendbTestCase
{

    var $fixtures = array('app.assessed_contribution', 'app.user', 'app.summary');
    var $dropTables = false;

    function startTest()
    {
        $this->AssessedContribution = & ClassRegistry::init('AssessedContribution');
        $this->User = & ClassRegistry::init('User');
        $this->Summary = & ClassRegistry::init('Summary');
    }

    function endTest()
    {
        unset($this->AssessedContribution);
        unset($this->User);
        unset($this->Summary);
        ClassRegistry::flush();
    }

    function testFileColumns()
    {
        $count = count($this->AssessedContribution->getColumnTypes());
        $this->assertTrue($count - 7 == count($this->AssessedContribution->file_columns));
    }

    /**
     * 同一課題番号の場合のみ学内課題番号のユニークチェックをすること
     */
    function testIsUniqueInSameTitleNo() {
        $rec = $this->User->read(null, 1);
        User::store($rec);

        // 新規作成
        $data["AssessedContribution"]["year"] = 2011;
        $data["AssessedContribution"]["title_no"] = "12345";
        $data["AssessedContribution"]["titech_assignment_no"] = "12345678";
        $this->AssessedContribution->create($data);
        $this->assertTrue($this->AssessedContribution->validates());
        $this->assertTrue($this->AssessedContribution->save());

        // 同一年度内において同じ課題番号と学内課題番号でエラーになること
        $this->AssessedContribution->create($data);
        $this->assertFalse($this->AssessedContribution->validates());
        $this->assertFalse($this->AssessedContribution->save());

        // 課題番号が違っても同一年度内での重複は不可
        $data["AssessedContribution"]["title_no"] = "12346";
        $this->AssessedContribution->create($data);
        $this->assertFalse($this->AssessedContribution->validates());
        $this->assertFalse($this->AssessedContribution->save());

        // 課題番号が空の場合でも同一年度内で同じ学内課題番号は許可しない
        $data["AssessedContribution"]["title_no"] = "";
        $this->AssessedContribution->create($data);
        $this->assertFalse($this->AssessedContribution->validates());
        $this->assertFalse($this->AssessedContribution->save());

        // 学内課題番号が空の場合もOK
        $data["AssessedContribution"]["year"] = 2011;
        $data["AssessedContribution"]["title_no"] = "12345";
        $data["AssessedContribution"]["titech_assignment_no"] = "";
        $this->AssessedContribution->create($data);
        $this->assertTrue($this->AssessedContribution->validates());
        $this->assertTrue($this->AssessedContribution->save());

        // 学内課題番号と課題番号の双方が空の場合もOK
        $data["AssessedContribution"]["year"] = 2011;
        $data["AssessedContribution"]["title_no"] = "";
        $data["AssessedContribution"]["titech_assignment_no"] = "";
        $this->AssessedContribution->create($data);
        $this->assertTrue($this->AssessedContribution->validates());
        $this->assertTrue($this->AssessedContribution->save());

        // 異なる年度の場合は同一課題番号でも登録できる
        $data["AssessedContribution"]["year"] = 2010;
        $data["AssessedContribution"]["title_no"] = "12345";
        $data["AssessedContribution"]["titech_assignment_no"] = "12345678";
        $this->AssessedContribution->create($data);
        $this->assertTrue($this->AssessedContribution->validates());
        $this->assertTrue($this->AssessedContribution->save());

    }

    /**
     * テスト用のデータを登録する
     *
     * @return int model_id
     */
    function _createData()
    {
        $rec = $this->User->read(null, 1);
        User::store($rec);

        $data["AssessedContribution"]["year"] = 2011;
        $this->AssessedContribution->create();
        $result = $this->AssessedContribution->save($data);
        if(!$result) {
            throw new Exception("保存失敗");
        }
        $model_id = $this->AssessedContribution->getLastInsertID();

        return $model_id;
    }

    /**
     * データ保存の場合にSummaryテーブルにデータが作成されること
     */
    function testAfterSaveWhenCreated()
    {
        $model_id = $this->_createData();

        $condition = array(
            "model_name" => "AssessedContribution",
            "model_id" => $model_id,
            "is_project_record" => 1,
        );
        $rec = $this->Summary->find('first', array('conditions' => $condition));
        $this->assertTrue(is_array($rec) && count($rec) == 1);
    }

    /**
     * データ更新時にSummaryテーブルが正しく更新されていること
     */
    function testAfterSaveWhenUpdated()
    {
        // データ新規作成
        $model_id = $this->_createData();

        // データ更新
        $data = $this->AssessedContribution->read(null, $model_id);
        $data["AssessedContribution"]["co_researcher_name"] = "TDD二郎";
        $data["AssessedContribution"]["open_to_public"] = 0;
        $result = $this->AssessedContribution->save($data);
        $condition = array(
            "model_name" => "AssessedContribution",
            "model_id" => $model_id,
            "is_project_record" => 1,
            "researcher_name" => "TDD二郎",
        );
        $rec = $this->Summary->find('first', array('conditions' => $condition));
        $this->assertTrue(is_array($rec) && count($rec) == 1);
        $this->assertTrue($rec["Summary"]["open_to_public"] == 0);
        $this->assertTrue($rec["Summary"]["researcher_name"] == "TDD二郎");
    }

    /**
     * データが削除された場合に、サマリーテーブルの無効フラグにフラグがたつこと
     */
    function testAfterSaveWhenDeleted()
    {
        // データ新規作成
        $model_id = $this->_createData();
        // 削除する
        $this->AssessedContribution->delete($model_id);
        // データ検証
        $condition = array(
            "model_name" => "AssessedContribution",
            "is_project_record" => 1,
            "model_id" => $model_id,
        );
        // データは消えていないこと
        $rec = $this->Summary->find('first', array('conditions' => $condition));
        $this->assertTrue(is_array($rec) && count($rec) == 1);
        // 無効フラグチェック
        $this->assertTrue($rec["Summary"]["disabled"] == true );
    }

}

?>
