<?php

/**
 * Excelファイルを直接DBに放り込むシェル
 */

App::import("Component", "Auth");
App::import("Component", "Acl");

class BulkimportShell extends Shell
{

	var $uses = array('User');
	var $components = array("Auth", "Acl");
	var $header_alias = array(
		'id' => array('ID', 'Id'),
		'東工大連携Id' => array('東工大連携ID'),
		'原義番号' => array('原議番号'),
		'本年度入金' => array('21入金'),
		'氏名' => array('教員名', '研究者氏名'),
		'職名' => array('職'),
		'部局名' => array('所属部局名', '部局'),
		'専攻名' => array('専攻等名'),
		'ポスト番号' => array('M-Box'),
		'メール' => array('E-mail', 'Ｅ－ｍａｉｌ', 'メールアドレス'),
		'申込機関1' => array('申込機関①'),
		'申込機関2' => array('申込機関②'),
		'機関代表者住所' => array('機関代表住所'),
		'本年度光熱水料' => array('本年度光熱水量'),
		'本年度合計' => array('本年度総計'),
		'実績報告書受付日' => array('実績報告受付日'),
		'分配金実配分額' => array('分配金配分額'),
		'新/継' => array('新・継'),
		'代表者名' => array('研究代表者'),
		'通知部局名' => array('通知部局'),
		'統計部局名' => array('統計部局', '所属部局（統計）'),
		'専攻名' => array('専攻等'),
		'内線' => array('内線番号'),
		'ＦＡＸ' => array('ＦＡＸ番号', 'FAX番号', 'FAX'),
		'入金年月日' => array('入金日'),
		'PJコード' => array('プロジェクトコード'),
		'PJコード名称長' => array('プロジェクトコード名称長'),
		'契約締結日' => array('契約日'),
		'受入研究者' => array('指導教員', '氏名'),
	);
	var $debug_print = false;
	var $column_moving_history = array();

	function initialize()
	{
		parent::initialize();
		$this->Auth = &new AuthComponent();
		$this->Acl = &new AclComponent();
		$this->User = &new User();
		$this->User->Aro = new Aro();
		ini_set('memory_limit', "2048M");
	}

	function main()
	{
		if(count($this->args) < 2) {
			echo "cake bulkimport ファイル名 モデル名";
			return;
		}
		// ファイル名
		$filename = $this->args[0];
		var_dump($filename);
		if (!file_exists($filename)) {
			echo "ファイルが見つかりません\n";
			return;
		}
		// モデル名
		$modelname = $this->args[1];

		$primaryKey = "id";
		$ids = $this->_registerUploadFile($filename, $modelname, $primaryKey, $message, $error_message);
		var_dump($ids);
		var_dump($message);
		foreach($this->column_moving_history as $h) {
			echo $h . "\n";
		}
	}

	function _processExcel($filename, &$header, &$body, $format)
	{
		ini_set("max_execution_time", 0);

		App::import('vendor', 'phpexcel/phpexcel');

		if (empty($filename) || !file_exists($filename)) {
			return false;
		}
		//Excel
		$reader = PHPExcel_IOFactory::createReader($format);
		try {
			$objExcel = $reader->load($filename);
		} catch (Exception $e) {
			echo (__('File can not be read. Please confirm file type.', true));
			return false;
		}
		$objExcel->setActiveSheetIndex(0);
		$worksheet = $objExcel->getActiveSheet();

		echo "Excelファイル読込中\n";

		foreach ($worksheet->getRowIterator() as $row) {
			echo ".";
			$tmp = array();
			$cellite = $row->getCellIterator();
			$cellite->setIterateOnlyExistingCells(false);
			foreach ($cellite as $cell) {
				if (!is_null($cell)) {
					$string_value = (string) $cell->getCalculatedValue();
					$tmp[] = $string_value;
				} else {
					$tmp[] = "";
				}
			}
			if (1 == $row->getRowIndex()) {
				for ($i = 0; $i < count($tmp); $i++) {
					$str = $tmp[$i];
					$str = str_replace("\r", "", $str);
					$str = str_replace("\n", "", $str);
					$str = trim($str);
					$tmp[$i] = $str;
				}
				$header = $tmp;
			} else {
				// もし行が空白のみならスキップする
				$is_empty_line = true;
				foreach ($tmp as $tmp_item) {
					if (trim($tmp_item) != "") {
						$is_empty_line = false;
					}
				}
				if (!$is_empty_line) {
					$body[] = $tmp;
				} else {
					$this->echo_log("空行なので登録をスキップします", LOG_DEBUG);
				}
			}
			unset($row); // メモリ解放
		}
		return true;
	}

