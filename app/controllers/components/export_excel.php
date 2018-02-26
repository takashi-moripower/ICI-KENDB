<?php

App::import('Component', 'BaseExcel');
App::import('vendor', 'phpexcel/phpexcel');

class ExportExcelComponent extends BaseExcelComponent {

    protected $_format;
    protected $_modelname;
    protected $_CELL_STYLE;
    
    const FORMAT_EXCEL5 = "Excel5";
    const FORMAT_EXCEL2007 = "Excel2007";
    const FORMAT_CSV = "CSV";
    
    const EXTENSIONS = [
        self::FORMAT_CSV => '.csv',
        self::FORMAT_EXCEL2007 => '.xlsx',
        self::FORMAT_EXCEL5 => '.xls'
    ];

    public function export($modelname, $datalist, $format = self::FORMAT_EXCEL5) {


        if ($format == self::FORMAT_EXCEL5 || $format == self::FORMAT_CSV) {
            $this->_format = $format;
        } else {
            $this->_format = self::FORMAT_EXCEL2007;
        }

        $this->_modelname = $modelname;
        $this->_initExcel();
        $this->_initColumns();
        $this->_setRows($datalist);

        $filename = $this->_getFileName();
        $this->output($filename, $this->_format);
    }

    /**
     * Excelファイルを出力
     *
     * @param PHPExcel_IOFactory $writer   Excel出力用Writerオブジェクト
     * @param string			 $filename 出力ファイル名
     *
     * @return None
     */
    public function output($filename, $format = 'Excel2007') {
        $this->getController()->autoRender = false;

        $this->log("ダウンロード処理開始...", LOG_INFO);

        $filename_encoded = rawurlencode($filename);

        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Transfer-Encoding: binary");
        header("Content-Disposition: attachment; filename*=UTF-8''{$filename_encoded}");
        // アクティブな出力バッファがあれば削除
        if (ob_get_contents()) {
            ob_end_clean();
        }

        $writer = PHPExcel_IOFactory::createWriter($this->getExcel(), $format);
        $writer->save('php://output');
        $this->log("ダウンロード処理終了...", LOG_INFO);
    }

    protected function _getFileName() {
        
        $extension = self::EXTENSIONS[$this->_format];

        $model = $this->getController()->{$this->_modelname};
        $filename = $model->download_file_prefix . date('YmdHis') . $extension;

        return $filename;
    }

    protected function _createWriter() {
        $writer = PHPExcel_IOFactory::createWriter($this->getExcel(), $this->_format);
        $this->log("writer作成処理完了...", LOG_INFO);

        return $writer;
    }

    protected function _setRows($datalist) {
        $modelname = $this->_modelname;
        $model = $this->getController()->{$modelname};
        $sheet = $this->getExcel()->getActiveSheet();
        $columns = $model->file_columns;

        $row = 1;
        foreach ($datalist as $item) {
            $row++;
            for ($i = 0; $i < count($columns); $i++) {
                $str = $item[$modelname][$columns[$i]];
                if (in_array($columns[$i], $model->date_columns)) {
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

                if (in_array($columns[$i], $model->numeric_search_field) && !in_array($columns[$i], $model->numeric_non_currency_field)) {
                    $sheet->setCellValueExplicitByColumnAndRow($i, $row, $str, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                    $sheet->getStyleByColumnAndRow($i, $row)->getNumberFormat()->setFormatCode('#,##0;[Red]-#,##0');
                } else if (preg_match("/id$/", $columns[$i])) {
                    if (isset($str)) {
                        // _id の時は未設定の場合は値を表示しない
                        $sheet->setCellValueExplicitByColumnAndRow($i, $row, $str, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                    }
                } else if (in_array($columns[$i], $model->numeric_non_currency_field)) {
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
    }

    protected function _initColumns() {


        $modelname = $this->_modelname;
        $model = $this->getController()->{$modelname};

        $sheet = $this->getExcel()->getActiveSheet();

        $columns = $model->file_columns;
        for ($i = 0; $i < count($columns); $i++) {
            $is_replace = false;

            // カラムに別名があった場合の対応
            foreach ($model->output_column_label_alias as $k => $v) {
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
            $sheet->getStyleByColumnAndRow($i, 1)->applyFromArray($this->_CELL_STYLE);
            $sheet->getStyleByColumnAndRow($i, 1)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $sheet->getStyleByColumnAndRow($i, 1)->getFill()->getStartColor()->setARGB('FFCCFFCC');
            // $sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($i))->setAutoSize(true);
        }
    }

    protected function _initExcel() {
        $excel = $this->getExcel();
        // シートの設定
        $excel->setActiveSheetIndex(0);
        $sheet = $excel->getActiveSheet();
        $sheet->setTitle($this->_makeExcelSheetName(__($this->_modelname, true)));
        $sheet->getDefaultStyle()->getFont()->setName('Arial');
        $sheet->getDefaultStyle()->getFont()->setSize(11);

        // セルのスタイル
        $this->_CELL_STYLE = array(
            'borders' => array(
                'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
            )
        );
    }

    /**
     * Excelファイルやシート名の禁則文字を処理する
     *
     * @param string $name シート名やファイル名
     *
     * @return string 変換後のシート名やファイル名
     */
    function _makeExcelSheetName($name) {
        $search = array(
            ':', '\\', '/', '?', '*', '[', ']',
        );
        return str_replace($search, "_", $name);
    }

}
?>  
