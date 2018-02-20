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
 * SummariesController
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

function _A($j){return json_decode($j, true); }

class SummariesController extends AppController {

	var $name = 'Summaries';
	var $components = array('Search.Prg');

	// データ種別
	// 特別研究員奨励費は横断検索対象外
	var	$all_data = array(
		'NedoJstOther', 'Entrust', 'Contract', 'Grant', 'Donation',
		'AssessedContribution', 'Adoption', 'OtherResearchGrant', 'MhlwResearchGrant'
	);

	/**
	 * 検索＋ページングの際に保持しつづけるパラメータ
	 * - 検索フォーム内のデータを管理するための設定値です。
     * - https://trac.i-c-i.jp/kendb/wiki/CakePHP#presetVars
	 * @var array
	 */
	var $presetVars = array(
		// 以下はページングの件数保持に利用する
		array('field' => 'limit', 'type' => 'value'),
		// 年
		array('field' => 'year_f', 'type' => 'value'),
		array('field' => 'year_t', 'type' => 'value'),
		// 職員番号 (ICI#19)
		array('field' => 'personal_no', 'type' => 'value'),
		// 研究種別
		array('field' => 'research_type', 'type' => 'value'),
		// 研究者名
		array('field' => 'researcher_name', 'type' => 'value'),
		// 部署
		array('field' => 'department', 'type' => 'value'),
		// 専攻名
		array('field' => 'major_name', 'type' => 'value'),              // #270
		// 職
		array('field' => 'job_title', 'type' => 'value'),
		// 研究テーマ
		array('field' => 'subject', 'type' => 'value'),
		// 資金元
		array('field' => 'fund_owner', 'type' => 'value'),
		// 備考
		array('field' => 'memo', 'type' => 'value'),
		// 金額関係
		array('field' => 'amount_f', 'type' => 'value'),
		array('field' => 'amount_t', 'type' => 'value'),
		array('field' => 'direct_cost_f', 'type' => 'value'),
		array('field' => 'direct_cost_t', 'type' => 'value'),
		array('field' => 'indirect_cost_f', 'type' => 'value'),
		array('field' => 'indirect_cost_t', 'type' => 'value'),
		// 日付関係
		array('field' => 'start_date_f', 'type' => 'value'),
		array('field' => 'start_date_t', 'type' => 'value'),
		array('field' => 'end_date_f', 'type' => 'value'),
		array('field' => 'end_date_t', 'type' => 'value'),
		// キーワード検索
		array('field' => 'keyword', 'type' => 'value'),
		// 表示オプション
		array('field' => 'record_filter', 'type' => 'value'),

        // 年齢
		array('field' => 'age_based_at', 'type' => 'value'),    // 基準日
		array('field' => 'age', 'type' => 'value'),             // 年齢
		array('field' => 'age_under', 'type' => 'value'),       // 以下/以上

        // 性別(ICI#23)
		array('field' => 'sex', 'type' => 'value'),            // 性別

        // 集計対象外(#325)
		array('field' => 'unaggregate', 'type' => 'value'),    // 集計対象外

		array('field' => 'institute_code', 'type' => 'value'),

        array('field' => 'school_code', 'type' => 'value'),

        array('field' => 'course_code', 'type' => 'value'),
	);

	/**
	 * デフォルトのソート順
	 *
	 * @var array
     * http://book.cakephp.org/1.3/ja/The-Manual/Common-Tasks-With-CakePHP/Pagination.html
	 */
	var $paginate = array(
		'condition' => array('Summary.disabled' => false),
		'order' => array(
            'Summary.year' => 'desc',
            'Summary.model_name' => 'asc',
			'Summary.model_id' => 'desc'),
	);

	/**
	 * beforeFilter
	 *
	 * @return None
	 */
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->set("title_for_layout", "検索");