	function _registerUploadFile($filename, $modelname, $primaryKey, &$message, &$error_message)
	{
        $rec = $this->User->read(null, 1);
        User::store($rec);

		App::import("Model", $modelname);
		$this->$modelname = new $modelname;
		if($modelname == "AssessedContribution") {
			unset($this->$modelname->validate["titech_assignment_no"]["isUnique"]);
			unset($this->$modelname->validate["titech_assignment_no"]["alphaNumericHyphen"]);
		}
		if($modelname == "Encourage") {
			unset($this->$modelname->validate["mobile_phone"]["numericHyphen"]);
			unset($this->$modelname->validate["extension"]["numericHyphen"]);
			unset($this->$modelname->validate["email"]["email"]);
			unset($this->$modelname->validate["received_researcher_email"]["email"]);
		}

		$message = "";
		$error_message = array();

		$upload_header = array();
		$body = array();
		// ファイル名からファイル形式を取得
		$format = $this->_filename2ExcelFormat($filename);
		$ret = $this->_processExcel($filename, $upload_header, $body, $format);
		if (!$ret) {
			return false;
		}
		$proper_header = $this->$modelname->getFileHeader();

		$header_is_same = $this->_headerEquals($proper_header, $upload_header);

		if (!$header_is_same) {
			$this->echo_log(array_diff($proper_header, $upload_header), LOG_INFO);
			$message
				= __('There is no header record or does not match column count.', true);
			return false;
		}

		$success_count = 0;
		$line = 0;
		$rollback = false;
		$registered_ids = array();

		echo "データベースへ登録中\n";

		$this->$modelname->begin();
		foreach ($body as $item) {
			$line++;
			$tmp = $this->$modelname->columns2data($item, $modelname);
			$this->data[$modelname] = $tmp[$modelname];

			// 例外データのクリーニング
			$this->_clean_data();

			$this->$modelname->recursive = -1;
			$this->$modelname->switchPrimaryKey();
			$this->$modelname->$primaryKey = null;
			$func = "findAllBy" . Inflector::camelize($primaryKey);

			$rec = $this->$modelname->$func($this->data[$modelname][$primaryKey]);
			if($this->debug_print) {
				$this->echo_log("データ抽出メソッドは" . $func . "です", LOG_DEBUG);
			}
			if (!$rec) {
				if($this->debug_print) {
					$this->echo_log("新規に" . $modelname . "を作成します", LOG_DEBUG);
				}
				$this->$modelname->create();
				$create = true;
			} else {
				$this->$modelname->$primaryKey = $this->data[$modelname][$primaryKey];
				if($this->debug_print) {
					$this->echo_log(
						"既にレコードがあるので" . $modelname . "を更新します. primarykey=" .
						$primaryKey . " データ=" . print_r($this->data, true), LOG_DEBUG);
				}
				$create = false;
			}
			if (!$this->$modelname->save($this->data)) {
				echo "F";
				$error_message[] = array(
					"line" => $line + 1,
					"error" => $this->$modelname->validationErrors,
				);
				$this->echo_log("データの保存に失敗しました。ID=" . @$this->data[$modelname]["id"]);
				$this->echo_log($this->$modelname->validationErrors, LOG_DEBUG);
			} else {
				echo ".";
				if ($create) {
					$last_id = $this->$modelname->getLastInsertID();
				} else {
					$last_id = $this->data[$modelname][$primaryKey];
				}
				// 更新したID
				$registered_ids[] = $last_id;
				$success_count++;
				if($this->debug_print) {
					$this->echo_log("登録成功件数：" . $success_count, LOG_DEBUG);
				}
			}
		}
		if ($line - $success_count >= Configure::read('Upload.stop_count')) {
			$rollback = true;
			$this->$modelname->rollback();
			$registered_ids = array();
		} else {
			$this->$modelname->commit();
		}

		if ($rollback) {
			$message
				= sprintf(__('Total %d records. %d records are invalid! rollback', true), $line, $line - $success_count);
			return false;
		} else {
			if ($line - $success_count == 0) {
				$message
					= sprintf(__('Total %d records. %d records have been imported!', true), $line, $success_count);
			} else {
				$message
					= sprintf(__('Total %d records. %d records have been imported. but %d records failed to insert or update.', true), $line, $success_count, $line - $success_count);
			}
		}
		return $registered_ids;
	}

