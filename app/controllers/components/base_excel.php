<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BaseExcelComponent extends Object {

    protected $_controller;
    protected $_excel;

    function startup($controller) {
        $this->_controller = $controller;
        $this->_excel = new PHPExcel();
    }

    public function getController() {
        return $this->_controller;
    }

    public function getExcel() {
        return $this->_excel;
    }

    /*
     * @param string $filename ファイル名
     *
     * @return string ファイル形式
     */

    static function filename2ExcelFormat($filename) {
        $file_info = pathinfo($filename);
        $extension = @$file_info['extension'];
        self::slog("ファイル名は" . $filename . " 拡張子は" . $extension, LOG_DEBUG);

        if (strtolower($extension) == "xlsx") {
            return "Excel2007";
        } else if (strtolower($extension) == "xls") {
            return "Excel5";
        } else if (strtolower($extension) == "csv") {
            return "CSV";
        } else {
            return null;
        }
    }

    static function slog($msg, $type = LOG_ERROR) {
        if (!class_exists('CakeLog')) {
            require LIBS . 'cake_log.php';
        }
        if (!is_string($msg)) {
            $msg = print_r($msg, true);
        }
        return CakeLog::write($type, $msg);
    }

}
?>  
