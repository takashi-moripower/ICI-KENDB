<?php

class DbShell extends Shell {

    function _welcome() {
        // parent::_welcomde();
        // echo 'another code';
    }

    protected function query($sql){
	App::import('Model', 'AppModel');
        $mod = new AppModel();   
	return $mod->query($sql);
        // return (new AppModel())->query($sql);    // 5.4 >
    }
    
    protected function query_print($sql)
    {
        echo json_encode($this->query($sql), 128);  // 5.3 JSON_PRETTY_PRINT);
    }

    protected function mysqldump($file, $table="", $opts=array() )
    {
	App::import('Core', 'ConnectionManager'); 
        $db =& ConnectionManager::getDataSource('default');

        $cmd = sprintf("mysqldump %s -u %s --password='%s' %s {$table} > {$file}",
            join(" ", $opts),
            $db->config['login'],
            $db->config['password'],
            $db->config['database']);

        exec($cmd);
    }

    protected function mysql($file)
    {
	App::import('Core', 'ConnectionManager'); 
        $db =& ConnectionManager::getDataSource('default');

        $redir = @$file ? "<" : "";
        $file = @$file ?: '';
        $cmd = sprintf("mysql --default-character-set=utf8 %s -u %s --password='%s' %s {$redir} {$file}",
            '',
            $db->config['login'],
            $db->config['password'],
            $db->config['database']);
        
        if( $file != '' ){
            exec($cmd);
        } else {
            echo "{$cmd}\n";
        }
    }
        
    function main()
    {
        echo "1)Tools:\n"; 
        echo "conf: database configration\n";
        echo "tables:  list tables\n";
        echo "schema:  list field infos for a table\n";
        echo "exec: execute SQL script and print output\n";
        echo "\n\n";
        echo "2)mysqldump related:\n";
        echo "dump_ddl: dump DDL in SQL file\n";
        echo "dump_data: dump data in SQL file\n";
        echo "load: load SQL script\n";
       
    }

    function conf()
    {
	App::import('Core', 'ConnectionManager'); 
        $datasource = ConnectionManager::getDataSource('default');
        echo json_encode($datasource->config, 128);	// JSON_PRETTY_PRINT); 5.3
    }

    function tables()
    {
        foreach($this->query("show tables") as $rec){
            # echo $rec['TABLE_NAMES']['Tables_in_kendb'], "\n"; 
	    $rec = array_values($rec);
	    $rec = $rec[0];
            $rec = array_values($rec);
            echo $rec[0], "\n";
            // echo array_values(array_values($rec)[0])[0] , "\n";
        }
    }  

    function schema()
    {
        $columns = array(
            "Field", "Type", "Null", "Key", "Default", "Extra" );

        echo join("\t|", $columns), "\n";
        foreach($this->query("desc {$this->args[0]}") as $field)
        {
            $x = array_values($field);
            $x = $x[0];
            foreach($columns as $c ){
                echo "{$x[$c]} \t|";
            }
            echo "\n";
        }
    }  

    function dump()
    {
        $file = @$this->args[0] ?: 'dump.sql';
	$this->mysqldump($file);
    }
    function dump_ddl()
    {
        $table = @$this->args[0] ?: '';
        $file = sprintf("ddl.%s.sql", @$table ?: "all");
        $this->mysqldump($file, $table, array("-d"));
    }

    function dump_data()
    {
        $table = @$this->args[0] ?: '';
        $file = sprintf("data.%s.sql", @$table ?: "all");
        $this->mysqldump($file, $table, 
            array(
                "--skip-extended-insert",
                "-c",
                "-t")
        );
    }
    function dump_proc()
    {
        $table = @$this->args[0] ?: '';
        $file = sprintf("proc.%s.sql", @$table ?: "all");
        $this->mysqldump($file, $table, array("-R", "-ntd"));
    }

    function table_collation()
    {
        foreach($this->query("SHOW TABLE STATUS") as $stat )
        {
            $rec= $stat['TABLES'];
            echo "{$rec['Name']}: {$rec['Collation']}\n";
        }
    }

    function load()
    {
        if(count($this->args) < 1){
            echo "SQLスクリプト名を指定してください\n";
            return ;
        }
        $this->mysql($this->args[0]);
    }

    function echo_mysql()
    {
        $this->mysql('');
    }


    function exec()
    {
        if(count($this->args) < 1){
            echo "SQLスクリプト名を指定してください\n";
            return ;
        }
        $res = $this->query(file_get_contents($this->args[0])); 
        echo json_encode($res, 128);		// JSON_PRETTY_PRINT); 5.3
    }
}
?>
