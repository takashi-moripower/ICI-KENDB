<?php

/* SelectableItem Fixture generated on: 2010-10-20 08:10:51 : 1287532251 */

class SelectableItemFixture extends CakeTestFixture
{

    var $name = 'SelectableItem';
    var $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
        'category' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'list_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'sort_order' => array('type' => 'integer', 'null' => false, 'default' => NULL),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    var $records = array(
        array(
            'id' => 1,
            'category' => 'Entrust',
            'list_name' => 'area_of_research',
            'name' => 'Item1-1-1',
            'sort_order' => 100
        ),
        array(
            'id' => 2,
            'category' => 'Entrust',
            'list_name' => 'area_of_research',
            'name' => 'Item1-1-2',
            'sort_order' => 1
        ),
        array(
            'id' => 3,
            'category' => 'Entrust',
            'list_name' => 'List2',
            'name' => 'Item1-2-1',
            'sort_order' => 1
        ),
        array(
            'id' => 4,
            'category' => 'Category2',
            'list_name' => 'area_of_research',
            'name' => 'Item2-1-1',
            'sort_order' => 1
        ),
    );

}

?>