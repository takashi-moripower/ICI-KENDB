<?php
/* Summary Fixture generated on: 2011-06-23 11:06:52 : 1308797992 */
class SummaryFixture extends CakeTestFixture {
	var $name = 'Summary';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'model_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'model_name_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'model_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'model_parent_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'is_project_record' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'year' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'researcher_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'researcher_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cooperate_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'start_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'end_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'amount' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'direct_cost' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indirect_cost' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'subject' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fund_owner' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'department' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'job_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'research_type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'research_area' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'disabledd' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'open_to_public' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'hidden' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'created_by' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'updated_by' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 1,
			'model_parent_id' => 3,
			'is_project_record' => 0,
			'year' => 1,
			'researcher_name' => '田中一郎',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => '1234567',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'はじめのデータ',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => '助手',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 2,
			'model_parent_id' => 3,
			'is_project_record' => 0,
			'year' => 1,
			'researcher_name' => '佐藤二郎',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => '2345678',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => '特任准教授',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 3,
			'model_parent_id' => 3,
			'is_project_record' => 0,
			'year' => 1,
			'researcher_name' => '田中三郎',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => '特任准教授',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 4,
			'model_parent_id' => 3,
			'is_project_record' => 1,
			'year' => 1,
			'researcher_name' => 'Lorem ipsum dolor sit amet',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => ' 　スペース２つ入りの研究課題 　',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 5,
			'model_parent_id' => 3,
			'is_project_record' => 1,
			'year' => 1,
			'researcher_name' => 'Lorem ipsum dolor sit amet',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 6,
			'model_parent_id' => 3,
			'is_project_record' => 1,
			'year' => 1,
			'researcher_name' => 'Lorem ipsum dolor sit amet',
			'researcher_no' => '666666',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 7,
			'model_parent_id' => 3,
			'is_project_record' => 1,
			'year' => 1,
			'researcher_name' => 'Lorem ipsum dolor sit amet',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 8,
			'model_parent_id' => 3,
			'is_project_record' => 1,
			'year' => 1,
			'researcher_name' => 'Lorem ipsum dolor sit amet',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'データベース',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 9,
			'model_parent_id' => 3,
			'is_project_record' => 1,
			'year' => 1,
			'researcher_name' => 'Lorem ipsum dolor sit amet',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 10,
			'model_parent_id' => 3,
			'is_project_record' => 1,
			'year' => 1,
			'researcher_name' => 'Lorem ipsum dolor sit amet',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 0,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 11,
			'model_name' => 'Encourage',
			'model_name_id' => 4,
			'model_id' => 1,
			'model_parent_id' => null,
			'is_project_record' => 1,
			'year' => 1,
			'researcher_name' => 'Lorem ipsum dolor sit amet',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 1,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 12,
			'model_name' => 'NedoJstOther',
			'model_name_id' => 8,
			'model_id' => 12,
			'model_parent_id' => null,
			'is_project_record' => 1,
			'year' => 1,
			'researcher_name' => 'Lorem ipsum dolor sit amet',
			'researcher_no' => 'Lorem ipsum dolor sit amet',
			'cooperate_no' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2011-06-23',
			'end_date' => '2011-06-23',
			'amount' => 1,
			'direct_cost' => 1,
			'indirect_cost' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'fund_owner' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'job_title' => 'Lorem ipsum dolor sit amet',
			'memo' => 'Lorem ipsum dolor sit amet',
			'research_type' => 'Lorem ipsum dolor sit amet',
			'research_area' => 'Lorem ipsum dolor sit amet',
			'disabled' => 0,
			'open_to_public' => 0,
			'hidden' => 1,
			'created' => '2011-06-23 11:59:52',
			'updated' => '2011-06-23 11:59:52',
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>
