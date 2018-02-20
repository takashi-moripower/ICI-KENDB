<h3>管理データ</h3>
<table class="recordview">
	<tr>
		<th><?php __('Id'); ?></th><td><?php echo $nedoJstOther['NedoJstOther']['id']; ?>&nbsp;</td>
	</tr>
</table>
<br clear="all" />
<?php $nedo = new NedoJstOther(); ?>

<table class="recordview">
	<tr>
		<th><?php __('Year'); ?></th>
		<th><?php __('Project Code'); ?></th>
		<th><?php __('Project Type'); ?></th>
		<th><?php __('Master Registration'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", "year", $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", "project_code", $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'project_type', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'master_registration', $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Arrange No 1'); ?></th>
		<th><?php __('Arrange No 2'); ?></th>
		<th><?php __('Arrange No 3'); ?></th>
		<th><?php __('Arrange No 4'); ?></th>
		<th><?php __('Arrange No 5'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'arrange_no_1', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'arrange_no_2', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'arrange_no_3', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'arrange_no_4', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'arrange_no_5', $compare_nedoJstOther); ?>
	</tr>
	<tr>
		<th><?php __('Person In Charge'); ?></th>
		<th><?php __('Application Reception Date'); ?></th>
		<th><?php __('Titech Reception No'); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'person_in_charge', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'application_reception_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'titech_reception_no', $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>

<h3>人事データ</h3>
<table class="recordview">
	<tr>
		<th><?php __('Researcher No'); ?></th>
		<th><?php __('Cooperate No'); ?></th>
		<th><?php __('Researcher Name'); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", "researcher_no", $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", "cooperate_no", $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'researcher_name', $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Institute Code'); ?></th>
		<th><?php __('School Code'); ?></th>
		<th><?php __('Course Code'); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", "institute_code", $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", "school_code", $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'course_code', $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th class="old_org borderR borderB"><?php __('Department'); ?></th>
		<th class="old_org borderR borderB"><?php __('Major Name'); ?></th>
		<th class="old_org borderR borderB"><?php __('Head Of Department'); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>

		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'department', $compare_nedoJstOther, 'old_org borderR'); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'major_name', $compare_nedoJstOther, 'old_org borderR'); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'head_of_department', $compare_nedoJstOther, 'old_org borderR'); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Job Title'); ?></th>
		<th><?php echo $nedo->output_column_label_alias['email'] ?></th>
		<th><?php __('Area'); ?></th>
		<th><?php __('Co Researcher'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'job_title', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'email', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'area', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'co_researcher', $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
	</tr>
</table>

<h3>プロジェクトデータ</h3>
<table class="recordview">
	<tr>
		<th><?php __('Subject'); ?></th>
		<th><?php __('Ordering Organization Name'); ?></th>
		<th><?php __('Applicant Job Title'); ?></th>
		<th><?php __('Applicant Name'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'subject', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'ordering_organization_name', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'applicant_job_title', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'applicant_name', $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Contractor Job Title'); ?></th>
		<th><?php __('Contractor Name'); ?></th>
		<th><?php __('Related Ministries'); ?></th>
		<th><?php __('Business Name'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'contractor_job_title', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'contractor_name', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'related_ministries', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'business_name', $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Ordering Organization Type'); ?></th>
		<th><?php __('Government Type'); ?></th>
		<th><?php __('Area Of Research'); ?></th>
		<th><?php __('Start Date'); ?></th>
		<th><?php __('End Date'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'ordering_organization_type', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'government_type', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'area_of_research', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'start_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'end_date', $compare_nedoJstOther, null, "date"); ?>
	</tr>
	<tr>
		<th><?php __('Memorandum Start Date'); ?></th>
		<th><?php __('Memorandum End Date'); ?></th>
		<th><?php __('Asset Belongingness'); ?></th>
		<th><?php __('Continuance Forcast'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'memorandum_start_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'memorandum_end_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'asset_belongingness', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'continuance_forcast', $compare_nedoJstOther); ?>
		<td>&nbsp</td>
	</tr>

		<tr>
		<th><?php __('New Or Continuance'); ?></th>
		<th><?php __('Singular Or Multi'); ?></th>
		<th><?php __('Multi Year No'); ?></th>
		<th><?php __('Competitive Fund'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'new_or_continuance', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'singular_or_multi', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'multi_year_no', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'competitive_fund', $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
	</tr>
</table>

<h3>事業所データ</h3>
<table class="recordview">
	<tr>
		<th><?php __('Cp Post No'); ?></th>
		<th><?php __('Cp Address'); ?></th>
		<th><?php __('Cp Section'); ?></th>
		<th><?php __('Cp Job Title'); ?></th>
		<th><?php __('Cp Name'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cp_post_no', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cp_address', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cp_section', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cp_job_title', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cp_name', $compare_nedoJstOther); ?>
	</tr>
	<tr>
		<th><?php __('Cp Tel'); ?></th>
		<th><?php __('Cp Extension'); ?></th>
		<th><?php __('Cp Fax'); ?></th>
		<th><?php echo $nedo->output_column_label_alias['cp_email'] ?></th>
		<th></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cp_tel', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cp_extension', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cp_fax', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cp_email', $compare_nedoJstOther); ?>
		<td></td>
	</tr>
</table>

<h3>経理データ</h3>
<table class="recordview">
	<tr>
		<th><?php __('Notification Drafting Date'); ?></th>
		<th><?php __('Notification Settlement Date'); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'notification_drafting_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'notification_settlement_date', $compare_nedoJstOther, null, "date"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Notification Send Date'); ?></th>
		<th><?php __('Contract Send Date'); ?></th>
		<th><?php __('Contract Reception Date'); ?></th>
		<th><?php __('Amount Fixed Date'); ?></th>
		<th><?php __('Divide Paying'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'notification_send_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'contract_send_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'contract_reception_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'amount_fixed_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'divide_paying', $compare_nedoJstOther); ?>
	</tr>
	<tr>
		<th><?php __('Adjust Paying'); ?></th>
		<th><?php __('Charge Format'); ?></th>
		<th><?php __('Charge'); ?></th>
		<th><?php __('Charged Amount'); ?></th>
		<th><?php __('Claimed Balance'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'adjust_paying', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'charge_format', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'charge', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'charged_amount', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'claimed_balance', $compare_nedoJstOther, "num", "number"); ?>
	</tr>
	<tr>
		<th><?php __('Charge 1'); ?></th>
		<th><?php __('Statement Send Date 1'); ?></th>
		<th><?php __('Statement Date 1'); ?></th>
		<th><?php __('Payment Due 1'); ?></th>
		<th><?php __('Payment Date 1'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'charge_1', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_send_date_1', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_date_1', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_due_1', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_date_1', $compare_nedoJstOther, null, "date"); ?>
	</tr>
	<tr>
		<th><?php __('Charge 2'); ?></th>
		<th><?php __('Statement Send Date 2'); ?></th>
		<th><?php __('Statement Date 2'); ?></th>
		<th><?php __('Payment Due 2'); ?></th>
		<th><?php __('Payment Date 2'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'charge_2', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_send_date_2', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_date_2', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_due_2', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_date_2', $compare_nedoJstOther, null, "date"); ?>
	</tr>
	<tr>
		<th><?php __('Charge 3'); ?></th>
		<th><?php __('Statement Send Date 3'); ?></th>
		<th><?php __('Statement Date 3'); ?></th>
		<th><?php __('Payment Due 3'); ?></th>
		<th><?php __('Payment Date 3'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'charge_3', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_send_date_3', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_date_3', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_due_3', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_date_3', $compare_nedoJstOther, null, "date"); ?>
	</tr>
	<tr>
		<th><?php __('Charge 4'); ?></th>
		<th><?php __('Statement Send Date 4'); ?></th>
		<th><?php __('Statement Date 4'); ?></th>
		<th><?php __('Payment Due 4'); ?></th>
		<th><?php __('Payment Date 4'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'charge_4', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_send_date_4', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_date_4', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_due_4', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_date_4', $compare_nedoJstOther, null, "date"); ?>
	</tr>
	<tr>
		<th><?php __('Charge 5'); ?></th>
		<th><?php __('Statement Send Date 5'); ?></th>
		<th><?php __('Statement Date 5'); ?></th>
		<th><?php __('Payment Due 5'); ?></th>
		<th><?php __('Payment Date 5'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'charge_5', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_send_date_5', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_date_5', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_due_5', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_date_5', $compare_nedoJstOther, null, "date"); ?>
	</tr>
	<tr>
		<th><?php __('Charge 6'); ?></th>
		<th><?php __('Statement Send Date 6'); ?></th>
		<th><?php __('Statement Date 6'); ?></th>
		<th><?php __('Payment Due 6'); ?></th>
		<th><?php __('Payment Date 6'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'charge_6', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_send_date_6', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_date_6', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_due_6', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'payment_date_6', $compare_nedoJstOther, null, "date"); ?>
	</tr>
	<tr>
		<th><?php __('Accounting Report Due'); ?></th>
		<th><?php __('Accounting Report Format'); ?></th>
		<th><?php __('Accounting Report Request Day'); ?></th>
		<th><?php __('Accounting Report Reception Date'); ?></th>
		<th><?php __('Accounting Report Drafting Date'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accounting_report_due', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accounting_report_format', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accounting_report_request_day', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accounting_report_reception_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accounting_report_drafting_date', $compare_nedoJstOther, null, "date"); ?>
	</tr>
	<tr>
		<th><?php __('Accounting Report Settlement Date'); ?></th>
		<th><?php __('Accounting Report Send Date'); ?></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accounting_report_settlement_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accounting_report_send_date', $compare_nedoJstOther, null, "date"); ?>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<th><?php __('Accomplishment Due'); ?></th>
		<th><?php __('Accomplishment Format'); ?></th>
		<th><?php __('Accomplishment Send Date'); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accomplishment_due', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accomplishment_format', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'accomplishment_send_date', $compare_nedoJstOther, null, "date"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Reception Decision Date'); ?></th>
		<th><?php __('Contraction Date'); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'reception_decision_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'contraction_date', $compare_nedoJstOther, null, "date"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Total Reception Amount'); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'total_reception_amount', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Plural Year 1'); ?></th>
		<th><?php __('Plural Contract Amount 1'); ?></th>
		<th><?php __('Plural Year 2'); ?></th>
		<th><?php __('Plural Contract Amount 2'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_1', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_1', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_2', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_2', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Plural Year 3'); ?></th>
		<th><?php __('Plural Contract Amount 3'); ?></th>
		<th><?php __('Plural Year 4'); ?></th>
		<th><?php __('Plural Contract Amount 4'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_3', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_3', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_4', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_4', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Plural Year 5'); ?></th>
		<th><?php __('Plural Contract Amount 5'); ?></th>
		<th><?php __('Plural Year 6'); ?></th>
		<th><?php __('Plural Contract Amount 6'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_5', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_5', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_6', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_6', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Plural Year 7'); ?></th>
		<th><?php __('Plural Contract Amount 7'); ?></th>
		<th><?php __('Plural Year 8'); ?></th>
		<th><?php __('Plural Contract Amount 8'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_7', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_7', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_8', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_8', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Plural Year 9'); ?></th>
		<th><?php __('Plural Contract Amount 9'); ?></th>
		<th><?php __('Plural Year 10'); ?></th>
		<th><?php __('Plural Contract Amount 10'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_9', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_9', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_year_10', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'plural_contract_amount_10', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php echo $nedo->output_column_label_alias['photothermic_cost']; ?></th>
		<th><?php echo $nedo->output_column_label_alias['other_cost']; ?></th>
		<th><?php echo $nedo->output_column_label_alias['research_expense']; ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'photothermic_cost', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'other_cost', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'research_expense', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php echo $nedo->output_column_label_alias['reconsignment_cost']; ?></th>
		<th><?php echo $nedo->output_column_label_alias['general_administration_cost']; ?></th>
		<th><?php echo $nedo->output_column_label_alias['total_primary_cost']; ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'reconsignment_cost', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'general_administration_cost', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'total_primary_cost', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php echo $nedo->output_column_label_alias['titech_earnings']; ?></th>
		<th><?php echo $nedo->output_column_label_alias['labo_earnings']; ?></th>
		<th><?php echo $nedo->output_column_label_alias['indirect_cost']; ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'titech_earnings', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'labo_earnings', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'indirect_cost', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php echo $nedo->output_column_label_alias['this_year_reception_amount']; ?></th>
		<th><?php echo $nedo->output_column_label_alias['statement_amount']; ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'this_year_reception_amount', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'statement_amount', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	<tr>
	</tr>

	<tr>
		<th><?php __('Income 1'); ?></th>
		<th><?php __('Income 2'); ?></th>
		<th><?php __('Income 3'); ?></th>
		<th><?php __('Income 4'); ?></th>
		<th><?php __('Income 5'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'income_1', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'income_2', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'income_3', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'income_4', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'income_5', $compare_nedoJstOther, "num", "number"); ?>
	</tr>
	<tr>
		<th><?php __('Income 6'); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'income_6', $compare_nedoJstOther, "num", "number"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Former1 Project Code'); ?></th>
		<th><?php __('Former2 Project Code'); ?></th>
		<th><?php __('Former3 Project Code'); ?></th>
		<th><?php __('Functions Manual'); ?></th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'former1_project_code', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'former2_project_code', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'former3_project_code', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'functions_manual', $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Implementation Document'); ?></th>
		<th><?php __('Contract Management No'); ?></th>
		<th><?php __('Reported Amount'); ?></th>
		<th><?php __('Fixed Amount'); ?></th>
		<th><?php __('Balance'); ?></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'implementation_document', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'contract_management_no', $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'reported_amount', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'fixed_amount', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'balance', $compare_nedoJstOther, "num", "number"); ?>
	</tr>
	<tr>
		<th><?php __('Turnback Amount'); ?></th>
		<th><?php __('Advance Confirmation Date'); ?></th>
		<th><?php __('Goods System Registration Date'); ?></th>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'turnback_amount', $compare_nedoJstOther, "num", "number"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'advance_confirmation_date', $compare_nedoJstOther, null, "date"); ?>
		<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'goods_system_registration_date', $compare_nedoJstOther, null, "date"); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>

<h3>変更情報</h3>
<table class="recordview">
<tr>
<th>次</th>
<th>変更日</th>
<th>変更概要</th>
</tr>
<?php for($i=1; $i<=20; $i++): ?>
<tr>
<th><?php echo $i; ?>次</th>
<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'contraction_change_date_'.$i, $compare_nedoJstOther, null, "date"); ?>
<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'contraction_change_outline_'.$i, $compare_nedoJstOther); ?>
</tr>
<?php endfor; ?>
</table>

<h3>変更契約情報(一次)</h3>
<table class="recordview">
<tr>
	<th><?php echo __("Cc Reception Date 1", true); ?></th>
	<th><?php echo __("Cc Titech Reception No 1", true); ?></th>
	<th><?php echo __("Cc Notification Drafting Date 1", true); ?></th>
	<th><?php echo __("Cc Notification Settlement Date 1", true); ?></th>
	<th><?php echo __("Cc Notification Send Date 1", true); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_reception_date_1', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_titech_reception_no_1', $compare_nedoJstOther); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_drafting_date_1', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_settlement_date_1', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_send_date_1', $compare_nedoJstOther, null, "date"); ?>
</tr>
<tr>
	<th><?php echo __("Cc Contract Send Date 1", true); ?></th>
	<th><?php echo __("Cc Contract Reception Date 1", true); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_send_date_1', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_reception_date_1', $compare_nedoJstOther, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

<h3>変更契約情報(ニ次)</h3>
<table class="recordview">
<tr>
	<th><?php echo __("Cc Reception Date 2", true); ?></th>
	<th><?php echo __("Cc Titech Reception No 2", true); ?></th>
	<th><?php echo __("Cc Notification Drafting Date 2", true); ?></th>
	<th><?php echo __("Cc Notification Settlement Date 2", true); ?></th>
	<th><?php echo __("Cc Notification Send Date 2", true); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_reception_date_2', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_titech_reception_no_2', $compare_nedoJstOther); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_drafting_date_2', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_settlement_date_2', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_send_date_2', $compare_nedoJstOther, null, "date"); ?>
</tr>
<tr>
	<th><?php echo __("Cc Contract Send Date 2", true); ?></th>
	<th><?php echo __("Cc Contract Reception Date 2", true); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_send_date_2', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_reception_date_2', $compare_nedoJstOther, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

<h3>変更契約情報(三次)</h3>
<table class="recordview">
<tr>
	<th><?php echo __("Cc Reception Date 3", true); ?></th>
	<th><?php echo __("Cc Titech Reception No 3", true); ?></th>
	<th><?php echo __("Cc Notification Drafting Date 3", true); ?></th>
	<th><?php echo __("Cc Notification Settlement Date 3", true); ?></th>
	<th><?php echo __("Cc Notification Send Date 3", true); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_reception_date_3', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_titech_reception_no_3', $compare_nedoJstOther); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_drafting_date_3', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_settlement_date_3', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_send_date_3', $compare_nedoJstOther, null, "date"); ?>
</tr>
<tr>
	<th><?php echo __("Cc Contract Send Date 3", true); ?></th>
	<th><?php echo __("Cc Contract Reception Date 3", true); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_send_date_3', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_reception_date_3', $compare_nedoJstOther, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

<h3>変更契約情報(四次)</h3>
<table class="recordview">
<tr>
	<th><?php echo __("Cc Reception Date 4", true); ?></th>
	<th><?php echo __("Cc Titech Reception No 4", true); ?></th>
	<th><?php echo __("Cc Notification Drafting Date 4", true); ?></th>
	<th><?php echo __("Cc Notification Settlement Date 4", true); ?></th>
	<th><?php echo __("Cc Notification Send Date 4", true); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_reception_date_4', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_titech_reception_no_4', $compare_nedoJstOther); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_drafting_date_4', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_settlement_date_4', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_send_date_4', $compare_nedoJstOther, null, "date"); ?>
