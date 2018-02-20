<?php
App::import('Vendor', 'DbShell', array('file' => 'shells'.DS.'db.php'));

class CheckShell extends DbShell {

    function summary_headers()
    {
        App::import("Model", "Summary");
       
        $summary = new Summary();
        echo gettype($summary), "\n";
        $headers = $summary->getFileHeader(); 
        echo gettype($headers), "\n"; 
        var_dump($summary->file_columns);
        var_dump($headers);
        foreach($headers as $k => $v ){
            echo "$k\n";
        }
    }
    function excel()
    {
        App::import('vendor', 'phpexcel/phpexcel');
         
        echo "PHPExcel_Cell_DataType::TYPE_STRING ", PHPExcel_Cell_DataType::TYPE_STRING, "\n";
        echo "PHPExcel_Cell_DataType::TYPE_NUMERIC", PHPExcel_Cell_DataType::TYPE_NUMERIC, "\n";
    }
}
?>