	function _filename2ExcelFormat($filename)
	{
		$file_info = pathinfo($filename);
		$extension = @$file_info['extension'];
		$this->echo_log("ファイル名は" . $filename . " 拡張子は" . $extension, LOG_DEBUG);

		if (strtolower($extension) == "xlsx") {
			return "Excel2007";
		} else {
			return "Excel5";
		}
	}

	function echo_log($message, $mode = "")
	{
		if(is_array($message)) {
			var_dump($message);
		} else {
			echo $message . "\n";
		}
	}

	function _headerEquals($proper_header, $upload_header)
	{
		$header_is_same = true;
		for ($i = 0; $i < count($proper_header); $i++) {
			$p_str = $proper_header[$i];
			$u_str = @$upload_header[$i];
			$p_str = str_replace(" ", "", $p_str);
			$u_str = str_replace(" ", "", $u_str);
			$p_str = str_replace("　", "", $p_str);
			$u_str = str_replace("　", "", $u_str);
			// カラム名が異なる場合はaliasもチェックする
			if ($p_str != $u_str) {
				$alias = @$this->header_alias[$p_str];
				if (is_array($alias) && in_array($u_str, $alias)) {
					$header_is_same = true;
				} else {
					$this->echo_log("[" . $u_str . "]のカラム名が一致しません", LOG_DEBUG);
					$header_is_same = false;
					break;
				}
			}
		}
		return $header_is_same;
	}

