<?php
class BackupDatabaseShell extends Shell {

    /**
     * データベースのバックアップ
     */
    function main()
    {
        $database_config = 'default';

        Configure::write('debug', 0);
        App::import('Core', 'ConnectionManager');
        $db =& ConnectionManager::getDataSource($database_config);
        $filename = sprintf('dump_%s.gz', date("w"));
        $path = TMP. "dbbackup/" . $filename;
        $cmd = sprintf("mysqldump -u %s --password='%s' %s --opt | gzip> %s"
                ,$db->config['login']
                ,$db->config['password']
                ,$db->config['database']
                ,$path);
        exec($cmd);
        return;
    }
}

?>
