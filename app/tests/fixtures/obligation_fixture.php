<?php

/* Obligation Fixture generated on: 2011-01-25 14:01:19 : 1295932519 */

class ObligationFixture extends CakeTestFixture {

    var $name = 'Obligation';
    var $fields = array(
        'obligation_code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'obligation_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ob_represent_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ob_job_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ob_postal_code_address' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ob_section' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ob_person_in_charge' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'obligation_name_short' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ob_postal_code' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ob_address' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'indexes' => array('idx_obligations_pkey' => array('column' => 'obligation_code', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    var $records = array(
        array(
            'obligation_code' => '131131',
            'obligation_name' => '債主名',
            'ob_represent_name' => '代表太郎',
            'ob_job_title' => '代表取締役社長',
            'ob_postal_code_address' => '105-0002 東京都港区愛宕1-6-8',
            'ob_section' => '総務部',
            'ob_person_in_charge' => '総務太郎',
            'obligation_name_short' => '短縮名',
            'ob_postal_code' => '105-0002',
            'ob_address' => '東京都港区愛宕1-6-8'
        ),
        array(
            'obligation_code' => '131132',
            'obligation_name' => 'テスト産業株式会社',
            'ob_represent_name' => 'テスト太郎',
            'ob_job_title' => '取締役',
            'ob_postal_code_address' => '230-0000 横浜市西区南幸1-1-1',
            'ob_section' => '管理部',
            'ob_person_in_charge' => '管理五郎',
            'obligation_name_short' => 'テスト',
            'ob_postal_code' => '230-0000',
            'ob_address' => '横浜市西区南幸1-1-1'
        ),
    );

}

?>