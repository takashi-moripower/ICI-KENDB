<?php

/* History Fixture generated on: 2010-10-27 18:10:34 : 1288172794 */

class HistoryFixture extends CakeTestFixture {

    var $name = 'History';
    var $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
        'model_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'model_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
        'archive_data' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'idx_histories_ukey' => array('column' => array('model_name', 'model_id'), 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    var $records = array(
        array(
            'id' => 1,
            'model_name' => 'Entrust',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:7:"Entrust";a:2:{s:2:"id";i:1;s:13:"researcher_no";s:6:"808080";}}',
            'created' => '2010-10-27 18:46:34'
        ),
        array(
            'id' => 2,
            'model_name' => 'Adoption',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:8:"Adoption";a:2:{s:2:"id";i:1;s:5:"email";s:20:"hogehoge@example.com";}}',
            'created' => '2011-01-26 08:50:50'
        ),
        array(
            'id' => 3,
            'model_name' => 'AssessedContribution',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:20:"AssessedContribution";a:2:{s:2:"id";i:1;s:5:"email";s:20:"hogehoge@example.com";}}',
            'created' => '2011-01-26 08:50:50'
        ),
        array(
            'id' => 4,
            'model_name' => 'Contract',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:8:"Contract";a:2:{s:2:"id";i:1;s:13:"researcher_no";s:8:"44811111";}}',
            'created' => '2011-01-26 08:50:50'
        ),
        array(
            'id' => 5,
            'model_name' => 'Donation',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:8:"Donation";a:2:{s:2:"id";i:1;s:13:"researcher_no";s:8:"44811111";}}',
            'created' => '2011-01-26 08:50:50'
        ),
        array(
            'id' => 6,
            'model_name' => 'Encourage',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:9:"Encourage";a:2:{s:2:"id";i:1;s:13:"researcher_no";s:8:"44811111";}}',
            'created' => '2011-01-26 08:50:50'
        ),
        array(
            'id' => 7,
            'model_name' => 'Grant',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:5:"Grant";a:2:{s:2:"id";i:1;s:13:"researcher_no";s:8:"44811111";}}',
            'created' => '2011-01-26 08:50:50'
        ),
        array(
            'id' => 8,
            'model_name' => 'MhlwResearchGrant',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:17:"MhlwResearchGrant";a:2:{s:2:"id";i:1;s:13:"researcher_no";s:8:"44811111";}}',
            'created' => '2011-01-26 08:50:50'
        ),
        array(
            'id' => 9,
            'model_name' => 'NedoJstOther',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:12:"NedoJstOther";a:2:{s:2:"id";i:1;s:5:"email";s:20:"hogehoge@example.com";}}',
            'created' => '2011-01-26 08:50:50'
        ),
        array(
            'id' => 10,
            'model_name' => 'OtherResearchGrant',
            'model_id' => 1,
            'archive_data' => 'a:1:{s:18:"OtherResearchGrant";a:2:{s:2:"id";i:1;s:5:"email";s:20:"hogehoge@example.com";}}',
            'created' => '2011-01-26 08:50:50'
        ),
    );

}

?>
