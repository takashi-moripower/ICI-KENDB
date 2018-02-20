<?php

/* Researchers Test cases generated on: 2010-10-04 03:10:59 : 1286178959 */
require_once(dirname(dirname(__FILE__)) . "/kendb_test_case.php");

class ResearchersControllerTestCase extends KendbTestCase {

    var $fixtures = array('app.researcher', 'app.user', 'app.history');
    var $dropTables = false;

    function startTest() {
        $this->Researchers = & new TestResearchersController();
        $this->Researchers->constructClasses();
    }

    function endTest() {
        unset($this->Researchers);
        ClassRegistry::flush();
    }

    function testIndex() {
        $this->check_index_format($this->Researchers, "/test_researchers/index");
    }

    function testView() {
        
    }

    function testAdd() {
        $this->assertTrue(method_exists($this->Researchers, "add") == false);
    }

    function testEdit() {
        $this->assertTrue(method_exists($this->Researchers, "edit") == false);
    }

    function testDelete() {
        $this->assertTrue(method_exists($this->Researchers, "delete") == false);
    }

    function testGetExcelFormat() {
        $this->assertTrue($this->Researchers->_getExcelFormat("Excel5") == "Excel5");
        $this->assertTrue($this->Researchers->_getExcelFormat("Excel2007") == "Excel2007");
        $this->assertTrue($this->Researchers->_getExcelFormat() == "Excel2007");

        $this->Researchers->passedArgs["format"] = "hoge";
        $this->assertTrue($this->Researchers->_getExcelFormat() == "Excel2007");
        $this->Researchers->passedArgs["format"] = "Excel5";
        $this->assertTrue($this->Researchers->_getExcelFormat() == "Excel5");
    }

    function testMakeExcelSheetName() {
        $this->assertTrue($this->Researchers->_makeExcelSheetName("/test1/") == "_test1_");
        $this->assertTrue($this->Researchers->_makeExcelSheetName("?test1?") == "_test1_");
        $this->assertTrue($this->Researchers->_makeExcelSheetName("*test1*") == "_test1_");
        $this->assertTrue($this->Researchers->_makeExcelSheetName("[test1]") == "_test1_");
        $this->assertTrue($this->Researchers->_makeExcelSheetName("\\test1\\") == "_test1_");
        $this->assertTrue($this->Researchers->_makeExcelSheetName(":test1:") == "_test1_");
        $this->assertTrue($this->Researchers->_makeExcelSheetName("/?*[]\\:") == "_______");
    }

    function testMakePassargURLParam() {
        $this->Researchers->passedArgs["param1"] = "p1";
        $this->Researchers->passedArgs["param2"] = "p2";
        $this->assertTrue("/param1:p1/param2:p2" == $this->Researchers->_makePassArgsURLParam());
        $this->Researchers->passedArgs = array();
        $this->assertTrue("" == $this->Researchers->_makePassArgsURLParam());
    }

    function testfilename2ExcelFormat() {
        $filename = "test1.xls";
        $this->assertTrue($this->Researchers->_filename2ExcelFormat($filename) == "Excel5");
        $filename = "test2.XLS";
        $this->assertTrue($this->Researchers->_filename2ExcelFormat($filename) == "Excel5");
        $filename = "test3.xlsx";
        $this->assertTrue($this->Researchers->_filename2ExcelFormat($filename) == "Excel2007");
        $filename = "test4.XLSX";
        $this->assertTrue($this->Researchers->_filename2ExcelFormat($filename) == "Excel2007");
    }

    function _getAjaxSearchResult($param)
    {
        $this->login($this->Researchers, 1, "test_user");
        $data = array(
            'researcher_name' => $param,
        );
        $result = $this->testAction('/test_researchers/ajax_search',
                        array(
                            'method' => 'post',
                            'return' => 'contents',
                            'data' => $data,
                        )
        );
        return $result;
    }

    function testAjaxSearchKana() {
        $result = $this->_getAjaxSearchResult("カナ");
        $this->assertPattern("/漢字の名前/", $result);
    }

    function testAjaxSearchKanji() {
        $result = $this->_getAjaxSearchResult("漢字");
        $this->assertPattern("/漢字の名前/", $result);
    }

    function testAjaxSearchHiragana() {
        $result = $this->_getAjaxSearchResult("かな");
        $this->assertPattern("/漢字の名前/", $result);
    }



}

?>
