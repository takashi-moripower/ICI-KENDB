<?php

/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link	  none
 */

/**
 * AppController
 *
 * Long description for class (if any)...
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
class AppController extends Controller
{

	var $components = array('Acl', 'Auth', 'RequestHandler', 'Session', 'Cookie');

    // ヘルパー (http://book.cakephp.org/1.3/ja/The-Manual/Developing-with-CakePHP/Helpers.html#id1 )
	var $helpers = array('Html', 'Form', 'Javascript', 'Session',
                         'KendbForm',       // app/views/helpers/kendb_form.php
                         'Kendb',           // app/views/helpers/kendb.php
                         'DatePicker',      // app/views/helpers/date_picker.php
                         'Access');         // app/views/helpers/access.php

	var $uses = array('User', 'EditStatus', 'History', 'Researcher');
	var $crumbList = array();

	/**
	 * Auth Component
	 * @var AuthComponent
	 */
	var $Auth;
	/**
	 * User model
	 * @var User
	 */
	var $User;
	/**
	 * ACLをチェックするaction名の配列
	 * @var array
	 */
	var $check_action = array();
	/**
	 * グローバルナビのACLチェック
	 */
	var $nav = array(
		"entrusts" => array("index", "add", "upload", "update_researcher", "manage", "delete_all"),
		"nedojstothers" => array("index", "add", "upload", "update_researcher", "manage", "delete_all"),
		"contracts" => array("index", "add", "upload", "update_researcher", "delete_all"),
		"grants" => array("index", "add", "upload", "update_researcher", "delete_all"),
		"donations" => array("index", "add", "upload", "update_researcher", "manage", "delete_all"),
		"encourages" => array("index", "add", "upload", "update_researcher", "delete_all"),
		"otherresearchgrants" => array("index", "add", "upload", "update_researcher", "delete_all"),
		"mhlwresearchgrants" => array("index", "add", "upload", "update_researcher", "delete_all"),
		"adoptions" => array("index", "add", "upload", "update_researcher", "delete_all"),
		"assessedcontributions" => array("index", "add", "upload", "update_researcher", "delete_all"),
		"researchers" => array("index", "upload"),
	);

	var $excel_output_max_count = 1000;

	/**
	 * ヘッダー文字列のゆらぎ
	 *
	 * 正しい項目名→ゆらぎ文字列名
	 *
	 * @var array
	 */
	var $header_alias = array(
		'id' => array('ID', 'Id'),
		'プロジェクトレコードID' => array('親データID', 'PJレコードID', 'プロジェクトデータID', 'PJデータID'),
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
		'専攻名' => array('専攻等','専攻名（受入研究者）'),
		'内線' => array('内線番号'),
		'ＦＡＸ' => array('ＦＡＸ番号', 'FAX番号', 'FAX'),
		'入金年月日' => array('入金日'),
		'PJコード' => array('プロジェクトコード'),
		'PJコード名称長' => array('プロジェクトコード名称長'),
		'契約締結日' => array('契約日'),
		'受入研究者' => array('指導教員','氏名'),
		'大学収益化額' => array('間接経費（大学収益化額）'),
		'研究室収益化額' => array('間接経費（研究室配当分）'),
		'成果報告書先方様式' => array('成先方様式'),
	);


	var $paginate = array();

	/**
	 * __construct
	 *
	 * @return None
	 */
	function __construct()
	{

		if (Configure::read('Config.debug') != "0") {
			//array_push($this->components, 'DebugKit.Toolbar');
		}
		// もしACL管理コンポーネント以外だったら、SessionAclを読み込む
		if (!in_array($this->name, array("Acl", "Acos", "Aros"))) {
			$this->components[] = "SessionAcl";
		}

		parent::__construct();
	}

	/**
	 * beforeFilter
	 *
	 * @return none
	 */
	function beforeFilter()
	{
		if (isset($this->Auth)) {
			$this->Auth->authorize = 'actions';
			$this->Auth->userScope = array("User.disabled" => 0);
			$this->Auth->loginAction = "/users/login";
			$this->Auth->loginError = __("Invalid username or password", true);
			$this->Auth->authError = __('You have no privileges', true);
			$this->Auth->loginRedirect = "/users/index";
			$this->Auth->userModel = "User";
			$this->Auth->fields = array(
				"username" => "username", "password" => "password");
			$this->Auth->autoRedirect = true;

			// 以下美しくないので修正する
			$login_user = $this->Auth->User();
			$this->set('login_user', $login_user['User']);

			$user_option = @$this->User->findById($this->Auth->user('id'));
			$this->set("user_option", @$user_option["User"]);
		}

		// ユーザー情報を保存
		App::import('Model', 'User');
		User::store($this->User->findById($this->Auth->user("id")));

		// ACLをチェックして遷移可能かどうかをViewに渡す
		foreach ($this->check_action as $c) {
			$cname = Inflector::humanize($this->name);
			$check = @$this->Acl->check($this->Auth->user(), $cname . "/" . $c);
			$this->set("can_" . $c, $check);
		}

		// ACLを設定
		foreach ($this->nav as $k => $v) {
            // $d = json_encode($v);           //HDKNR
            // $this->log("@@@@--- beforeFilter = {$this->action}: ACL {$k} -> {$d}", LOG_DEBUG); // HDKNR
			foreach ($v as $act) {
				$c = @$this->Acl->check($this->Auth->user(), $k . "/" . $act);
				$this->set("can_" . $k . "_" . $act, $c);
			}
		}

		// 年度パラメータがある場合は前後関係を判定する
		isset ($this->passedArgs['year_f']) ? $year_f = $this->passedArgs['year_f'] : $year_f = null;
		isset ($this->passedArgs['year_t']) ? $year_t = $this->passedArgs['year_t'] : $year_t = null;
		if (isset($year_f) && isset($year_t) && $year_f > $year_t) {
			$this->passedArgs['year_t'] = $year_f;
			$this->passedArgs['year_f'] = $year_t;
		}

	}

	/**
	 * isAuthorized
	 *
	 * @return none
	 */
	function isAuthorized()
	{
        $this->log("@@@@ Action = {$this->action}", LOG_DEBUG);

		if (get_class($this) == 'XmlRpcController') {
			return true;
		}

		$check = array('UsersController');
		if (in_array(get_class($this), $check)) {
			if ($this->action == 'admin_delete') {
				if ($this->Auth->user('admin') == 1) {
					return true;
				} else {
					return false;
				}
			}
		}
		return true;
	}

	/**
	 * beforeRender()
	 *
	 * @return none
	 */
	function beforeRender()
	{
		parent::beforeRender();

		$item = "";
		switch ($this->action) {
			case "edit":
				$item = "編集";
				break;
			case "add":
				$item = "追加";
				break;
			case "delete":
				$item = "削除";
				break;
			case "upload":
				$item = "一括アップロード";
				break;
			case "view":
				$item = "詳細";
				break;
			case "search":
				$item = "検索";
				break;
		}
		if ($item) {
			$current = array(
				$item,
				array(),
				array(),
			);
			array_push($this->crumbList, $current);
		}
		$this->set("crumbList", $this->crumbList);
	}

	/**
	 * _redirect
	 *
	 * @param string $url target_url
	 *
	 * @return none
	 */
	function _redirect($url)
	{
		$return_url = @$this->params['url']['return_url'];
		if ($return_url != "") {
			header("Location: " . urldecode($return_url));
			exit;
		} else {
			$this->redirect($url);
		}
	}

	/**
	 * 本来のヘッダー情報とアップロードされたヘッダー情報が同一か確認する
	 *
	 * @param array $proper_header 想定されるヘッダー
	 * @param array $upload_header アップロードされたヘッダー
	 *
	 * @return boolean
	 */
	function _headerEquals($proper_header, $upload_header)
	{
		//$this->log('in:_headerEquals', LOG_DEBUG);
		$header_is_same = true;
		for ($i = 0; $i < count($proper_header); $i++) {
			$p_str = $proper_header[$i];
			$u_str = @$upload_header[$i];
			$p_str = str_replace(" ", "", $p_str);
			$u_str = str_replace(" ", "", $u_str);
			$p_str = str_replace("　", "", $p_str);
			$u_str = str_replace("　", "", $u_str);
			// カラム名が異なる場合はaliasもチェックする
			//$this->log("header: expected=$p_str, actual=$u_str", LOG_DEBUG);
			if ($p_str != $u_str) {
				$alias = @$this->header_alias[$p_str];
				if (is_array($alias) && in_array($u_str, $alias)) {
					$header_is_same = true;
				} else {
					$this->log("[" . $u_str . "]のカラム名が一致しません", LOG_DEBUG);
					$header_is_same = false;
					break;
				}
			}
		}
		//$this->log('out:_headerEquals $header_is_same='.var_export($header_is_same, true), LOG_DEBUG);
		return $header_is_same;
	}

	/**
	 * Excelファイルを読み込み、ヘッダーと本体を解析する
	 *
	 * @param string $filename 読み込むファイル名
	 * @param array  &$header  ヘッダー部
	 * @param array  &$body	データ本体部
	 * @param string $format   ファイル形式
	 *
	 * @return <type>
	 */
	function _processExcel($filename, &$header, &$body, $format)
	{
		//$this->log('in:_processExcel', LOG_DEBUG);

		ini_set("max_execution_time", 0);

		App::import('vendor', 'phpexcel/phpexcel');

		if (empty($filename) || !file_exists($filename)) {
			$this->Session->setFlash(__('File is not uploaded.', true));
			return false;
		}
		//Excel
		$reader = PHPExcel_IOFactory::createReader($format);
		try {
			if($format == 'CSV'){
				$reader->setInputEncoding('SJIS');
			}
			$objExcel = $reader->load($filename);
		} catch (Exception $e) {
			$this->Session->setFlash(__('File can not be read. Please confirm file type.', true));
			return false;
		}
		$objExcel->setActiveSheetIndex(0);
		$worksheet = $objExcel->getActiveSheet();

		foreach ($worksheet->getRowIterator() as $row) {
			$tmp = array();
			$cellite = $row->getCellIterator();
			$cellite->setIterateOnlyExistingCells(false);
			foreach ($cellite as $cell) {
				if (!is_null($cell)) {
					try {
						$string_value = (string) $cell->getCalculatedValue();
					} catch(Exception $e) {
						$this->Session->setFlash("Excelシートの値を取得できません。外部参照等が無いか確認してください");
						return false;
					}
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
		if(!$is_empty_line) {
					$body[] = $tmp;
		} else {
			$this->log("空行なので登録をスキップします", LOG_DEBUG);
		}
			}
		}

		// $this->log('out:_processExcel', LOG_DEBUG);
		return true;
	}

	/**
	 * Excelファイルを出力
	 *
	 * @param PHPExcel_IOFactory $writer   Excel出力用Writerオブジェクト
	 * @param string			 $filename 出力ファイル名
	 *
	 * @return None
	 */
	function _processExcelDownload($writer, $filename)
	{
		$this->log("ダウンロード処理開始...", LOG_INFO);
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $filename);
		header("Content-Transfer-Encoding: binary");
		$writer->save('php://output');
		$this->log("ダウンロード処理終了...", LOG_INFO);
		// exitしないとPHPExcelでExcel2007形式の場合のみエラーになるため
		exit;
	}

	/**
	 * CSVファイルを出力
	 *
	 * @param PHPExcel_IOFactory $writer   Excel出力用Writerオブジェクト
	 * @param string			 $filename 出力ファイル名
	 *
	 * @return None
	 */
	function _processCSVDownload($csv_string, $filename)
	{
		$this->log("ダウンロード処理開始...", LOG_INFO);
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $filename);
		header("Content-Transfer-Encoding: binary");
		// $csv_string = mb_convert_encoding($csv_string, "Shift_JIS", "UTF-8");
		$csv_string = mb_convert_encoding($csv_string, "SJIS-win", "UTF-8");
		echo $csv_string;
		$this->log("ダウンロード処理終了...", LOG_INFO);
		// exitしないとPHPExcelでExcel2007形式の場合のみエラーになるため
		exit;
	}

	/**
	 * Excelファイルやシート名の禁則文字を処理する
	 *
	 * @param string $name シート名やファイル名
	 *
	 * @return string 変換後のシート名やファイル名
	 */
	function _makeExcelSheetName($name)
	{
		$search = array(
			':', '\\', '/', '?', '*', '[', ']',
		);
		return str_replace($search, "_", $name);
	}

	/**
	 * CSVに一括出力する
	 *
	 * @param string $modelname モデル名
	 * @param array  $datalist  findやpaginateした結果
	 *
	 * @return None
	 */
	function _makeCSVObject($modelname, $datalist)
	{
		Configure::write("debug", 0);

		$columns = $this->$modelname->file_columns;

		$lines = array();
		$one_line = "";
		for ($i = 0; $i < count($columns); $i++) {
			$is_replace = false;

			// カラムに別名があった場合の対応
			foreach ($this->$modelname->output_column_label_alias as $k => $v) {
				if ($k == $columns[$i]) {
					$col_label = $v;
					$is_replace = true;
					//break;
				}
			}
			if (!$is_replace) {
				$col_label = __(Inflector::humanize($columns[$i]), true);
			}
			$col_label = str_replace('"', '""', $col_label);
			$one_line .= '"' . $col_label . '",';
		}
		$lines[] = $one_line;

		$row = 1;
		foreach ($datalist as $item) {
			$one_line = "";
			$row++;
			for ($i = 0; $i < count($columns); $i++) {
				$str = $item[$modelname][$columns[$i]];
				if (in_array($columns[$i], $this->$modelname->date_columns)) {
					if ($str == "0000-00-00") {
						$str = null;
					}
					if (!is_null($str)) {
						$str = date('Y/m/d', strtotime($str));
					}
				}

                // 対象外
                if ($columns[$i] == 'unaggregate' && $str == '0')
                    $str = '';

				$str = str_replace('"', '""', $str);
				$one_line .= '"' . $str . '",';
			}
			if ($row % 10 == 0) {
				$this->log("データ出力件数=" . $row, LOG_INFO);
			}
			$lines[] = $one_line;
		}

		// 末尾のカンマを除去して、改行を追加
		$csv_string = "";
		for ($i = 0; $i < count($lines); $i++) {
			$str = $lines[$i];
			$str = rtrim($str, ",");
			$str .= "\r\n";
			$csv_string .= $str;
		}

		$filename = $this->$modelname->download_file_prefix . date('YmdHis') . ".csv";

		$this->_processCSVDownload($csv_string, $filename);
	}

	/**
	 * Excelに一括出力する
	 *
	 * @param string $modelname モデル名
	 * @param array  $datalist  findやpaginateした結果
	 * @param string $exceltype Excelの出力種別(Excel5かExcel2010)
	 *
	 * @return None
	 */
	function _makeExcelObject($modelname, $datalist, $exceltype = "Excel5")
	{
		Configure::write("debug", 0);
		App::import('vendor', 'phpexcel/phpexcel');
		$excel = new PHPExcel();
		// シートの設定
		$excel->setActiveSheetIndex(0);
		$sheet = $excel->getActiveSheet();
		$sheet->setTitle($this->_makeExcelSheetName(__($modelname, true)));
		$sheet->getDefaultStyle()->getFont()->setName('Arial');
		$sheet->getDefaultStyle()->getFont()->setSize(11);

		// セルのスタイル
		$cell_style = array(
			'borders' => array(
				'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
			)
		);

		$columns = $this->$modelname->file_columns;
		for ($i = 0; $i < count($columns); $i++) {
			$is_replace = false;

			// カラムに別名があった場合の対応
			foreach ($this->$modelname->output_column_label_alias as $k => $v) {
				if ($k == $columns[$i]) {
					$col_label = $v;
					$is_replace = true;
					//break;
				}
			}
			if (!$is_replace) {
				$col_label = __(Inflector::humanize($columns[$i]), true);
			}

			$sheet->setCellValueByColumnAndRow($i, 1, $col_label);
			// 以下の処理が非常に遅いため
			$sheet->getStyleByColumnAndRow($i, 1)->applyFromArray($cell_style);
			$sheet->getStyleByColumnAndRow($i, 1)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$sheet->getStyleByColumnAndRow($i, 1)->getFill()->getStartColor()->setARGB('FFCCFFCC');
			// $sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($i))->setAutoSize(true);
		}

		$row = 1;
		foreach ($datalist as $item) {
			$row++;
			for ($i = 0; $i < count($columns); $i++) {
				$str = $item[$modelname][$columns[$i]];
				if (in_array($columns[$i], $this->$modelname->date_columns)) {
					if ($str == "0000-00-00") {
						$str = null;
					}
					if (!is_null($str)) {
						$str = date('Y/m/d', strtotime($str));
					}
				}

                // 対象外
                if ($columns[$i] == 'unaggregate' && $str == '0')
                    $str = '';

				if (in_array($columns[$i], $this->$modelname->numeric_search_field) && !in_array($columns[$i], $this->$modelname->numeric_non_currency_field)) {
					$sheet->setCellValueExplicitByColumnAndRow($i, $row, $str, PHPExcel_Cell_DataType::TYPE_NUMERIC);
					$sheet->getStyleByColumnAndRow($i, $row)->getNumberFormat()->setFormatCode('#,##0;[Red]-#,##0');
				} else if (preg_match("/id$/", $columns[$i])) {
					if (isset($str)) {
						// _id の時は未設定の場合は値を表示しない
						$sheet->setCellValueExplicitByColumnAndRow($i, $row, $str, PHPExcel_Cell_DataType::TYPE_NUMERIC);
					}
				} else if (in_array($columns[$i], $this->$modelname->numeric_non_currency_field)) {
					$sheet->setCellValueExplicitByColumnAndRow($i, $row, $str, PHPExcel_Cell_DataType::TYPE_NUMERIC);
				} else {
					$sheet->setCellValueExplicitByColumnAndRow($i, $row, $str, PHPExcel_Cell_DataType::TYPE_STRING);
				}

				// 罫線　※非常に重たいので停止
				//$sheet->getStyleByColumnAndRow($i, $row)->applyFromArray($cell_style);
			}
			if ($row % 10 == 0) {
				$this->log("データ出力件数=" . $row, LOG_INFO);
			}
		}

		// Excel5 形式で出力
		if ($exceltype != "Excel5") {
			$exceltype = "Excel2007";
			$extension = ".xlsx";
		} else {
			$exceltype = "Excel5";
			$extension = ".xls";
		}

		unset($datalist);

		$writer = PHPExcel_IOFactory::createWriter($excel, $exceltype);
		$this->log("writer作成処理完了...", LOG_INFO);

		$filename = $this->$modelname->download_file_prefix . date('YmdHis') . $extension;

		$this->_processExcelDownload($writer, $filename);
	}

	/**
	 * 出力するExcelのファイル形式を取得する
	 *
	 * @param string $format 出力形式文字列
	 *
	 * @return string
	 */
	function _getExcelFormat($format = null)
	{
		if (!$format) {
			$format = @$this->passedArgs["format"];
		}
		if ($format != "Excel5") {
			$format = "Excel2007";
		} else {
			$format = "Excel5";
		}
		return $format;
	}

	/**
	 * ファイル名からエクセルファイルの形式を取得する
	 *
	 * @param string $filename ファイル名
	 *
	 * @return string ファイル形式
	 */
	function _filename2ExcelFormat($filename)
	{
		$file_info = pathinfo($filename);
		$extension = @$file_info['extension'];
		$this->log("ファイル名は" . $filename . " 拡張子は" . $extension, LOG_DEBUG);

		if (strtolower($extension) == "xlsx") {
			return "Excel2007";
		} else if(strtolower($extension) == "xls") {
			return "Excel5";
		} else if(strtolower($extension) == "csv") {
			return "CSV";
		} else {
			return null;
		}
	}

	/**
	 * passArgsからURL文字列を生成する
	 *
	 * @return string
	 */
	function _makePassArgsURLParam()
	{
		$param = "";
		foreach ($this->passedArgs as $key => $val) {
			$param .= "/" . $key . ":" . $val;
		}
		return $param;
	}

	/**
	 * アップロードされたExcelファイルを処理する
	 *
	 * @param string $modelname	  モデル名
	 * @param string $primaryKey	 プライマリキー
	 * @param string &$message	   メッセージ
	 * @param string &$error_message エラーの場合のメッセージ
	 *
	 * @return boolean
	 */
	function _registerUploadFile($modelname, $primaryKey, &$message, &$error_message)
	{
		$this->log('in:_registerUploadFile', LOG_DEBUG);

		$message = "";
		$error_message = array();

		$upload_header = array();
		$body = array();
		// ファイル名からファイル形式を取得
		$format = $this->_filename2ExcelFormat(@$this->data[$modelname]['upfile']['name']);
		$filename = @$this->data[$modelname]['upfile']['tmp_name'];

		$this->log("modelname=".var_export($modelname, true), LOG_DEBUG);
		$this->log("data=".var_export($this->data, true), LOG_DEBUG);

		$ret = $this->_processExcel($filename, $upload_header, $body, $format);
		if (!$ret) {
			return false;
		}

		$proper_header = $this->$modelname->getFileHeader();
		//$this->log("proper_header=".var_export($proper_header, true), LOG_DEBUG);
		//$this->log("upload_header=".var_export($upload_header, true), LOG_DEBUG);

		// 旧フォーマット対応
		//$this->log("file_columns=".var_export($this->$modelname->file_columns, true), LOG_DEBUG);
		$expectingNewFormat = in_array('institute_code', $this->$modelname->file_columns);
		$isNotNewFormat = !$this->_containsHeaderElement('institute_code', $upload_header);
		$spacerIndex = -1;
		if($expectingNewFormat && $isNotNewFormat){
			$this->log("*** OLD FORMAT ***", LOG_DEBUG);
			$this->_removeHeaderElement('institute_code', $proper_header);
			$this->_removeHeaderElement('school_code', $proper_header);
			$this->_removeHeaderElement('course_code', $proper_header);
			//$this->log("proper_header=".var_export($proper_header, true), LOG_DEBUG);

			$spacerIndex = array_search('institute_code', $this->$modelname->file_columns);
		}

		$header_is_same = $this->_headerEquals($proper_header, $upload_header);
		// $header_is_same = false;
		if (!$header_is_same) {
			$this->log(array_diff($proper_header, $upload_header), LOG_INFO);
			$message
				= __('There is no header record or does not match column count.', true);
			return false;
		}

		$success_count = 0;
		$line = 0;
		$rollback = false;
		$registered_ids = array();

		$this->$modelname->begin();
		foreach ($body as $item) {

            if ($spacerIndex > 0) {
                // 旧フォーマット対応
                array_splice($item, $spacerIndex, 0, array(null, null, null));
            }

            // $item は keyが データベースフィールド名」(major_nameとか) の辞書です
			$line++;
			$tmp = $this->$modelname->columns2data($item, $modelname);
			$this->data[$modelname] = $tmp[$modelname];
			$this->$modelname->recursive = -1;
			$this->$modelname->switchPrimaryKey();
			$this->$modelname->$primaryKey = null;
			$func = "findAllBy" . Inflector::camelize($primaryKey);

			$rec = $this->$modelname->$func($this->data[$modelname][$primaryKey]);
			$this->log("データ抽出メソッドは" . $func . "です", LOG_DEBUG);
			if (!$rec) {
				$this->log("新規に" . $modelname . "を作成します", LOG_DEBUG);
				$this->$modelname->create();
				$create = true;
			} else {
				$this->$modelname->$primaryKey = $this->data[$modelname][$primaryKey];
				$this->log(
					"既にレコードがあるので" . $modelname . "を更新します. primarykey=" .
					$primaryKey . " データ=" . print_r($this->data, true), LOG_DEBUG);
				$create = false;
			}

			$this->$modelname->beforeSave();
			if (!$this->$modelname->save($this->data)) {
				$this->log("failed to save.", LOG_DEBUG);
				$error_message[] = array(
					"line" => $line + 1,
					"error" => $this->validateErrors($this->$modelname),
				);
				$this->log($this->validateErrors($this->$modelname), LOG_DEBUG);
			} else {
				$this->log("model saved.", LOG_DEBUG);
				if ($create) {
					$last_id = $this->$modelname->getLastInsertID();
				} else {
					$last_id = $this->data[$modelname][$primaryKey];
				}
				// 更新したID
				$registered_ids[] = $last_id;
				$success_count++;
				$this->log("登録成功件数：" . $success_count, LOG_DEBUG);
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

		$this->log('out:_registerUploadFile', LOG_DEBUG);
		return $registered_ids;
	}

	/**
	 * ヘッダー配列に要素が存在するか確認
	 * @param string $code
	 * @param array $header
	 * @return bool
	 */
	function _containsHeaderElement($code, $header)
	{
		$headExp = __(Inflector::humanize($code), true);
		return in_array($headExp, $header);
	}

	/**
	 * ヘッダー配列から要素を除外する
	 * @param string $code
	 * @param array $header
	 */
	function _removeHeaderElement($code, &$header)
	{
		$headExp = __(Inflector::humanize($code), true);
		$index = array_search($headExp, $header);
		array_splice($header, $index, 1);
	}

	/**
	 * コピーして新規データを作成する
	 *
	 * @param string $modelname モデル名
	 * @param int	$id		コピー元データのID
	 *
	 * @return None
	 */
	function _copy($modelname, $id = null)
	{
		if (!$modelname) {
			$this->log("引数が足りません", LOG_DEBUG);
			$this->cakeError("error404");
			return;
		}

		// post時
		if (!empty($this->data)) {
			$this->$modelname->create();
			if ($this->$modelname->save($this->data)) {
				$this->Session->setFlash(
					sprintf(
						__('The %s has been saved', true),
						__(Inflector::humanize(Inflector::tableize($modelname)), true)));
				$this->redirect(array('action' => 'index'));
				return;
			} else {
				$this->Session->setFlash(
					sprintf(
						__('The %s could not be saved. Please, try again.', true),
						__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			}
		} else {
			$rec = $this->$modelname->read(null, $id);
			$this->data = $rec;
		}
		$this->render('add');
	}

	/**
	 * データを追加する
	 *
	 * @param string $modelname モデル名
	 *
	 * @return None
	 */
	function _add($modelname)
	{
		// 戻りURL
		$rtn = isset($_REQUEST["rtn"]) ? $_REQUEST["rtn"] :  null;
		$this->set("rtn", $rtn);

		if (!empty($this->data)) {
			$this->$modelname->create();
			if ($this->$modelname->save($this->data)) {
				$this->Session->setFlash(
					sprintf(__('The %s has been saved', true),
						__(Inflector::humanize(Inflector::tableize($modelname)), true)));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->set('validate_errors', $this->validateErrors($this->$modelname));
				$this->Session->setFlash(
					sprintf(__('The %s could not be saved. Please, try again.', true),
						__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			}
		}
		else {
			// 奨学寄付金と共同研究・受託研究の場合はStarSearchへの公開フラグをONにする
			if (!($modelname == "Donation" || $modelname == "Entrust")) {
				$this->data[$modelname]["open_to_public"] = 1;
			}
		}
	}

	/**
	 * データを編集する
	 *
	 * @param string $modelname 編集するモデル名
	 * @param int	$id		編集するデータのID
	 *
	 * @return None
	 */
	function _edit($modelname, $id)
	{
		// 戻りURL
		$rtn = isset($_REQUEST["rtn"]) ? $_REQUEST["rtn"] :  null;
		$this->set("rtn", $rtn);

		if (!$id && empty($this->data)) {
			$this->log("IDが指定されておらずPOSTでもないためエラー", LOG_DEBUG);
			$this->Session->setFlash(
				sprintf(__('Invalid %s', true),
					__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$save_id = $this->data[$modelname]["id"];
			$rec = $this->$modelname->findById($save_id);
			$this->$modelname->begin();
			$this->History->saveToHistory($modelname, $save_id, $rec);
			if ($this->$modelname->save($this->data)) {
				if ($this->$modelname->recalcNode($id)) {
					$this->Session->setFlash(
						sprintf(__('The %s has been saved', true),
							__(Inflector::humanize(Inflector::tableize($modelname)), true)));
					$this->$modelname->commit();
					$this->EditStatus->deleteStatus($modelname, $this->data[$modelname]["id"], $this->Auth->user('id'));
				} else {
					$this->$modelname->rollback();
					// ロールバック後に編集ステータスをクリア
					$this->EditStatus->deleteStatus($modelname, $this->data[$modelname]["id"], $this->Auth->user('id'));
					$this->Session->setFlash(
						sprintf(__('The %s could not be saved. Please, try again.', true),
							__(Inflector::humanize(Inflector::tableize($modelname)), true)));
				}
				if($rtn) {
					$this->redirect($rtn);
				} else {
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->$modelname->rollback();
				$this->set('validate_errors', $this->validateErrors($this->$modelname));
				$this->Session->setFlash(
					sprintf(__('The %s could not be saved. Please, try again.', true),
						__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			}
		}
		if (empty($this->data)) {
			$rec = $this->EditStatus->isCurrentEditing($modelname, $id);
			if ($rec) {
				$this->set("editinfo", $rec);
				$this->render("edit_conflict");
				return;
			}
			$this->log("GETで画面を表示する ID=" . $id, LOG_DEBUG);
			$this->data = $this->$modelname->read(null, $id);
		}
	}

	/**
	 * データを復元する
	 *
	 * @param string $modelname モデル名
	 * @param int	$id		復元するモデルのID
	 *
	 * @return None
	 */
	function _restore($modelname, $id)
	{
		if (!$id && empty($this->data)) {
			$this->log("IDが指定されておらずPOSTでもないためエラー", LOG_DEBUG);
			$this->Session->setFlash(
				sprintf(__('Invalid %s', true),
					__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$save_id = $this->data[$modelname]["id"];
			$rec = $this->$modelname->read(null, $save_id);
			$this->History->saveToHistory($modelname, $save_id, $rec);
			if ($this->$modelname->save($this->data)) {
				$this->Session->setFlash(
					sprintf(__('The %s has been saved', true),
						__(Inflector::humanize(Inflector::tableize($modelname)), true)));
				$this->EditStatus->deleteStatus($modelname, $this->data[$modelname]["id"], $this->Auth->user('id'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					sprintf(__('The %s could not be saved. Please, try again.', true),
						__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			}
		}
		if (empty($this->data)) {
			$this->log("GETで画面を表示する ID=" . $id, LOG_DEBUG);
			$this->data = $this->History->loadFromHistory($modelname, $id);
		}
		$this->render("edit");
	}

	function _delete_all($modelname)
	{
		$current_nendo = $this->$modelname->getCurrentNendo();
		$year_array = array();
		for ($i = $current_nendo; $i >= $current_nendo - 4; $i--)
		{
			$year_array[$i] = $i;
		}
		$this->set("year_array", $year_array);

		if (empty($this->data)) {
			$this->render("delete_all");
			return;
		}

		if (!empty($this->data[$modelname]["year"])) {
			$year = $this->data[$modelname]["year"];
			if(!in_array($year, $year_array))
			{
				$this->Session->setFlash("年が指定されていないか範囲外です");
			}
			$result = $this->$modelname->deleteByYear($year);
			if($result)
			{
				$this->Session->setFlash("データを削除しました");
			} else {
				$this->Session->setFlash("データの削除に失敗しました");
			}
			$this->redirect(array('action' => 'delete_all'));
		}
	}

	/**
	 * データを削除する
	 *
	 * @param string $modelname モデル名
	 * @param int	$id		削除対象データのID
	 *
	 * @return None
	 */
	function _delete($modelname, $id)
	{
		$this->log(sprintf("%sの%dを削除します", $modelname, $id), LOG_DEBUG);
		if (!$id) {
			$this->Session->setFlash(
				sprintf(__('Invalid id for %s', true),
					__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			$this->redirect(array('action' => 'index'));
		}
		$this->$modelname->delete($id);
		$rec = $this->$modelname->findById($id);
		$this->EditStatus->deleteStatus($modelname, $id, $this->Auth->user('id'));
		if ($rec && $rec[$modelname]["disabled"] == 1) {
			$this->Session->setFlash(
				sprintf(__('%s deleted', true),
					__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(
				sprintf(__('%s was not deleted', true),
					__(Inflector::humanize(Inflector::tableize($modelname)), true)));
			$this->redirect(array('action' => 'index'));
		}
	}

	/**
	 * ファイルをアップロードする
	 *
	 * @param string $modelname モデル名
	 * @param string $pkey	  プライマリーキー項目名
	 *
	 * @return None
	 */
	function _upload($modelname, $pkey)
	{
		if (!empty($this->data)) {
			$message = "";
			$error_message = array();
			$ids = $this->_registerUploadFile($modelname, $pkey, $message, $error_message);
			$this->set("message", $message);
			$this->set("error_message", $error_message);
			   $this->render("upload_result");
		} else {
			// get
			$this->set("next_id", $this->$modelname->getAvailableMinimumId());
		}
	}

	/**
	 * アップロードして子データを同時に作成する
	 *
	 * @param string $modelname	   モデル名
	 * @param string $pkey			プライマリーキー
	 * @param string $child_id_column 親IDを入れるカラム
	 *
	 *
	 * @return None
	 */
	function _uploadAndCreateNode($modelname, $pkey, $child_id_column)
	{
		if (!empty($this->data)) {
			$message = "";
			$error_message = array();
			$ids = $this->_registerUploadFile($modelname, $pkey, $message, $error_message);

			if (is_array($ids)) {
				foreach ($ids as $id) {
					$this->$modelname->recursive = 1;
					$this->$modelname->primaryKey = $pkey;
					$rec = $this->$modelname->read(null, $id);
					// 子ノードだったら何もしない
					if ($rec && !empty($rec[$modelname][$child_id_column])) {
						continue;
					}
					// 子ノード数が０だったら
					if (count($rec[$modelname . "Node"]) == 0) {
						$this->log("子ノード数が0なので自動生成します", LOG_DEBUG);
						$rec[$modelname][$child_id_column] = $rec[$modelname][$pkey];
						unset($rec[$modelname][$pkey]);
						$this->$modelname->create();
						$this->$modelname->save($rec);
					}
					// 子ノード数が１だったら親データで子を上書きする
					if (count($rec[$modelname . "Node"]) == 1) {
						// 子ノード取得
						$child_id = $rec[$modelname . "Node"][0]["id"];
						$this->$modelname->id = null;
						$this->$modelname->recursive = -1;
						$this->$modelname->primaryKey = "id";
						$child = $this->$modelname->read(null, $child_id);
						if ($child) {
							$this->log("子ノード数が1なので親データを子ノードにコピーします:".$modelname.":From".$id." :To:".$child_id, LOG_DEBUG);
							foreach($child[$modelname] as $k => $v) {
								if ($k != "id" && $k != $child_id_column) {
									$child[$modelname][$k] = $rec[$modelname][$k];
								}
							}
							if (!$this->$modelname->save($child)) {
								$this->log("子ノード１の時の親データのコピーに失敗しました", LOG_DEBUG);
							}
						}
					}
				}
			}

			$this->set("message", $message);
			$this->set("error_message", $error_message);
			$this->render("upload_result");
		} else {
			// get
			$this->set("next_id", $this->$modelname->getAvailableMinimumId());
		}
	}

	/**
	 * render終了後の処理
	 *
	 * @return None
	 */
	function afterFilter()
	{
		parent::afterFilter();
	}

	/**
	 * ページングの件数を決定する
	 *
	 * @return None
	 */
	function _makeLimit()
	{
		$this->paginate['limit'] = (empty($this->passedArgs["limit"])) ? Configure::read("Paginate.count") : $this->passedArgs["limit"];
	}

	/**
	 * プルダウン作成用ダミーメソッド
	 *
	 * @return True
	 */
	function _setPullDown()
	{
		return;
	}

	/**
	 * 研究者情報をまとめて更新する
	 *
	 * @param string $modelname モデル名
	 *
	 * @return boolean
	 */
	function _updateResearcher($modelname)
	{
		$result = true;
		$count = 0;
		$nendo = $this->$modelname->getCurrentNendo();
		$rec = $this->$modelname->findAllByYear($nendo);
		$this->$modelname->primaryKey = "id";
		foreach ($rec as $item) {
			$this->$modelname->id = $item[$modelname]["id"];
			$r = $this->Researcher->updateResearcherInfo($item, $modelname);
			$count++;
			if ($r) {
				if (!$this->$modelname->save($item)) {
					$result = false;
					$this->log("データ更新に失敗しました", LOG_DEBUG);
				}
			}
		}
		$this->Session->setFlash(sprintf(__('%d records are updated.', true), $count));
		return $result;
	}

	/**
	 * 当該年度の更新対象レコードの件数をセットする
	 *
	 * @param string $modelname モデル名
	 *
	 * @return None
	 */
	function _prepareUpdateResearcher($modelname)
	{
		$count = 0;
		$nendo = $this->$modelname->getCurrentNendo();
		$rec = $this->$modelname->findAllByYear($nendo);
		$this->set("target_record_count", count($rec));
	}

	/**
	 * 簡単検索
	 *
	 * @TODO: 複数キーワードへの対応
	 */
	function _make_easy_search_condition($modelname)
	{
		$tmp = array();

		if (!empty($this->data) && trim(@$this->data[$modelname]['keyword']) !== "") {
			$keyword = trim($this->data[$modelname]['keyword']);
		} else {
			if(isset($this->passedArgs['keyword'])) {
				$keyword = $this->passedArgs['keyword'];
			}
		}
		$this->passedArgs['keyword'] = $keyword;
		$keyword = str_replace("　", " ", $keyword);

		//入力されたキーワードをスペースで分割
		$split_keywords = explode(" ", $keyword);
		$this->log("分割キーワードは".print_r($split_keywords, true), LOG_DEBUG);

		// 年号だと思われるものを取り出す
		$year = null;
		if(count($split_keywords) > 1) {
			for($i=count($split_keywords)-1; $i>=0; $i--) {
				$k = $split_keywords[$i];
				if (preg_match("/^([0-9]{4}年$|[0-9]{4}$)/", $k, $matches)) {
					$year = @$matches[1];
					unset($split_keywords[$i]);
				} elseif(preg_match("/^(平成[0-9]{1,2}年$|H[0-9]{1,2}年$|[0-9]{1,2}$)/", $k, $matches)) {
					$this->log("正規表現マッチ=".print_r($matches, true), LOG_DEBUG);
					$year = @$matches[1] + 1988;
					unset($split_keywords[$i]);
				}
			}
			$this->log("数値処理後のキーワードは".print_r($split_keywords, true), LOG_DEBUG);

			// 最後に検索条件を元に戻す
			$keyword = "";
			$cnt = 0;
			foreach($split_keywords as $k) {
				if($cnt !=0) {
					$keyword .= "%";
				}
				$keyword .= $k;
				$cnt++;
			}
			$keyword = trim($keyword);
		}

		// もし年が空なら直近N年度分
		if($year) {
			$tmp['AND'][]["year"] = $year;
			$this->log("検索年は".$year, LOG_DEBUG);
		} else {
			// 年度指定がない場合は全部の年度を対象にするため以下をコメントアウト
			// $year = $this->$modelname->getCurrentNendo();
			// $year -= 3;
			// $tmp['AND'][]["year >="] = $year;
		}
		$this->log("検索キーワードは".$keyword, LOG_DEBUG);

		$keyword_array = array();
		$keyword_array = $split_keywords;

/**
		// 入力されたキーワードで研究者情報の漢字名、カナ名を検索
		// なお検索にヒットさせるためにひらがなの場合はカタカナに変換
		foreach ($keyword_array as $k => $v) {
			$v = mb_convert_kana($v, "C", "UTF-8");
			$conditions[] = array(
				'or' => array(
					"replace(replace(researcher_name, '　', ''), ' ', '') like" => '%'.$v.'%',
					"replace(replace(kana, '　',''), ' ', '') like" => '%'.$v.'%',
				),
			);
		}
		$rec = $this->Researcher->find('all', array('conditions' =>$conditions, 'fields' => 'DISTINCT researcher_name'));

		// 取ってきたデータからユニークな教員名を抽出
		$kyoin_keyword_array = array();
		foreach ($rec as $k => $v) {
			$kname = $v["Researcher"]["researcher_name"];
			$kname = str_replace("　", " ", $kname);
			$split_kname = explode(" ", $kname);
			$kname = implode($split_kname, "%");
			$kyoin_keyword_array[] = $kname;
		}
		foreach($kyoin_keyword_array as $k) {
			$tmp2['OR'] = array();
			foreach ($this->$modelname->easy_search_field as $f) {
				$tmp2['OR'][][$f . " LIKE"] = "%".$k."%";
			}
			$tmp['OR'][] = $tmp2;
		}
**/

		foreach($keyword_array as $k) {
			$tmp3['OR'] = array();
			foreach ($this->$modelname->easy_search_field as $f) {
				$tmp3['OR'][]["replace(replace({$f}, '　', ''), ' ', '') LIKE"] ="%".$k."%";
			}
			$tmp['AND'][] = $tmp3;
		}
		// 無効データは除外
		$tmp['AND'][] = array("disabled !=" => true);

		// 条件を返す
		return $tmp;
	}

	/**
	 * 戻りURL用のURLクエリストリングを生成する
	 *
	 */
	function _makeReturnURLQuery() {
		$rtn = isset($_REQUEST["rtn"]) ? $_REQUEST["rtn"] :  null;
		if (isset($rtn)) {
			$url_add = "?rtn=".$rtn;
		} else {
			$url_add = "";
		}
		return $url_add;
	}

	/**
	 * 年齢生年月日を取得するためのコンディションを追加する
	 *
	 */
	function _addBirthYMDCondition($modelname) {
		$this->paginate['joins'][] = array('type' => 'LEFT',
										'alias' => 'Researcher',
										'table' => 'researchers',
										'conditions' => $modelname.'.researcher_no = Researcher.researcher_no'
										);
		$this->$modelname->virtualFields = array('CurrentAge' =>'(left(curdate()+0,4)-birth_year) - (right(curdate()+0,4)<concat(birth_month,birth_day)) ',
						'BirthdayYMD' =>'concat(Researcher.birth_year,Researcher.birth_month,Researcher.birth_day) ');


	}

    // --- DBUG
    protected function dbg($msg, $obj){
        $this->log($msg, LOG_DEBUG);
        $this->log(json_encode($obj, 128), LOG_DEBUG);
        $this->log('...', LOG_DEBUG);
    }
}
?>
