<?php

/* EditStatus Fixture generated on: 2010-10-22 08:10:46 : 1287704626 */

class EditStatusFixture extends CakeTestFixture
{

    var $name = 'EditStatus';
    var $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
        'model_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'data_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
        'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    var $records = array(
        array(
            'id' => 1,
            'model_name' => 'model1',
            'data_id' => 1,
            'user_id' => 1,
            'created' => '2010-10-22 08:43:46'
        ),
        array(
            'id' => 2,
            'model_name' => 'model1',
            'data_id' => 1,
            'user_id' => 2,
            'created' => '2010-10-22 08:43:46'
        ),
        array(
            'id' => 3,
            'model_name' => 'model2',
            'data_id' => 1,
            'user_id' => 2,
            'created' => '2010-10-22 08:43:46'
        ),
    );

}

?>