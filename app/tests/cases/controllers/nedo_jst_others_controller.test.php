<?php

/* NedoJstOthers Test cases generated on: 2010-11-05 10:11:03 : 1288920843 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class NedoJstOthersControllerTestCase extends KendbTestCase {

	var $fixtures = array('app.nedo_jst_other', 'app.user', 'app.history', 'app.summary');

	/**
	 * テスト開始処理
	 */
	function startTest() {
		$this->NedoJstOthers = & new TestNedoJstOthersController();
		$this->NedoJstOthers->constructClasses();
		$this->NedoJstOther = new NedoJstOther();
		$this->NedoJstOther->useDbConfig = "test";
		$this->Summary = new Summary();
		$this->Summary->useDbConfig = "test";
		$this->Summary->query("TRUNCATE table summaries");
	}

	/**
	 * テスト終了処理
	 */
	function endTest() {
		unset($this->NedoJstOthers);
		ClassRegistry::flush();
	}

	/**
	 * 一覧画面のテーブルの形式が正しいこと
	 */
	function testIndexTableFormat() {
		$this->check_index_format($this->NedoJstOthers, "/test_nedo_jst_others/index");
	}

	/**
	 * 一覧画面の数字のフォーマットが正しいこと
	 */
	function testIndexNumberFormat() {
		$this->check_number_format($this->NedoJstOthers, "/test_nedo_jst_others/index");
	}

	/**
	 * 閲覧画面の数字のフォーマットが正しいこと
	 */
	function testViewNumberFormat() {
		$this->check_number_format($this->NedoJstOthers, "/test_nedo_jst_others/view/1");
	}

	/**
	 * 閲覧画面で過去履歴にアクセスできる
	 */
	function testViewHistoryExists() {
		$this->check_history($this->NedoJstOthers, "/test_nedo_jst_others/view/1");
	}

	/**
	 * データコピー用リンクが存在するか
	 */
	function testViewCopyExists() {
		$this->check_copyfunc_exists($this->NedoJstOthers, "/test_nedo_jst_others/view/1");
	}

	/**
	 * 詳細閲覧ページ
	 */
	function testView() {
		//$this->NedoJstOther = new NedoJstOther();
		//$this->NedoJstOther->useDbConfig = "test";

		// 管理者でログイン
		$this->login($this->NedoJstOthers, 1, "test_user");
		// 削除
		$url = "/test_nedo_jst_others/view/1";
		$result = $this->testAction($url,
				array('method' => 'get', 'return' => 'contents'));

		// 表示フィールドの検証
		$columns = $this->NedoJstOther->file_columns;
		for($i=0; $i<count($columns); $i++) {
			if($columns[$i] === "nedo_jst_other_id") {
				continue;
			}
			if(isset($this->NedoJstOther->output_column_label_alias[$columns[$i]])) {
				$str = $this->NedoJstOther->output_column_label_alias[$columns[$i]];
			} else {
				$str = __(Inflector::humanize($columns[$i]), true);
			}
			// 違う表記をしているので飛ばす
			if (preg_match("/contraction_change_date_.*/", $columns[$i])) {
				continue;
			}
			// 違う表記をしているので飛ばす
			if (preg_match("/contraction_change_outline_.*/", $columns[$i])) {
				continue;
			}
			$this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/th>/", $result);
		}
	}

	/**
	 * 編集画面に教員検索のボタンが表示されていること
	 */
	function testEdit() {
		$this->check_researcher_search($this->NedoJstOthers, "/test_nedo_jst_others/edit/1");
	}

	/**
	 * 編集時カラムのチェック
	 */
	function testEdit2() {
		// 管理者でログイン
		$this->login($this->NedoJstOthers, 1, "test_user");
		// 削除
		$url = "/test_nedo_jst_others/edit/1";
		$result = $this->testAction($url,
				array('method' => 'get', 'return' => 'contents'));

		// 表示フィールドの検証
		$columns = $this->NedoJstOther->file_columns;
		for($i=0; $i<count($columns); $i++) {
			if($columns[$i] === "nedo_jst_other_id" || $columns[$i] === "id") {
				continue;
			}
			if(isset($this->NedoJstOther->output_column_label_alias[$columns[$i]])) {
				$str = $this->NedoJstOther->output_column_label_alias[$columns[$i]];
			} else {
				$str = __(Inflector::humanize($columns[$i]), true);
			}
			// 表記のゆらぎを修正
			if (preg_match("/contraction_change_date_.*/", $columns[$i])) {
				$str = mb_convert_kana($str, "rn");
			}
			// 表記のゆらぎを修正
			if (preg_match("/contraction_change_outline_.*/", $columns[$i])) {
				$str = mb_convert_kana($str, "rn");
			}
			$this->assertPattern("/<label.*".preg_quote($str, '/') . "<\/label>/", $result);
		}
	}

	// テスト用にデータを登録する
	function _addData($subject) {
		// 管理者でログイン
		$this->login($this->NedoJstOthers, 1, "test_user");
		// 追加画面へ行く
		$url = "/test_nedo_jstothers/add";

		$data = array(
			"NedoJstOther" => array(
				"year" => 2011,
				"subject" => $subject,
				"open_to_public" => 1,
				"disabled" => 0,
			),
		);
		$result = $this->testAction($url,
			array('return' => 'view', 'method' => 'post', 'data' => $data));
	}

	// テスト用にデータを編集する
	function _editNodeData($id, $subject) {
		// 管理者でログイン
		$this->login($this->NedoJstOthers, 1, "test_user");
		// 追加画面へ行く
		$url = "/test_nedo_jstothers/edit_node/".$id;

		$data = array(
			"NedoJstOther" => array(
				"year" => 2011,
				"subject" => $subject,
				"open_to_public" => 1,
				"disabled" => 0,
			),
		);
		$result = $this->testAction($url,
			array('return' => 'view', 'method' => 'post', 'data' => $data));
	}

	/**
	 * データ追加のテスト
	 */
	function testAdd() {
		$subject = "テスト研究" . date('Ymdhis');
		$this->_addData($subject);

		// データができているか確認
		$condition = array(
			"subject" => $subject,
		);
		$result = $this->NedoJstOther->find('all', array(
			'conditions' => $condition,
			'order' => 'id asc',
		));
		$this->assertTrue(count($result) == 2);
		$id_array = array(
			$result[0]["NedoJstOther"]["id"],
			$result[1]["NedoJstOther"]["id"],
		);

		// サマリーデータ
		$result = $this->Summary->find('all', array(
			'conditions' => $condition,
			'order' => 'id asc',
		));
		$this->assertTrue(count($result) == 2);
		$this->assertTrue($result[0]["Summary"]["model_parent_id"]  === NULL);
		$this->assertTrue($result[1]["Summary"]["model_parent_id"]  !== NULL);
		$this->assertTrue($result[0]["Summary"]["model_id"]  === $id_array[0]);
		$this->assertTrue($result[1]["Summary"]["model_id"]  === $id_array[1]);
	}

	/**
	 * データ編集のテスト：親子関係が1:1の場合
	 */
	function testEdit3() {
		$subject = "テスト研究親子関係1:1" . date('Ymdhis');
		$this->_addData($subject);

		// データができているか確認
		$condition = array(
			"subject" => $subject,
		);
		$result = $this->NedoJstOther->find('all', array(
			'conditions' => $condition,
			'order' => 'id asc',
		));
		$this->assertTrue(count($result) == 2);
		$id_array = array(
			$result[0]["NedoJstOther"]["id"],
			$result[1]["NedoJstOther"]["id"],
		);
		$this->_editNodeData($result[1]["NedoJstOther"]["id"], $subject);

		// サマリーデータ
		$result = $this->Summary->find('all', array(
			'conditions' => $condition,
			'order' => 'id asc',
		));
		$this->assertTrue(count($result) == 2);
		$this->assertTrue($result[0]["Summary"]["model_parent_id"]  === NULL);
		$this->assertTrue($result[1]["Summary"]["model_parent_id"]  !== NULL);
		$this->assertTrue($result[0]["Summary"]["model_id"]  === $id_array[0]);
		$this->assertTrue($result[1]["Summary"]["model_id"]  === $id_array[1]);
	}

	/**
	 * データ削除のテスト
	 */
	function testDelete() {
		$subject = "テスト研究削除" . date('Ymdhis');
		$this->_addData($subject);

		// データができているか確認
		$condition = array(
			"subject" => $subject,
		);
		$result = $this->NedoJstOther->find('all', array(
			'conditions' => $condition,
			'order' => 'id asc',
		));
		$this->assertTrue(count($result) == 2);
		$id_array = array(
			$result[0]["NedoJstOther"]["id"],
			$result[1]["NedoJstOther"]["id"],
		);


		// 削除
		$url = "/test_nedo_jst_others/delete/".$result[1]["NedoJstOther"]["id"];
		$result = $this->testAction($url,
				array('method' => 'get'));

		// サマリーデータ
		$result = $this->Summary->find('all', array(
			'conditions' => $condition,
			'order' => 'id asc',
		));
		$this->assertTrue(count($result) == 2);
		$this->assertTrue($result[0]["Summary"]["model_parent_id"]  === NULL);
		$this->assertTrue($result[1]["Summary"]["model_parent_id"]  !== NULL);
		$this->assertTrue($result[0]["Summary"]["model_id"]  === $id_array[0]);
		$this->assertTrue($result[1]["Summary"]["model_id"]  === $id_array[1]);
		$this->assertTrue($result[0]["Summary"]["disabled"]  == 0);
		$this->assertTrue($result[1]["Summary"]["disabled"]  == 1);
	}

	/**
	 * データ一覧ページ
	 */
	function testIndex() {
		// 管理者でログイン
		$this->login($this->NedoJstOthers, 1, "test_user");
		// 削除
		$url = "/test_nedo_jst_others/index";
		$result = $this->testAction($url,
				array('method' => 'get', 'return' => 'contents'));

		// 表示フィールドの検証
		$columns = $this->NedoJstOther->file_columns;
		for($i=0; $i<count($columns); $i++) {
			if($columns[$i] === "nedo_jst_other_id") {
				continue;
			}
			if(isset($this->NedoJstOther->output_column_label_alias[$columns[$i]])) {
				$str = $this->NedoJstOther->output_column_label_alias[$columns[$i]];
			} else {
				$str = __(Inflector::humanize($columns[$i]), true);
			}
			// 表記のゆらぎを修正
			if (preg_match("/contraction_change_date_.*/", $columns[$i])) {
				$str = mb_convert_kana($str, "rn");
			}
			// 表記のゆらぎを修正
			if (preg_match("/contraction_change_outline_.*/", $columns[$i])) {
				$str = mb_convert_kana($str, "rn");
			}

			$this->assertPattern("/<th.*".preg_quote($str, '/') . "<\/a><\/th>/", $result);
		}
	}

	/**
	 * アップロード画面に空きIDの表示があるか
	 */
	function testUploadAvailableId() {
		// 管理者でログイン
		$this->login($this->NedoJstOthers, 1, "test_user");
		// アップロード画面
		$url = "/test_nedo_jst_others/upload";
		$result = $this->testAction($url,
				array('method' => 'get', 'return' => 'contents'));
		$this->assertPattern("/空きID\(先頭\): \d/", $result);
	}

	/**
	 * Excelダウンロードのテスト
	 * @return <type>
	 */
//	function testOutputExcel() {
//		$this->login($this->NedoJstOthers, 1, "test_user");
//		ob_start();
//		$result = $this->testAction("/test_nedo_jst_others/output_excel/format:Excel5", array('method' => 'get', 'return' => 'result'));
//		$result = ob_get_contents();
//		ob_end_clean();
//		$this->assertTrue(strlen($result) > 0);
//		$fileName = tempnam(sys_get_temp_dir(), "");
//		file_put_contents($fileName, $result);
//
//		App::import('vendor', 'phpexcel/phpexcel');
//		$reader = PHPExcel_IOFactory::createReader("Excel5");
//		try {
//			$objExcel = $reader->load($fileName);
//			$this->assertTrue(get_class($objExcel) == "PHPExcel");
//		} catch (Exception $e) {
//			$this->assertTrue($e == null);
//			return false;
//		}
//	}

}

?>