</tr>
<tr>
	<th><?php echo __("Cc Contract Send Date 4", true); ?></th>
	<th><?php echo __("Cc Contract Reception Date 4", true); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_send_date_4', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_reception_date_4', $compare_nedoJstOther, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

<h3>変更契約情報(五次)</h3>
<table class="recordview">
<tr>
	<th><?php echo __("Cc Reception Date 5", true); ?></th>
	<th><?php echo __("Cc Titech Reception No 5", true); ?></th>
	<th><?php echo __("Cc Notification Drafting Date 5", true); ?></th>
	<th><?php echo __("Cc Notification Settlement Date 5", true); ?></th>
	<th><?php echo __("Cc Notification Send Date 5", true); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_reception_date_5', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_titech_reception_no_5', $compare_nedoJstOther); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_drafting_date_5', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_settlement_date_5', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_notification_send_date_5', $compare_nedoJstOther, null, "date"); ?>
</tr>
<tr>
	<th><?php echo __("Cc Contract Send Date 5", true); ?></th>
	<th><?php echo __("Cc Contract Reception Date 5", true); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_send_date_5', $compare_nedoJstOther, null, "date"); ?>
	<?php echo $this->Kendb->writecell($nedoJstOther, 'NedoJstOther', 'cc_contract_reception_date_5', $compare_nedoJstOther, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

<h3>備考</h3>
<table class="recordview">
<tr>
<th colspan="5"><?php __('Remarks'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", 'remarks', $compare_nedoJstOther, "memo"); ?>
</tr>
</table>


<h3>システムデータ</h3>
<table class="recordview">
	<tr>
	<th><?php __('Open To Public'); ?></th>
	<th><?php __('Disabled'); ?></th>
	<th><?php __('Hidden'); ?></th>
	<th></th>
	<th></th>
	</tr>
	<tr>
		<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", "open_to_public", $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", "disabled", $compare_nedoJstOther); ?>
		<?php echo $this->Kendb->writeCell($nedoJstOther, "NedoJstOther", "hidden", $compare_nedoJstOther); ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th><?php __('Created'); ?></th>
		<th><?php __('Created By'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Updated By'); ?></th>
		<th></th>
	</tr>
	<tr>
		<td><?php echo $this->Kendb->print_date($nedoJstOther['NedoJstOther']['created']); ?>&nbsp;</td>
		<td><?php echo $nedoJstOther['NedoJstOther']['created_by']; ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($nedoJstOther['NedoJstOther']['updated']); ?>&nbsp;</td>
		<td><?php echo $nedoJstOther['NedoJstOther']['updated_by']; ?>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>



