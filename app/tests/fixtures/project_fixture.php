<?php

/* Project Fixture generated on: 2011-01-25 14:01:23 : 1295932643 */

class ProjectFixture extends CakeTestFixture {

    var $name = 'Project';
    var $fields = array(
        'project_code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'long_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'short_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'researcher_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'job_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'department_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'department' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'goal' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'cooperate_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'researcher_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'indexes' => array('idx_projects_pkey' => array('column' => 'project_code', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    var $records = array(
        array(
            'project_code' => '12345',
            'long_name' => 'テストプロジェクト長名',
            'short_name' => 'テスト短名',
            'researcher_name' => '田中一郎',
            'job_title' => '特任教授',
            'department_no' => '1111',
            'department' => 'テスト研究科',
            'goal' => 'プロジェクトの<br />ゴール',
            'cooperate_no' => '00000000',
            'researcher_no' => '99999999'
        ),
    );

}

?>