	function _clean_data() {
		// 例外処理
		if (isset($this->data["MhlwResearchGrant"]["this_year_application_amount"]) &&
			!is_numeric($this->data["MhlwResearchGrant"]["this_year_application_amount"])) {
			$this->data["MhlwResearchGrant"]["this_year_application_amount"] = null;
		}
		// Adoption
		// TODO: 入れる備考フィールドは項目によって異なるので対応する
		$adp_datecols = array(
			'appointment_date' => "remarks1",
        	'decision_date' => "remarks1",
        	'payment_date' => "remarks1",
        	'advance_application_reception_date' => "remarks1",
        	'grant_reception_date' => "remarks_issue_application",
        	'achievement_report_reception_date' => "achievement_remarks",
        	'achievement_carried_report_reception_date' => "process_carried_remarks",
        	'self_assessment_date' => "self_assessment_remarks",
        	'accomplishment_date' => "accomplishment_remarks",
        	'process_date' => "accomplishment_remarks",
        	'accomplishment_scheduled_date' => "accomplishment_remarks",
		);
		foreach ($adp_datecols as $col => $rem) {
			if (isset($this->data["Adoption"][$col]) &&
				!preg_match("/[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}/", $this->data["Adoption"][$col])) {
				if($col == "achievement_report_reception_date") {
					$coltitle = "実績報告書受付日";
				} else {
					$coltitle = __(Inflector::humanize($col), true);
				}
				// メモフィールドに移動
				$this->data["Adoption"][$rem] .= "\n" .
					$coltitle .
					":".
					$this->data["Adoption"][$col];

				// ログ出力
				$mes = __("Adoption", true) . "のID:" . $this->data["Adoption"]["id"] . "において" .
					"項目：" .
					__(Inflector::humanize($col), true) . "の値：" .
					$this->data["Adoption"][$col] . " を項目：" .
					__(Inflector::humanize($rem), true) . " に移動しました";
				$this->column_moving_history[] = $mes;

				$this->data["Adoption"][$col] = null;
			}
		}
		$adp_numcols = array(
			"achievement_indirect_cost" => "achievement_remarks",
			"contribution_amount" => "contribution_remarks",
			"achievement_primary_cost" => "achievement_remarks",
			"achievement_detail_goods_cost" => "achievement_remarks",
			"achievement_detail_travel_cost" => "achievement_remarks",
			"achievement_detail_gratuity_cost" => "achievement_remarks",
			"achievement_detail_other_cost" => "achievement_remarks",
		);
		foreach ($adp_numcols as $col => $rem) {
			if (isset($this->data["Adoption"][$col])) {
				$s = $this->data["Adoption"][$col];
				$s = str_replace(" ", "", $s);
				$s = str_replace("　", "", $s);
				$this->data["Adoption"][$col] = $s;
				if($s != "" && !is_numeric($s)) {
					// メモフィールドに移動
					$this->data["Adoption"][$rem] .= "\n" . 
							__(Inflector::humanize($col), true) .
							":".
							$this->data["Adoption"][$col];

					// ログ出力
					$mes = __("Adoption", true) . "のID:" . $this->data["Adoption"]["id"] . "において" .
						"項目：" .
						__(Inflector::humanize($col), true) . " の値：" .
						$this->data["Adoption"][$col] . " を項目：" .
						__(Inflector::humanize($rem), true) . " に移動しました";
					$this->column_moving_history[] = $mes;

					$this->data["Adoption"][$col] = null;
				}
			}
		}
		// AssessedContribution
		// request_transfer(振込み依頼書)→remarks_distributed_change_process
		$ass_datecols = array(
			'request_transfer' => "remarks_distributed_change_process",
			'recovery_date' => "remarks_distributed_change_process",
		);
		foreach ($ass_datecols as $col => $rem) {
			if (isset($this->data["AssessedContribution"][$col]) &&
				!preg_match("/[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}/", $this->data["AssessedContribution"][$col])) {
				// メモフィールドに移動
				$this->data["AssessedContribution"][$rem] .= "\n" .
					__(Inflector::humanize($col), true) .
					":".
					$this->data["AssessedContribution"][$col];

				// ログ出力
				$mes = __("AssessedContribution", true) . "のID:" . $this->data["AssessedContribution"]["id"] . "において" .
					"項目：" .
					__(Inflector::humanize($col), true) . " の値：" .
					$this->data["AssessedContribution"][$col] . " を項目：" .
					__(Inflector::humanize($rem), true) . " に移動しました";
				$this->column_moving_history[] = $mes;

				$this->data["AssessedContribution"][$col] = null;
			}
		}

		// Encourage
		$enc_datecols = array(
			'achievement_report_reception_date' => "achievement_remarks",
			'achievement_carried_report_reception_date' => 'remarks_carried',
			'appointment_date' => 'remarks',
			'issue_application_reception_date' => 'issue_application_remarks',
			'research_plan_reception_date' => 'remarks',
			'acceptance_application_reception_date' => 'achievement_remarks',
			'recruit_start_date' => 'remarks',
			'recruit_end_date' => 'remarks',
			'acceptance_statement' => "achievement_remarks",
		);
		foreach ($enc_datecols as $col => $rem) {
			if (isset($this->data["Encourage"][$col]) &&
				!preg_match("/[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}/", $this->data["Encourage"][$col])) {
				// メモフィールドに移動
				$this->data["Encourage"][$rem] .= "\n" .
					__(Inflector::humanize($col), true) .
					":".
					$this->data["Encourage"][$col];

				// ログ出力
				$mes = __("Encourage", true) . "のID:" . $this->data["Encourage"]["id"] . "において" .
					"項目：" .
					__(Inflector::humanize($col), true) . " の値：" .
					$this->data["Encourage"][$col] . " を項目：" .
					__(Inflector::humanize($rem), true) . " に移動しました";
				$this->column_moving_history[] = $mes;

				$this->data["Encourage"][$col] = null;
			}
		}
		$enc_numcols = array(
			"achievement_detail_goods_cost" => "achievement_remarks",
			"achievement_detail_travel_cost" => "achievement_remarks",
			"achievement_detail_gratuity_cost" => "achievement_remarks",
			"achievement_detail_other_cost" => "achievement_remarks",
			'turnback_amount' => 'remarks_balance_fixed_turnback',
		);
		foreach ($enc_numcols as $col => $rem) {
			if (isset($this->data["Encourage"][$col])) {
				$s = $this->data["Encourage"][$col];
				$s = str_replace(" ", "", $s);
				$s = str_replace("　", "", $s);
				$this->data["Encourage"][$col] = $s;
				if($s != "" && !is_numeric($s)) {
					if($col == "turnback_amount") {
						$coltitle = "返還額(残額)";
					} else {
						$coltitle = __(Inflector::humanize($col), true);
					}
					// メモフィールドに移動
					$this->data["Encourage"][$rem] .= "\n" .
							$coltitle .
							":".
							$this->data["Encourage"][$col];

					// ログ出力
					$mes = __("Encourage", true) . "のID:" . $this->data["Encourage"]["id"] . "において" .
						"項目：" .
						__(Inflector::humanize($col), true) . " の値：" .
						$this->data["Encourage"][$col] . " を項目：" .
						__(Inflector::humanize($rem), true) . "に移動しました";
					$this->column_moving_history[] = $mes;

					$this->data["Encourage"][$col] = null;
				}
			}
		}
		if (isset($this->data["Encourage"]["major"]) && $this->data["Encourage"]["major"] === "#REF!") {
			$this->data["Encourage"]["major"] = "";
		}
	}
}
?>