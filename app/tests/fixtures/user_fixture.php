<?php

/* User Fixture generated on: 2010-10-01 20:10:38 : 1285980818 */

class UserFixture extends CakeTestFixture {

    var $name = 'User';
    var $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'comment' => 'id'),
        'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'comment' => 'loginname', 'charset' => 'utf8'),
        'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => 'password', 'charset' => 'utf8'),
        'displayname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'department' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => 'email', 'charset' => 'utf8'),
        'tel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => 'email', 'charset' => 'utf8'),
        'grid_type' => array('type' => 'integer', 'null' => true, 'default' => 0, 'comment' => 'grid_type'),
        'dateformat' => array('type' => 'integer', 'null' => true, 'default' => 0, 'comment' => 'grid_type'),
        'role_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 'role_id'),        
        'disabled' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => 'disabled'),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'comment' => 'created'),
        'updated' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'comment' => 'updated'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'idx_users_pkey' => array('column' => 'username', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    var $records = array(
        array(
            'id' => 1,
            'username' => 'test_user',
            'password' => '0f6cdecb8e9bd27c2f83a909362e8c96d3fede6f', // = 1234
            'displayname' => 'test_operator',
            'department' => 'hoge department',
            'email' => 'test1@example.com',
            'tel' => '0120-444-444',
            'grid_type' => 1,
            'dateformat' => 1,
            'role_id' => 1,
            'disabled' => 0,
            'created' => '2010-10-01 20:53:38',
            'updated' => '2010-10-01 20:53:38'
        ),
        array(
            'id' => 2,
            'username' => 'test2user',
            'password' => '0f6cdecb8e9bd27c2f83a909362e8c96d3fede6f', // = 1234
            'displayname' => 'test2operator',
            'department' => 'hoge department',
            'email' => 'test2@example.com',
            'tel' => '0120-444-444',
            'grid_type' => 1,
            'dateformat' => 1,
            'role_id' => 2,
            'disabled' => 0,
            'created' => '2010-10-01 20:53:38',
            'updated' => '2010-10-01 20:53:38'
        ),
    );

}

?>
