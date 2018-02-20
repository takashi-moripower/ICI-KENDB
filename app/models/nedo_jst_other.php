<?php
/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link	  none
 */

/**
 * NedoJstOther
 *
 * NEDO/JST/その他
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */

class NedoJstOther extends AppModel {

	var $name = 'NedoJstOther';
	var $actsAs = array('Search.Searchable', 'SoftDeletable' => array('field' => 'disabled', 'find' => false));
	var $download_file_prefix = "jutaku_seifu";
	var $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => false,
				'on' => 'update',
			),
		),
		'year' => array(
			'nendoRange' => array(
				'rule' => array('nendoRange', null, null),
			),
		),
		'cooperate_no' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'researcher_no' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'allowEmpty' => true,
			),
		),
		'arrange_no_1' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'arrange_no_2' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'arrange_no_3' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'arrange_no_4' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'arrange_no_5' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'project_code' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'application_reception_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_reception_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_reception_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_reception_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_reception_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_reception_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'titech_reception_no' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'cc_titech_reception_no_1' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'cc_titech_reception_no_2' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'cc_titech_reception_no_3' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'cc_titech_reception_no_4' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'cc_titech_reception_no_5' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
		'notification_drafting_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_drafting_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_drafting_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_drafting_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_drafting_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_drafting_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'notification_settlement_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_settlement_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_settlement_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_settlement_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_settlement_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_settlement_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'notification_send_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_send_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_send_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_send_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_send_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_notification_send_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contract_send_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_send_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_send_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_send_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_send_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_send_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contract_reception_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_reception_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_reception_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_reception_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_reception_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cc_contract_reception_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),

		'amount_fixed_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'charge' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'charged_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'claimed_balance' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'charge_1' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),

		'statement_send_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'statement_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'charge_2' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'statement_send_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'statement_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'charge_3' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),

		'statement_send_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'statement_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'charge_4' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),

		'statement_send_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'statement_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'charge_5' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'statement_send_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'statement_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'charge_6' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'statement_send_date_6' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'statement_date_6' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_due_6' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'payment_date_6' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'accounting_report_due' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'accounting_report_request_day' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'accounting_report_reception_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'accounting_report_drafting_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'accounting_report_settlement_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'accounting_report_send_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'accomplishment_due' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'accomplishment_send_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'allowEmpty' => true,
			),
		),
		'start_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'end_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'memorandum_start_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'memorandum_end_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'reception_decision_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_1' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_2' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_3' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_4' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_5' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_6' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_7' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_8' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_9' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_10' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_11' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_12' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_13' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_14' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_15' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_16' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_17' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_18' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_19' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'contraction_change_date_20' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'cp_post_no' => array(
			'numericHyphen' => array(
				'rule' => array('numericHyphen'),
				'allowEmpty' => true,
			),
		),
