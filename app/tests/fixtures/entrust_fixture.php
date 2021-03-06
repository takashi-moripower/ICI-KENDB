<?php

/* Entrust Fixture generated on: 2010-10-25 11:10:11 : 1287972191 */

class EntrustFixture extends CakeTestFixture {

    var $name = 'Entrust';
    var $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
        'year' => array('type' => 'integer', 'null' => false, 'default' => NULL),
        'cooperate_no' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'researcher_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'project_code' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'project_type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'person_in_charge' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'resolution_no' => array('type' => 'integer', 'null' => true, 'default' => NULL),
        'branch_no' => array('type' => 'integer', 'null' => true, 'default' => NULL),
        'reception_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
        'start_budget_year' => array('type' => 'integer', 'null' => true, 'default' => NULL),
        'credit' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'researcher_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'department' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'major_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'job_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'extension' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'post_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'subject' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'start_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
        'end_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
        'area_of_research' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'singular_or_multi' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'new_or_continuance' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'payment' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'division_count' => array('type' => 'integer', 'null' => true, 'default' => NULL),
        'continuance_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'applicant_name_1' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'category_of_business' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'association_type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'applicant_scale' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'applicant_name_2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'business_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'representative' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'address' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'associate_researcher_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'number_of_researchers' => array('type' => 'integer', 'null' => true, 'default' => NULL),
        'formula' => array('type' => 'integer', 'null' => true, 'default' => 1),
        'former_payment_d' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'former_payment_r' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'former_payment_i' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'former_payment_sum' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'current_payment_dr' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'current_payment_u' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'current_payment_g' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'current_payment_d' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'current_payment_r' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'current_payment_i' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'current_payment_sum' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'current_payment_alloc' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next1_payment_d' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next1_payment_r' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next1_payment_i' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next1_payment_sum' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next2_payment_d' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next2_payment_r' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next2_payment_i' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next2_payment_sum' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next3_payment_d' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next3_payment_r' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next3_payment_i' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next3_payment_sum' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next4_payment_d' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next4_payment_r' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next4_payment_i' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'next4_payment_sum' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'd_total' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'r_total' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'i_total' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'total_amount' => array('type' => 'integer', 'null' => true, 'default' => '0'),
        'contraction_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
        'resolution_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
        'payment_due' => array('type' => 'date', 'null' => true, 'default' => NULL),
        'payment_month' => array('type' => 'integer', 'null' => true, 'default' => NULL),
        'payment_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
        'advance' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ow_post_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ow_address' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ow_company_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ow_section' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ow_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ow_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ow_tel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ow_fax' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ow_email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bill_post_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bill_address' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bill_company_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bill_section' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bill_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bill_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bill_tel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bill_fax' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bill_email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'entrust_remarks' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'open_to_public' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'disabled' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
        'hidden' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
        'updated' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
        'created_by' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'updated_by' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    var $records = array(
        array(
            'id' => 1,
            'year' => 2010,
            'cooperate_no' => '11111-1',
            'researcher_no' => '88888888',
            'project_code' => '33333',
            'project_type' => 'Lorem ipsum dolor sit amet',
            'person_in_charge' => 'Lorem ipsum dolor sit amet',
            'resolution_no' => 1,
            'branch_no' => 1,
            'reception_date' => '2010-10-25',
            'start_budget_year' => 2009,
            'credit' => 1,
            'researcher_name' => 'Lorem ipsum dolor sit amet',
            'department' => 'Lorem ipsum dolor sit amet',
            'major_name' => 'Lorem ipsum dolor sit amet',
            'job_title' => 'Lorem ipsum dolor sit amet',
            'extension' => '1234',
            'post_no' => '123-0001',
            'email' => 'Loremipsumdolorsitamet@example.com',
            'subject' => 'Lorem ipsum dolor sit amet',
            'start_date' => '2010-10-25',
            'end_date' => '2010-10-25',
            'area_of_research' => 'Lorem ipsum dolor sit amet',
            'singular_or_multi' => 'Lorem ipsum dolor sit amet',
            'new_or_continuance' => 'Lorem ipsum dolor sit amet',
            'payment' => 'Lorem ipsum dolor sit amet',
            'division_count' => 1,
            'continuance_no' => '12345',
            'applicant_name_1' => 'Lorem ipsum dolor sit amet',
            'category_of_business' => 'Lorem ipsum dolor sit amet',
            'association_type' => 'Lorem ipsum dolor sit amet',
            'applicant_scale' => 'Lorem ipsum dolor sit amet',
            'applicant_name_2' => 'Lorem ipsum dolor sit amet',
            'business_title' => 'Lorem ipsum dolor sit amet',
            'representative' => 'Lorem ipsum dolor sit amet',
            'address' => 'Lorem ipsum dolor sit amet',
            'associate_researcher_name' => 'Lorem ipsum dolor sit amet',
            'number_of_researchers' => 1,
            'formula' => 1,
            'former_payment_d' => 1,
            'former_payment_r' => 1,
            'former_payment_i' => 1,
            'former_payment_sum' => 1,
            'current_payment_dr' => 1,
            'current_payment_u' => 1,
            'current_payment_g' => 1,
            'current_payment_d' => 1,
            'current_payment_r' => 1,
            'current_payment_i' => 1,
            'current_payment_sum' => 1,
            'current_payment_alloc' => 1,
            'next1_payment_d' => 1,
            'next1_payment_r' => 1,
            'next1_payment_i' => 1,
            'next1_payment_sum' => 1,
            'next2_payment_d' => 1,
            'next2_payment_r' => 1,
            'next2_payment_i' => 1,
            'next2_payment_sum' => 1,
            'next3_payment_d' => 1,
            'next3_payment_r' => 1,
            'next3_payment_i' => 1,
            'next3_payment_sum' => 1,
            'next4_payment_d' => -1000,
            'next4_payment_r' => -1,
            'next4_payment_i' => -9999,
            'next4_payment_sum' => -11000,
            'd_total' => 1,
            'r_total' => 1,
            'i_total' => 1,
            'total_amount' => 1,
            'contraction_date' => '2010-10-25',
            'resolution_date' => '2010-10-25',
            'payment_due' => '2010-10-25',
            'payment_month' => 1,
            'payment_date' => '2010-10-25',
            'advance' => 'Lorem ipsum dolor sit amet',
            'ow_post_no' => '100-0005',
            'ow_address' => 'Lorem ipsum dolor sit amet',
            'ow_company_name' => 'Lorem ipsum dolor sit amet',
            'ow_section' => 'Lorem ipsum dolor sit amet',
            'ow_title' => 'Lorem ipsum dolor sit amet',
            'ow_name' => 'Lorem ipsum dolor sit amet',
            'ow_tel' => '0120-444-444',
            'ow_fax' => '0120-100-100',
            'ow_email' => 'Loremipsumdolorsitamet@example.com',
            'bill_post_no' => '123-4567',
            'bill_address' => 'Lorem ipsum dolor sit amet',
            'bill_company_name' => 'Lorem ipsum dolor sit amet',
            'bill_section' => 'Lorem ipsum dolor sit amet',
            'bill_title' => 'Lorem ipsum dolor sit amet',
            'bill_name' => 'Lorem ipsum dolor sit amet',
            'bill_tel' => '03-0000-1111',
            'bill_fax' => '03-1111-2222',
            'bill_email' => 'Loremipsumdolorsitamet@example.com',
            'entrust_remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'open_to_public' => 1,
            'disabled' => 0,
            'hidden' => 0,
            'created' => '2010-10-25 11:03:11',
            'updated' => '2010-10-25 11:03:11',
            'created_by' => 'hoge',
            'updated_by' => ''
        ),
    );

}

?>
