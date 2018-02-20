<?php

/* Information Fixture generated on: 2011-01-06 16:01:30 : 1294299750 */

class InformationFixture extends CakeTestFixture {

    var $name = 'Information';
    var $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'comment' => 'id'),
        'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_general_ci', 'comment' => 'name', 'charset' => 'utf8'),
        'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'disabled' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
        'startdate' => array('type' => 'date', 'null' => true, 'default' => NULL),
        'enddate' => array('type' => 'date', 'null' => true, 'default' => NULL),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
        'updated' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    var $records = array(
        array(
            'id' => 1,
            'name' => 'お知らせテストタイトル',
            'description' => 'これはお知らせテストです。',
            'disabled' => 0,
            'startdate' => '2011-01-06',
            'enddate' => '2037-12-31',
            'created' => '2011-01-06 16:42:30',
            'updated' => '2011-01-06 16:42:30'
        ),
    );

}

?>