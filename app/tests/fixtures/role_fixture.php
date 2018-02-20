<?php

/* Role Fixture generated on: 2010-11-26 10:11:24 : 1290735804 */

class RoleFixture extends CakeTestFixture {

    var $name = 'Role';
    var $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
        'updated' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
    );
    var $records = array(
        array(
            'id' => 1,
            'name' => 'システム管理者',
            'created' => '2010-11-26 10:43:24',
            'updated' => '2010-11-26 10:43:24'
        ),
        array(
            'id' => 2,
            'name' => '閲覧者',
            'created' => '2010-11-26 10:43:24',
            'updated' => '2010-11-26 10:43:24'
        ),
    );

}

?>