//		'cp_tel' => array(
//			'numericHyphen' => array(
//				'rule' => array('numericHyphen'),
//				'allowEmpty' => true,
//			),
//		),
//		'cp_extension' => array(
//			'numericHyphen' => array(
//				'rule' => array('numericHyphen'),
//				'allowEmpty' => true,
//			),
//		),
//		'cp_fax' => array(
//			'numericHyphen' => array(
//				'rule' => array('numericHyphen'),
//				'allowEmpty' => true,
//			),
//		),
		'cp_email' => array(
			'email' => array(
				'rule' => array('email'),
				'allowEmpty' => true,
			),
		),
		'total_reception_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_1' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_1' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_2' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_2' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_3' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_3' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_4' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_4' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_5' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_5' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_6' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_6' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_7' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_7' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_8' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_8' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_9' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_9' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'plural_year_10' => array(
			'warekiRange' => array(
				'rule' => array('warekiRange'),
				'allowEmpty' => true,
			),
		),
		'plural_contract_amount_10' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'photothermic_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'other_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'research_expense' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'reconsignment_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'general_administration_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'total_primary_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'indirect_cost' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'labo_earnings' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'titech_earnings' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'this_year_reception_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'statement_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'income_1' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'income_2' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'income_3' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'income_4' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'income_5' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'income_6' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'former1_project_code' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'former2_project_code' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'former3_project_code' => array(
			'alphaNumericHyphen' => array(
				'rule' => array('alphaNumericHyphen'),
				'allowEmpty' => true,
			),
		),
		'reported_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'fixed_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'balance' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'turnback_amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => true,
			),
		),
		'advance_confirmation_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'goods_system_registration_date' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => true,
			),
		),
		'disabled' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'allowEmpty' => true,
			),
		),
		'hidden' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'allowEmpty' => true,
			),
		),
		'open_to_public' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'allowEmpty' => true,
			),
		),

	);
	var $hasMany = array(
		'NedoJstOtherNode' => array(
			'className' => 'NedoJstOtherNode',
			'foreign_key' => 'nedo_jst_other_id',
			'conditions' => array(
				"not" => array(
					array('NedoJstOtherNode.nedo_jst_other_id' => null),
					array('NedoJstOtherNode.disabled' => true),
				),
			),
			'order' => 'NedoJstOtherNode.id asc',
			'dependent' => true,
		)
	);
	/**
	 * CSV入出力用の項目一覧
	 *
	 * @var file_columns
	 */
	var $file_columns = array(
		"id",
		"nedo_jst_other_id",
		"year",
		"cooperate_no",
		"project_type",
		"researcher_no",
		"arrange_no_1",
		"arrange_no_2",
		"arrange_no_3",
		"arrange_no_4",
		"arrange_no_5",
		"project_code",
		"master_registration",
		"person_in_charge",
		"application_reception_date",
		"cc_reception_date_1",
		"cc_reception_date_2",
		"cc_reception_date_3",
		"cc_reception_date_4",
		"cc_reception_date_5",
		"titech_reception_no",
		"cc_titech_reception_no_1",
		"cc_titech_reception_no_2",
		"cc_titech_reception_no_3",
		"cc_titech_reception_no_4",
		"cc_titech_reception_no_5",
		"notification_drafting_date",
		"cc_notification_drafting_date_1",
		"cc_notification_drafting_date_2",
		"cc_notification_drafting_date_3",
		"cc_notification_drafting_date_4",
		"cc_notification_drafting_date_5",
		"notification_settlement_date",
		"cc_notification_settlement_date_1",
		"cc_notification_settlement_date_2",
		"cc_notification_settlement_date_3",
		"cc_notification_settlement_date_4",
		"cc_notification_settlement_date_5",
		"notification_send_date",
		"cc_notification_send_date_1",
		"cc_notification_send_date_2",
		"cc_notification_send_date_3",
		"cc_notification_send_date_4",
		"cc_notification_send_date_5",
		"contract_send_date",
		"cc_contract_send_date_1",
		"cc_contract_send_date_2",
		"cc_contract_send_date_3",
		"cc_contract_send_date_4",
		"cc_contract_send_date_5",
		"contract_reception_date",
		"cc_contract_reception_date_1",
		"cc_contract_reception_date_2",
		"cc_contract_reception_date_3",
		"cc_contract_reception_date_4",
		"cc_contract_reception_date_5",
		"amount_fixed_date",
		"divide_paying",
		"adjust_paying",
		"charge_format",
		"charge",
		"charged_amount",
		"claimed_balance",
		"charge_1",
		"statement_send_date_1",
		"statement_date_1",
		"payment_due_1",
		"payment_date_1",
		"charge_2",
		"statement_send_date_2",
		"statement_date_2",
		"payment_due_2",
		"payment_date_2",
		"charge_3",
		"statement_send_date_3",
		"statement_date_3",
		"payment_due_3",
		"payment_date_3",
		"charge_4",
		"statement_send_date_4",
		"statement_date_4",
		"payment_due_4",
		"payment_date_4",
		"charge_5",
		"statement_send_date_5",
		"statement_date_5",
		"payment_due_5",
		"payment_date_5",
		"charge_6",
		"statement_send_date_6",
		"statement_date_6",
		"payment_due_6",
		"payment_date_6",
		"accounting_report_due",
		"accounting_report_format",
		"accounting_report_request_day",
		"accounting_report_reception_date",
		"accounting_report_drafting_date",
		"accounting_report_settlement_date",
		"accounting_report_send_date",
		"accomplishment_due",
		"accomplishment_format",
		"accomplishment_send_date",
		"asset_belongingness",
		"continuance_forcast",
		"new_or_continuance",
		"singular_or_multi",
		"multi_year_no",
		"competitive_fund",
		"area",
		"department",
		"major_name",
		'institute_code',
		'school_code',
		'course_code',
		"job_title",
		"researcher_name",
		"email",
		"co_researcher",
		"head_of_department",
		"subject",
		"ordering_organization_name",
		"applicant_job_title",
		"applicant_name",
		"contractor_job_title",
		"contractor_name",
		"related_ministries",
		"business_name",
		"ordering_organization_type",
		"government_type",
		"area_of_research",
		"start_date",
		"end_date",
		"memorandum_start_date",
		"memorandum_end_date",
		"reception_decision_date",
		"contraction_date",
		"contraction_change_date_1",
		"contraction_change_outline_1",
		"contraction_change_date_2",
		"contraction_change_outline_2",
		"contraction_change_date_3",
		"contraction_change_outline_3",
		"contraction_change_date_4",
		"contraction_change_outline_4",
		"contraction_change_date_5",
		"contraction_change_outline_5",
		"contraction_change_date_6",
		"contraction_change_outline_6",
		"contraction_change_date_7",
		"contraction_change_outline_7",
		"contraction_change_date_8",
		"contraction_change_outline_8",
		"contraction_change_date_9",
		"contraction_change_outline_9",
		"contraction_change_date_10",
		"contraction_change_outline_10",
		"contraction_change_date_11",
		"contraction_change_outline_11",
		"contraction_change_date_12",
		"contraction_change_outline_12",
		"contraction_change_date_13",
		"contraction_change_outline_13",
		"contraction_change_date_14",
		"contraction_change_outline_14",
		"contraction_change_date_15",
		"contraction_change_outline_15",
		"contraction_change_date_16",
		"contraction_change_outline_16",
		"contraction_change_date_17",
		"contraction_change_outline_17",
		"contraction_change_date_18",
		"contraction_change_outline_18",
		"contraction_change_date_19",
		"contraction_change_outline_19",
		"contraction_change_date_20",
		"contraction_change_outline_20",
		"cp_post_no",
		"cp_address",
		"cp_section",
		"cp_job_title",
		"cp_name",
		"cp_tel",
		"cp_extension",
		"cp_fax",
		"cp_email",
		"total_reception_amount",
		"plural_year_1",
		"plural_contract_amount_1",
		"plural_year_2",
		"plural_contract_amount_2",
		"plural_year_3",
		"plural_contract_amount_3",
		"plural_year_4",
		"plural_contract_amount_4",
		"plural_year_5",
		"plural_contract_amount_5",
		"plural_year_6",
		"plural_contract_amount_6",
		"plural_year_7",
		"plural_contract_amount_7",
		"plural_year_8",
		"plural_contract_amount_8",
		"plural_year_9",
		"plural_contract_amount_9",
		"plural_year_10",
		"plural_contract_amount_10",
		"photothermic_cost",
		"other_cost",
		"research_expense",
		"reconsignment_cost",
		"general_administration_cost",
		"total_primary_cost",
		"titech_earnings",
		"labo_earnings",
		"indirect_cost",
		"this_year_reception_amount",
		"statement_amount",
		"income_1",
		"income_2",
		"income_3",
		"income_4",
		"income_5",
		"income_6",
		"former1_project_code",
		"former2_project_code",
		"former3_project_code",
		"functions_manual",
		"implementation_document",
		"contract_management_no",
		"reported_amount",
		"fixed_amount",
		"balance",
		"turnback_amount",
		"advance_confirmation_date",
		"goods_system_registration_date",
		"remarks",
	);
	/**
	 * From-Toで検索する項目
	 */
	var $numeric_search_field = array(
		"year",
		"claimed_balance",
		"charge",
		"charged_amount",
		"charge_1",
		"charge_2",
		"charge_3",
		"charge_4",
		"charge_5",
		"charge_6",
		"total_reception_amount",
		"plural_contract_amount_1",
		"plural_contract_amount_2",
		"plural_contract_amount_3",
		"plural_contract_amount_4",
		"plural_contract_amount_5",
		"plural_contract_amount_6",
		"plural_contract_amount_7",
		"plural_contract_amount_8",
		"plural_contract_amount_9",
		"plural_contract_amount_10",
		"photothermic_cost",
		"other_cost",
		"research_expense",
		"reconsignment_cost",
		"general_administration_cost",
		"total_primary_cost",
		"titech_earnings",
		"labo_earnings",
		"indirect_cost",
		"this_year_reception_amount",
		"statement_amount",
		"income_1",
		"income_2",
		"income_3",
		"income_4",
		"income_5",
		"income_6",
		"reported_amount",
		"fixed_amount",
		"balance",
		"turnback_amount",
	);
	/**
	 * 日付カラム
	 *
	 * @var date_columns
	 */
	var $date_columns = array(
		"application_reception_date",
		"cc_reception_date_1",
		"cc_reception_date_2",
		"cc_reception_date_3",
		"cc_reception_date_4",
		"cc_reception_date_5",
		"notification_drafting_date",
		"cc_notification_drafting_date_1",
		"cc_notification_drafting_date_2",
		"cc_notification_drafting_date_3",
		"cc_notification_drafting_date_4",
		"cc_notification_drafting_date_5",
		"notification_settlement_date",
		"cc_notification_settlement_date_1",
		"cc_notification_settlement_date_2",
		"cc_notification_settlement_date_3",
		"cc_notification_settlement_date_4",
		"cc_notification_settlement_date_5",
		"notification_send_date",
		"cc_notification_send_date_1",
		"cc_notification_send_date_2",
		"cc_notification_send_date_3",
		"cc_notification_send_date_4",
		"cc_notification_send_date_5",
		"contract_send_date",
		"cc_contract_send_date_1",
		"cc_contract_send_date_2",
		"cc_contract_send_date_3",
		"cc_contract_send_date_4",
		"cc_contract_send_date_5",
		"contract_reception_date",
		"cc_contract_reception_date_1",
		"cc_contract_reception_date_2",
		"cc_contract_reception_date_3",
		"cc_contract_reception_date_4",
		"cc_contract_reception_date_5",
		"amount_fixed_date",
		"statement_send_date_1",
		"statement_date_1",
		"payment_due_1",
		"payment_date_1",
		"statement_send_date_2",
		"statement_date_2",
		"payment_due_2",
		"payment_date_2",
		"statement_send_date_3",
		"statement_date_3",
		"payment_due_3",
		"payment_date_3",
		"statement_send_date_4",
		"statement_date_4",
		"payment_due_4",
		"payment_date_4",
		"statement_send_date_5",
		"statement_date_5",
		"payment_due_5",
		"payment_date_5",
		"statement_send_date_6",
		"statement_date_6",
		"payment_due_6",
		"payment_date_6",
		"accounting_report_due",
		"accounting_report_request_day",
		"accounting_report_reception_date",
		"accounting_report_drafting_date",
		"accounting_report_settlement_date",
		"accounting_report_send_date",
		"accomplishment_due",
		"accomplishment_send_date",
		"start_date",
		"end_date",
		"memorandum_start_date",
		"memorandum_end_date",
		"reception_decision_date",
		"contraction_date",
		"contraction_change_date_1",
		"contraction_change_date_2",
		"contraction_change_date_3",
		"contraction_change_date_4",
		"contraction_change_date_5",
		"contraction_change_date_6",
		"contraction_change_date_7",
		"contraction_change_date_8",
		"contraction_change_date_9",
		"contraction_change_date_10",
		"contraction_change_date_11",
		"contraction_change_date_12",
		"contraction_change_date_13",
		"contraction_change_date_14",
		"contraction_change_date_15",
		"contraction_change_date_16",
		"contraction_change_date_17",
		"contraction_change_date_18",
		"contraction_change_date_19",
		"contraction_change_date_20",
		"advance_confirmation_date",
		"goods_system_registration_date",
	);

	/**
	 * 教員情報を一括更新する際の対象カラム
	 */
	var $researcher_update_column = array(
		'researcher_no' => 'researcher_no',
		'researcher_name' => 'researcher_name',
		'cooperate_no' => 'cooperate_no',
		'department' => 'department',
		'job_title' => 'job_title',
		//'major_name' => 'major_name',
		'email' => 'email',
	);

	/**
	 * Excel出力やラベル出力で特定名称に置き換えを行うデータと値
	 *
	 * @var array
	 */
	var $output_column_label_alias = array(
		'email' => '教員メールアドレス',
		'cp_email' => '先方担当者のメールアドレス',
		'photothermic_cost' => '共通経費(光熱水料)(1)',
		'other_cost' => '共通経費以外の経費(2)',
		'research_expense' => '研究費計(2)（(1)＋(2)）',
		'reconsignment_cost' => '再委託費(4))',
		'general_administration_cost' => '一般管理費(5)',
		'total_primary_cost' => '直接経費計(6)（(3)〜(5)）',
		'titech_earnings' => '間接経費（大学収益化額）(7)',
		'labo_earnings' => '間接経費（研究室配当分）(8)',
		'indirect_cost' => '間接経費計(9)（(7)＋(8)）',
		'this_year_reception_amount' => '当該年度の受入金額(10)（(6)＋(9)）',
		'statement_amount' => '入金残高',
	);

	var $easy_search_field = array(
		'project_code',
		'researcher_name',
	);

	/**
	 * 横断検索用テーブルへのマッピングデータ
	 * @var <type>
	 */
	var $summarize_field = array(
		'department' => 'department',
		'researcher_name' => 'researcher_name',
		'job_title' => 'job_title',
		'amount' => 'this_year_reception_amount',
		'direct_cost' => 'total_primary_cost',
		'indirect_cost' => 'indirect_cost',
		'year' => 'year',
		'research_type' => 'business_name',
		'subject' => 'subject',
		'fund_owner' => 'ordering_organization_name',
		'start_date' => 'start_date',
		'end_date' => 'end_date',
		'memo' => 'titech_reception_no',
		'researcher_name' => 'researcher_name',
		'research_area' => 'business_name',
		'researcher_no' => 'researcher_no',
		'cooperate_no' => 'cooperate_no',
		'disabled' => 'disabled',
		'open_to_public' => 'open_to_public',
		'major_name' => 'major_name',           // #270
		'unaggregate' => 'unaggregate',         // ICI#26
		'project_code' => 'project_code',         // ICI#27
		'institute_code' => 'institute_code',		// 院
		'school_code' => 'school_code',		// 系
		'course_code' => 'course_code',		// コース
	);

	/**
	 * 保存直前にユーザー情報をフィールドにセットする。
	 *
	 * @param array $options 引数配列
	 *
	 * @return boolean 成功・失敗
	 *
	 * @todo あとでapp_modelに移動させるかも
	 *
	 * */
	function beforeSave($options = array()) {
		parent::beforeSave($options);
		return $this->setUserInfo("NedoJstOther");
	}

	/**
	 * コンストラクタ
	 *
	 * @param int	$id
	 * @param string $table
	 * @param string $ds
	 */
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		foreach ($this->file_columns as $v) {
			if ($v == "researcher_name") {
				continue; // 名前は特殊検索する
			}
			if ($v == "year" || $v == "id" || $v == "arrange_no_1") {
				$t = "value";
			} else {
				$t = "like";
			}
			$this->filterArgs[] = array('name' => $v, 'type' => $t);
		}
		$this->filterArgs[] = array('name' => 'researcher_name', 'type' => 'query', 'method' => 'findWithLike');
		$this->mergeValidateRules();
	}

	// 研究者代表者はスペースを無視して検索できるようにする
	public function findWithLike($data = array()){
		$keyword = trim(preg_replace("/　/", " ", $data['researcher_name']));
		$keywords = explode(" ", $keyword);
		$q = implode("%", $keywords);

		$conditions = array("replace(replace(researcher_name, '　', ''), ' ', '') LIKE" => "%{$q}%");
		return $conditions;
	}

	/**
	 * 子ノードデータを作成する
	 *
	 * @param int $parent_id
	 *
	 * @return mixed
	 */
	function makeNodeData($parent_id)
	{
		if (!$parent_id) {
			return false;
		}
		$this->recursive = 0;
		$rec = $this->findById($parent_id);
		if (!$rec) {
			return false;
		}

		// コピーする項目を設定
		// @TODO: お客様にどの項目をコピーするか確認
		//$copy_array = array("year", "project_code", "project_type", "person_in_charge",
		//	"subject", "ordering_organization_name", "applicant_job_title",
		//	"applicant_name", "contractor_job_title", "contractor_name",
		//	"related_ministries", "business_name", "ordering_organization_type",
		//	"government_type", "area_of_research", "cp_post_no",
		//	"cp_address", "cp_section", "cp_job_title", "cp_name", "cp_tel",
		//	"cp_extension", "cp_fax", "cp_email",
		//
		//);
		$copy_array = array("year", "person_in_charge");
		$rec2 = array();
		foreach($copy_array as $k) {
			$rec2["NedoJstOther"][$k] = $rec["NedoJstOther"][$k];
		}
		$rec2["NedoJstOther"]["nedo_jst_other_id"] = $parent_id;
		return $rec2;
	}

	/**
	 * 子ノードを全件取得して再計算する
	 *
	 * @param int $parent_id 親データのID
	 */
	function recalcNode($parent_id)
	{
		// まず子ノードを取得
		$this->recursive = 0;
		$rec = $this->findAllByNedoJstOtherId($parent_id);
		if (!$rec) {
			return true;
		}

		// 取得した子ノードが1個だけなら親へコピーして終了
		if (1 == count($rec)) {
			// 親を取得
			$parent_rec = $this->read(null, $parent_id);
			foreach ($parent_rec["NedoJstOther"] as $k => $v) {
				if ($k != "id" && $k != "nedo_jst_other_id") {
					$parent_rec["NedoJstOther"][$k] = $rec[0]["NedoJstOther"][$k];
				}
			}
			return $this->save($parent_rec);
		}

		// 再計算する項目
		$key_array = array("charge", "charged_amount", "claimed_balance",
			"charge_1", "charge_2",
			"charge_3", "charge_4", "charge_5", "charge_6",
			"total_reception_amount",
			"plural_contract_amount_1", "plural_contract_amount_2", "plural_contract_amount_3",
			"plural_contract_amount_4", "plural_contract_amount_5", "plural_contract_amount_6",
			"plural_contract_amount_7", "plural_contract_amount_8", "plural_contract_amount_9",
			"plural_contract_amount_10", "photothermic_cost", "other_cost", "research_expense",
			"reconsignment_cost", "general_administration_cost", "total_primary_cost",
			"indirect_cost", "labo_earnings", "titech_earnings",
			"this_year_reception_amount", "statement_amount",
			"income_1", "income_2", "income_3", "income_4", "income_5", "income_6",
			"reported_amount", "fixed_amount", "balance", "turnback_amount",
		);

		// 初期化
		$sum = array();
		foreach($key_array as $k) {
			$sum[$k] = 0;
		}

		foreach ($rec as $item) {
			foreach($key_array as $k) {
				// 必要な項目を足し算
				$sum[$k]  += $item["NedoJstOther"][$k];
			}
		}
		// 足した項目を含めて保存
		$parent_rec = $this->read(null, $parent_id);

		foreach($key_array as $k) {
			$parent_rec["NedoJstOther"][$k] = $sum[$k];
		}
		return $this->save($parent_rec);
	}

	/**
	 * データ保存後の処理
	 *
	 * @param boolean $created
	 */
	function  afterSave($created)
	{
		$this->saveToSummary($this, $created);
	}
}

?>