		$this->crumbList = array(
			array(
				'ホーム',
				array('controller' => 'users', 'action' => 'index'),
				array()
			),
			array(
				'検索',
				array('controller' => 'summaries', 'action' => 'index'),
				array()
			),
		);
		foreach ($this->all_data as $v) {
			$this->presetVars[] = array('field' => $v, 'type' => 'value');
		}
	}

	/**
	 * 検索条件を作成
	 * @return None
	 */
	private function _makeSearchCond()
	{
        // * この時点で passedArgs にPOSTのデータが入っている

		// 部分一致
		$str_array = array(
			"department",
			"research_type",
			"subject",
			"fund_owner",
			"memo",
            "major_name",               // #270
            "personal_no",              // ICI#19
		);

		foreach ($str_array as $key => $value) {
			$val = isset($this->passedArgs[$value]) ? $this->passedArgs[$value] : null;
//            $this->log( "__makeSearchCond: $key : $value :$val ", LOG_DEBUG );             //#270
			if (!empty($val) && trim($val) != "") {
				$str = trim($val);
				$str = preg_replace("/　/", " ", $str); // 全角スペース対応
				$str = preg_replace("/\s+/", " ", $str);
				$tmp_array = explode(" ", $str);
//                $this->log( "__makeSearchCond: ".join('/',$tmp_array), LOG_DEBUG );             //#270
				foreach($tmp_array as $s) {
					if(trim($s) != "") {
						$this->paginate['conditions'][] = "replace(replace({$value}, '　', ''), ' ', '') like '%{$s}%'";
                        $this->log( "__makeSearchCond: \n".join('\n',$this->paginate['conditions']),    LOG_DEBUG);             //#270
					}
				}
			}
		}

		// 教員名 #261
		$val = isset($this->passedArgs["researcher_name"]) ? $this->passedArgs["researcher_name"] : null;
		if (!empty($val) && trim($val) != "") {
			$str = trim($val);
			$str = preg_replace("/　/", " ", $str); // 全角スペース対応
			$str = preg_replace("/\s+/", " ", $str);
			// 検索キーワードに スペース＋or＋スペースとなっていればOR検索する
			if (preg_match("/ or /", $str)) {
				$tmp_array = explode(" or ", $str);
				$cond = array();
				foreach($tmp_array as $s) {
					if(trim($s) != "") {
						$s = preg_replace("/ /", "", $s);
						$cond[] = "replace(replace(researcher_name, '　', ''), ' ', '') like '%{$s}%'";
					}
				}
				if (count($cond) > 0) {
					$this->paginate['conditions'][]['OR'] = $cond;
				}
			} else {
				$tmp_array = explode(" ", $str);
				foreach($tmp_array as $s) {
					if(trim($s) != "") {
						$this->paginate['conditions'][] = "replace(replace(researcher_name, '　', ''), ' ', '') like '%{$s}%'";
					}
				}
			}
		}

		// 完全一致
		$match_array = array(
			"job_title",
			"institute_code",
			"school_code",
			"course_code",
		);
		foreach ($match_array as $key => $value) {
			$val = isset($this->passedArgs[$value]) ? $this->passedArgs[$value] : null;
			if (!empty($val)) {
				$this->paginate['conditions'][] = $value . " = " . "'" . $val . "'";
			}
		}

		// 年
		$val = isset($this->passedArgs['year']) ? $this->passedArgs['year'] : null;
		if (!empty($val)) {
			$this->paginate['conditions'][] = "year = " . $val;
		}

		// 範囲指定
		$add = array("_f" => ">=", "_t" => "<=");
		$col = array("year", "amount", "direct_cost", "indirect_cost");
		foreach ($col as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$num = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : null;
				if (is_numeric($num)) {
					$this->paginate['conditions'][] = $value . $v2 . $num;
				}
			}
		}

		// 日付フィールド部分
		$col = array("start_date", "end_date");
		foreach ($col as $key => $value) {
			foreach ($add as $k2 => $v2) {
				$val = isset($this->passedArgs[$value . $k2]) ? $this->passedArgs[$value . $k2] : null;
				if (!empty($val)) {
					$this->paginate['conditions'][] = $value . $v2 . "'" . $val . "'";
				}
			}
		}

        // 年齢指定
        if( is_numeric(@$this->passedArgs['age'])){
            # $this->dbg('age is specified', $this->passedArgs );
            if( @$this->passedArgs['age_under'] == '1' ){
                $this->paginate['conditions'][] = "({$this->passedArgs['age']}+1) * 10000 + birthdayYMD > {$this->age_based_at()}";
            } else {
                $this->paginate['conditions'][] = "({$this->passedArgs['age']}) * 10000 + birthdayYMD < {$this->age_based_at()}";
            }
        }

        // 性別(ICI#23)
        if( @$this->passedArgs['sex'] != null){
                $this->paginate['conditions'][] = "sex = '{$this->passedArgs['sex']}'";
        }

        $this->dbg('COND', $this->passedArgs);

        // ACL確認(横断検索できる対象の資金種別が決まっている模様)
		$this->_checkACL();

        // 検索
		$this->paginate['conditions'][] = $this->Summary->parseCriteria($this->passedArgs);
	}

	function _checkACL() {
		foreach ($this->all_data as $key => $value) {
			// アクセスコントロールチェック
			$aclname = strtolower(Inflector::pluralize($value));
			$aclcheck = @$this->Acl->check($this->Auth->user(), $aclname . "/index");
			if (!$aclcheck) {
				$this->paginate['conditions'][] = "model_name != '" . $value . "'";
			} else {
				$val = isset($this->passedArgs[$value]) ? $this->passedArgs[$value] : null;
				if (!isset($this->passedArgs['keyword']) && !$val) {
					$this->paginate['conditions'][] = "model_name != '" . $value . "'";
				}
			}
		}
	}

	function _hideProjectRecord() {
		$has_detail = array('Contract', 'Grant', 'Entrust', 'NedoJstOther');
		foreach ($has_detail as $key => $value) {
			$this->paginate["conditions"][] = "not ( model_name = '" . $value . "' and model_parent_id is NULL )";
		}
	}

	function _hideDetailRecord() {
		$has_detail = array('Contract', 'Grant', 'Entrust', 'NedoJstOther');
		foreach ($has_detail as $key => $value) {
			$this->paginate["conditions"][] = "not ( model_name = '" . $value . "' and model_parent_id is not NULL )";
		}
	}

	function _toggleDisplayRecord() {
		$opt = isset($this->passedArgs["record_filter"]) ? $this->passedArgs["record_filter"] : 1;
		if ($opt == 2) {
			// プロジェクトレコードのみ表示
			$this->_hideDetailRecord();
		} else {
			// 明細のみ表示
			$this->_hideProjectRecord();
		}
	}

    /* 表示用のページレコードを返す
     *
     */
    function get_paged_records(){
		$rec = $this->paginate('Summary');  // find が呼ばれて検索
		$search_result = array();           // findの結果を加工して保存

		// 表示用データを加工する
		foreach ($rec as $r) {
			$tmp_rec = $r;
			$view_method = "/view/";
			if($r["Summary"]["model_parent_id"]) {
				$view_method = "/view_node/";
			}
			$tmp_rec["Summary"]["href"] = "/" .
				Inflector::tableize($r["Summary"]["model_name"]) .
				$view_method .
				$r["Summary"]["model_id"];
			$search_result[] = $tmp_rec;
		}
        return $search_result;
    }

    /* ダウンロードする
     *
     */
    function download($format){

		 // 出力ヘッダ
		$header_array = array(
			__('Id', true),
			__('Parent Id', true),
			__('Common Search Department', true),
			__('Major Name', true),                     // #270
			__('Institute Code', true),                     // #270
			__('School Code', true),                     // #270
			__('Course Code', true),                     // #270
            __('Personal No', true),                    // ICI#19
			__('Common Search Researcher Name', true),
			__('Common Search Job Title', true),
			__('Sex', true),
			__('CurrentAge', true),
			__('Project Code', true),
			__('Common Search Amount', true),               // 受入
			__('Common Search Direct Cost', true),
			__('Common Search Indirect Cost', true),
			__('Year', true),
			__('Data Type', true),
			__('Common Search Research Type', true),
			__('Common Search Subject', true),
			__('Common Search Fund Owner', true),
			__('Common Search Start Date', true),
			__('Common Search End Date', true),
		//	__('BirthdayYMD', true),		//2017.10.12 Delete
			__('Common Search Memo', true),
			__('Unaggregate', true),                   // ICI#26
		);

		// 出力カラム
		$column_array = array(
			'model_id',
			'model_parent_id',
			'department',
			'major_name',                               //#270
			'institute_code',                               //#270
			'school_code',                               //#270
			'course_code',                               //#270
            'personal_no',                              //ICI#19
			'researcher_name',
			'job_title',
            'sex',
			'age',
            'project_code',                             // ICI#27
			'amount',
			'direct_cost',
			'indirect_cost',
			'year',
			'model_name',
			'research_type',
			'subject',
			'fund_owner',
			'start_date',
			'end_date',
		//	'birthdayYMD',			//2017.10.12 Delete
			'memo',
            'unaggregate',
		);


		if ($format == "Excel5") {
			$this->_export_search_result(
                "検索結果", $header_array, $column_array, $this->get_paged_records(), "Excel5");
			return true;
		}
		if ($format == "Excel2007") {
			$this->_export_search_result(
                "検索結果", $header_array, $column_array, $this->get_paged_records(), "Excel2007");
			return true;
		}
		if ($format == "CSV") {
			$this->_export_search_result_by_CSV(
                $header_array, $column_array, $this->get_paged_records());
			return true;
		}

        return false; // ダウンロードしなかった
    }

	function index() {
        // $this->dbg("index():passedArgs:", $this->passedArgs);

		$this->set('urlparams', $this->_makePassArgsURLParam());

		$format = isset($this->passedArgs['format']) ? $this->passedArgs['format'] : "";

        $this->paginate["limit"] = in_array(
            $format, array("Excel5", "Excel2007", "CSV")) ? 65535 : 50;

		if(isset($this->passedArgs['keyword'])) {
            // 簡易検索
			$this->Summary->recursive = -1;
			$this->Prg->commonProcess('Summary');
			$this->paginate['conditions'] = $this->_make_easy_search_condition("Summary");
			$this->_toggleDisplayRecord();
			$this->_checkACL();
		} else {
            // 詳細検索
			$this->Summary->recursive = 1;
			$this->Prg->commonProcess('Summary');
			$this->_toggleDisplayRecord();
			$this->_makeSearchCond();
		}

        if( $this->download($format)){
            return; // ダウンロードしたらそのまま終了
        }

        // ページデータをセットしてビューに渡す
        $this->set("age_based_at", $this->age_based_at());     // ICI#29
		$this->set("summaries", $this->get_paged_records()) ;
	}

	/**
	 * 検索結果をCSVで出力する
	 *
	 * @param array $header_array ヘッダー文字列
	 * @param array $column_array カラム名
	 * @param array $datalist	 データ一覧
	 *
	 * @return None
	 */
	function _export_search_result_by_CSV($header_array, $column_array, $datalist)
	{
		Configure::write("debug", 0);
		App::import('vendor', 'phpexcel/phpexcel');

		$columns = $header_array;
		$str = "";
		$one_line = "";
		$lines = array();
		for ($i = 0; $i < count($columns); $i++) {
			$str = $columns[$i];
			$str = str_replace('"', '""', $str);
			$one_line .= '"' . $str . '",';
		}
		$lines[] = $one_line;

		$row = 1;
		for ($i = 0; $i < count($datalist); $i++) {
			$one_line = "";
			$str = "";
			$row++;
			$col = 0;
			for ($j = 0; $j < count($column_array); $j++) {
				$str = @$datalist[$i]["Summary"][$column_array[$j]];
				if ($column_array[$j] == "model_name") {
					$str = __($str, true);
				}

				// 年齢の計算
				if ($column_array[$j] == "age" ) {
					$birthday = $datalist[$i]["Summary"]["birthdayYMD"];
					if($birthday) {
						$age = floor(($this->age_based_at() -$birthday)/10000);     // 年齢計算基準日で計算(ICI#29)
					} else {
						$age = "";
					}
					$str = $age;
				}
				// 日付け
				if ($column_array[$j] == "start_date" || $column_array[$j] == "end_date" || $column_array[$j] == "updated") {
					if ($str == "0000-00-00") {
						$str = null;
					}
					if (!is_null($str)) {
						$str = date('Y/m/d', strtotime($str));
					}
				}

				$str = str_replace('"', '""', $str);
				$one_line .= '"' . $str . '",';
				$col++;
			} // end of for カラムごとの処理

			if ($row % 10 == 0) {
				$this->log("データ出力件数=" . $row, LOG_INFO);
			}
			$lines[] = $one_line;
		}
		unset($datalist);

		// 末尾のカンマを除去して、改行を追加
		$csv_string = "";
		for ($i = 0; $i < count($lines); $i++) {
			$str = $lines[$i];
			$str = rtrim($str, ",");
			$str .= "\r\n";
			$csv_string .= $str;
		}

		$filename = "oudan". date('YmdHis') . ".csv";
		$this->_processCSVDownload($csv_string, $filename);
	}


	/**
	 * Excelに出力する
	 *
	 * @param string $sheetname	シート名
	 * @param array  $header_array ヘッダ項目名
	 * @param array  $column_array 出力項目名
	 * @param array  $datalist	 データ一式
	 * @param string $exceltype	出力Excel形式
	 */
	function _export_search_result($sheetname, $header_array, $column_array, $datalist, $exceltype = "Excel5")
	{
		Configure::write("debug", 0);
		App::import('vendor', 'phpexcel/phpexcel');
		$excel = new PHPExcel();
		// シートの設定
		$excel->setActiveSheetIndex(0);
		$sheet = $excel->getActiveSheet();
		$sheet->setTitle($sheetname);
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

		$columns = $header_array;
		for ($i = 0; $i < count($columns); $i++) {

			$sheet->setCellValueByColumnAndRow($i, 1, $columns[$i]);
			// 以下の処理が非常に遅いため
			$sheet->getStyleByColumnAndRow($i, 1)->applyFromArray($cell_style);
			$sheet->getStyleByColumnAndRow($i, 1)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$sheet->getStyleByColumnAndRow($i, 1)->getFill()->getStartColor()->setARGB('FFCCFFCC');
		}

		$row = 1;
		for ($i = 0; $i < count($datalist); $i++) {
			$row++;
			$col = 0;

			for ($j = 0; $j < count($column_array); $j++) {
				$str = @$datalist[$i]["Summary"][$column_array[$j]];
				if ($column_array[$j] == "model_name") {
					$str = __($str, true);
				}

				// 年齢の計算
				if ($column_array[$j] == "age" ) {
					$birthday = $datalist[$i]["Summary"]["birthdayYMD"];
					if($birthday) {
						$age = floor(($this->age_based_at() -$birthday)/10000);     // 年齢計算基準日で計算(ICI#29)
					} else {
						$age = "";
					}
					$str = $age;
				}
				if ($column_array[$j] == "start_date" || $column_array[$j] == "end_date" || $column_array[$j] == "updated") {
					if ($str == "0000-00-00") {
						$str = null;
					}
					if (!is_null($str)) {
						$str = date('Y/m/d', strtotime($str));
					}
				}

				$int_field = array("amount", "direct_cost", "indirect_cost");
				if(in_array($column_array[$j], $int_field)) {
					$sheet->setCellValueExplicitByColumnAndRow($col, $row, $str, PHPExcel_Cell_DataType::TYPE_NUMERIC);
					$sheet->getStyleByColumnAndRow($col, $row)->getNumberFormat()->setFormatCode('#,##0;[Red]-#,##0');
				} else if (preg_match("/id$/", $column_array[$j]) || ($column_array[$j] == "age" && $str != "")) {
					$sheet->setCellValueExplicitByColumnAndRow($col, $row, $str, PHPExcel_Cell_DataType::TYPE_NUMERIC);
				} else {
					$sheet->setCellValueExplicitByColumnAndRow($col, $row, $str, PHPExcel_Cell_DataType::TYPE_STRING);
				}
				$col++;
			}   // end of for カラムごとの処理

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

		$filename = "oudan" . date('YmdHis') . $extension;
		$this->_processExcelDownload($writer, $filename);
	}

    // 年齢基準年月日
    protected function age_based_at(){
        $date = date_parse_from_format('Y-m-d', @$this->passedArgs['age_based_at'] );
        $ret =  ($date['error_count'] < 1)  ? $date['year'] * 10000 + $date['month'] * 100 + $date['day'] : date('Ymd');
        //        $ret = date('Ymd',
        ////                    strtotime(@$this->passedArgs['age_based_at'] ?: date('Y-m-d')));
        return $ret;
    }


    protected function _to_url($data)
    {
        $param = "";
        foreach ($data as $key => $val) {
            $param .= "/" . $key . ":" . $val;
        }
        return $param;
    }

	function aggregate() {
        /* TODO
        * 1. $this->params['data']['Summary'] よりクエリパラメータを受け取る
        * 2. パラメータのバリデーション
        *       2.1 エラーだらと終了
        * 3. 検索一時テーブルをtruncate
        * 4. SQL文を作って、検索一時テーブルにデータを格納する
        * 5. ダウンロード
        */
        if( @$this->passedArgs){
            //$this->dbg('for downloding', $this->passedArgs);
            $this->aggregate_download();
            return ;
        }

        if( @$this->params['data']['Summary'] )
        {
            $this->aggregate_create();
        }
    }

    protected function get_age_condition($age, $age_based_at, $age_under)
    {
        if($age_under == '1')
            return "({$age}+1) * 10000 + birthdayYMD > {$age_based_at}";

        return "({$age}) * 10000 + birthdayYMD < {$age_based_at}";
    }

    protected function aggregate_create()
    {
        $p = $this->params['data']['Summary'];
        $urlparams = $this->_to_url($p);
        $this->set('urlparams', $urlparams);

        // 対象年度
        $year_from = $p['year_from'];
        $year_to = $p['year_to'];

        // 順番, 順位
        $rank_order= $p['rank_order'];
        $aggregate_for = $p['aggregate_for'];
        $order = '';
        if ($aggregate_for == 'count'){
            $order = "count {$rank_order}, amount ${rank_order}";
        } else {
            $order = "amount {$rank_order}, count ${rank_order}";
        }
        $rank_count = $p['rank_count'];

        // 年齢
        $age_based_at = str_replace('-', '', $p['age_based_at']);
        $age = @$p['age'];
        $age_under = @$p['age_under'];
        $age_condition = (is_numeric($age)) ?
            "AND ".$this->get_age_condition($age, $age_based_at, $age_under) : "";

        // 性別
        $sex_condition = @$p['sex'] ? "AND sex = '{$p['sex']}'" : '';

        // 非対象
        $unaggregate_conditon = (@$p['use_unaggregate'] == 1) ? "": " AND unaggregate != 1";

        // 金額条件
        $amount_condition = (@$p['include_amount_0'] == 1) ? "": " AND amount > 0 ";

        $queries = array(
            "TRUNCATE TABLE aggregate_ranking ;",
            "TRUNCATE TABLE aggregate_counts;",
            "TRUNCATE TABLE aggregate_years;",
            "ALTER TABLE aggregate_ranking AUTO_INCREMENT = 1;",
            "INSERT INTO aggregate_ranking (
              year,
              amount,
              count,
              personal_no,
              researcher_name,
              major_name,
              job_title,
              sex,
              birthdayYMD,
              age_based_at,
              age
          )
          SELECT
              year,
              IFNULL(sum(amount), 0) as amount,
              count(*) as count,
              personal_no,
              researcher_name,
              major_name,
              job_title,
              sex,
              birthdayYMD,
              {$age_based_at},
              floor(({$age_based_at} - birthdayYMD)/10000)
          FROM  summaries
          WHERE
              (year BETWEEN  {$year_from} and {$year_to} ) AND
              personal_no is not null and personal_no != ''
              {$sex_condition} {$age_condition} {$unaggregate_conditon} {$amount_condition}
          GROUP BY  personal_no
          ORDER BY  {$order}
          LIMIT     {$rank_count};",

            "INSERT INTO aggregate_counts(
                    year,
                    amount,
                    count,
                    personal_no
                )
                SELECT
                    S.year,
                    sum(S.amount) as amount,
                    count(*) as count,
                    S.personal_no
                FROM
                    summaries S
                WHERE
                    (S.year BETWEEN  {$year_from} and {$year_to}) AND
                    S.personal_no is not null and S.personal_no != ''
                    {$sex_condition} {$age_condition} {$unaggregate_conditon} {$amount_condition}
                GROUP BY
                    S.personal_no, S.year",
        );

        foreach($queries as $q){
            $this->Summary->query($q);
        }

        for($i = $year_from ; $i <= $year_to ; $i++ ){
            $q = "INSERT INTO aggregate_years( personal_no, rank, year)
        SELECT personal_no, id, {$i} FROM aggregate_ranking;" ;
            $this->Summary->query($q);
        }
    }

    protected function aggregate_download()
    {
        $query = "select * from aggregate_result";
        $datalist = $this->Summary->query($query);

        // "合計件数" : ["total_count", "n", null, false],
        // "合計金額" : ["total_amount", "n", "#,##0;[Red]-#,##0", false],
        $meta = _A('{
           "順位" : ["rank", "n", null, false],
           "氏名" : ["researcher_name", "s", null, false],
           "職員番号" : ["personal_no", "s", null, false],
           "年齢" : ["age", "n", null, false],
           "年度" : ["year", "n", null, true],
           "件数" : ["year_count", "n", null, true],
           "合計/受け入れ総額" : ["year_amount", "n", "¥#,##0;[Red]-#,##0", true],
           "部局専攻名" : ["major_name", "s", null, false],
           "職名" : ["job_title", "s", null, false],
           "性別" : ["sex", "s", null, false],
           "備考" : ["memo", "s", null, false]
        }');

        $this->_export_aggregate_result(
            $datalist, 'aggregate_result', $meta);
    }

	/**
	 * 集計結果をExcelに出力する
	 *
	 * @param array  $datalist	 データ一式
	 * @param string $resultset  結果セット名
     * @param array  $meta (key: ヘッダー名, value: カラム名)
	 * @param string $sheetname	シート名
	 * @param string $exceltype	出力Excel形式
	 */
	function _export_aggregate_result(
        $datalist,
        $resultset,
        $meta,
        $sheetname = "結果",
        $exceltype = "Excel2007")
	{
		Configure::write("debug", 0);
		App::import('vendor', 'phpexcel/phpexcel');
		$excel = new PHPExcel();

		// シートの設定
		$excel->setActiveSheetIndex(0);
		$sheet = $excel->getActiveSheet();
		$sheet->setTitle($sheetname);
		$sheet->getDefaultStyle()->getFont()->setName('MS Gothic');
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

		$columns = array_keys($meta);

        // Header
		for ($i = 0; $i < count($columns); $i++) {

			$sheet->setCellValueByColumnAndRow($i, 1, $columns[$i]);
			// 以下の処理が非常に遅いため
			$sheet->getStyleByColumnAndRow($i, 1)->applyFromArray($cell_style);
			$sheet->getStyleByColumnAndRow($i, 1)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$sheet->getStyleByColumnAndRow($i, 1)->getFill()->getStartColor()->setARGB('FFCCFFCC');
		}

        // Body
		$row = 1;
        $last = -1;
        $total_count = null;
        $total_amount = null;
		for ($i = 0; $i < count($datalist); $i++) {

            $braked = ($last != @$datalist[$i][$resultset]['rank']);

            if($braked && $last > 0){
			    $row++;
                $sheet->setCellValueExplicitByColumnAndRow(5, $row, $total_count, "n");
                $sheet->setCellValueExplicitByColumnAndRow(6, $row, $total_amount, "n");
                $info = $meta[$columns[6]];
                $sheet->getStyleByColumnAndRow(
                    6, $row)->getNumberFormat()->setFormatCode($info[2]);
            }

			$row++;
			$col = 0;
			for ($j = 0; $j < count($columns); $j++) {
                $info = $meta[$columns[$j]];

                if($braked || $info[3]){
                    $str = @$datalist[$i][$resultset][$info[0]];
   			        $sheet->setCellValueExplicitByColumnAndRow(
                       $col, $row, $str, $info[1]);

                   if( $info[2] != null)
                       if( $info[1] == 'n' ){
                           $sheet->getStyleByColumnAndRow(
                               $col, $row)->getNumberFormat()->setFormatCode($info[2]);
                       }
                   }

				$col++;
			}   // end of for カラムごとの処理

            $last = @$datalist[$i][$resultset]['rank'];

            $total_count = @$datalist[$i][$resultset]['total_count'];
            $total_amount = @$datalist[$i][$resultset]['total_amount'];

			if ($row % 10 == 0) {
				$this->log("データ出力件数=" . $row, LOG_INFO);
			}
		}

        $row++;
        $sheet->setCellValueExplicitByColumnAndRow(5, $row, $total_count, "n");
        $sheet->setCellValueExplicitByColumnAndRow(6, $row, $total_amount, "n");
        $info = $meta[$columns[6]];
        $sheet->getStyleByColumnAndRow(
                6, $row)->getNumberFormat()->setFormatCode($info[2]);

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

		$filename = "oudan" . date('YmdHis') . $extension;
		$this->_processExcelDownload($writer, $filename);
	}

    /* 研究者番号(researcher_no)でResearcherに見つからない職員
    */
    function missing_researchers()
    {
        $query = "SELECT * from summary_missing_researchers";
        $datalist = $this->Summary->query($query);

        $meta = _A('{
           "研究者名": ["researcher_name", "s", null, true],
           "研究者番号": ["researcher_no", "s", null, true],
           "職員番号": ["personal_no", "s", null, true]
        }');

        $this->summary_missing_researchers(
            $datalist, 'summary_missing_researchers', $meta);
    }

	function summary_missing_researchers(
        $datalist,
        $resultset,
        $meta,
        $sheetname = "結果",
        $exceltype = "Excel5")
	{
		Configure::write("debug", 0);
		App::import('vendor', 'phpexcel/phpexcel');
		$excel = new PHPExcel();

		// シートの設定
		$excel->setActiveSheetIndex(0);
		$sheet = $excel->getActiveSheet();
		$sheet->setTitle($sheetname);
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

		$columns = array_keys($meta);

        // Header
		for ($i = 0; $i < count($columns); $i++) {

			$sheet->setCellValueByColumnAndRow($i, 1, $columns[$i]);
			// 以下の処理が非常に遅いため
			$sheet->getStyleByColumnAndRow($i, 1)->applyFromArray($cell_style);
			$sheet->getStyleByColumnAndRow($i, 1)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$sheet->getStyleByColumnAndRow($i, 1)->getFill()->getStartColor()->setARGB('FFCCFFCC');
		}

        // Body
		$row = 1;
        $last = -1;
        $total_count = null;
        $total_amount = null;
		for ($i = 0; $i < count($datalist); $i++) {

			$row++;
			$col = 0;
			for ($j = 0; $j < count($columns); $j++) {
                $info = $meta[$columns[$j]];        // カラム情報

                if($info[3]){
                    $str = @$datalist[$i][$resultset][$info[0]];
   			        $sheet->setCellValueExplicitByColumnAndRow(
                       $col, $row, $str, $info[1]);

                   if( $info[2] != null)
                       if( $info[1] == 'n' ){
                           $sheet->getStyleByColumnAndRow(
                               $col, $row)->getNumberFormat()->setFormatCode($info[2]);
                       }
                }

				$col++;
			}   // end of for カラムごとの処理

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

		$filename = "$resultset" . date('YmdHis') . $extension;
		$this->_processExcelDownload($writer, $filename);
	}
}
?>
