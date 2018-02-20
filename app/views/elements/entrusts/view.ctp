<h3>管理データ</h3>
<table class="recordview">
<tr>
	<th><?php __('Id'); ?></th><td><?php echo $entrust['Entrust']['id']; ?>&nbsp;</td>
</tr>
</table>
<br clear="all" />

<table class="recordview">
<tr>
	<th><?php __('Year'); ?></th>
	<th><?php __('Project Code'); ?></th>
	<th><?php __('Project Type'); ?></th>
	<th><?php __('Reception Date'); ?></th>
	<th><?php __('Person In Charge'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "year", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "project_code", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "project_type", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "reception_date", $compare_entrust, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "person_in_charge", $compare_entrust); ?>
</tr>
<tr>
	<th><?php __('Resolution No'); ?></th>
	<th><?php __('Branch No'); ?></th>
	<th><?php __('Continuance No'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "resolution_no", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "branch_no", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "continuance_no", $compare_entrust); ?>
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
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "researcher_no", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "cooperate_no", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "researcher_name", $compare_entrust); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<tr>
	<th><?php __('Institute Code'); ?></th>
	<th><?php __('School Code'); ?></th>
	<th><?php __('Course Code'); ?></th>
	<th class="old_org borderR borderB"><?php __('Department'); ?></th>
	<th class="old_org borderR borderB"><?php __('Major Name'); ?></th>

</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "institute_code", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "school_code", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "course_code", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "department", $compare_entrust, 'old_org borderR'); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "major_name", $compare_entrust, 'old_org borderR'); ?>
</tr>


<tr>
	<th><?php __('Job Title'); ?></th>
	<th><?php __('Extension'); ?></th>
	<th><?php __('Post No'); ?></th>
	<th><?php __('Email'); ?></th>
	<th>&nbsp;</th>
</tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "job_title", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "extension", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "post_no", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "email", $compare_entrust); ?>
	<td>&nbsp;</td>
<tr>
</tr>
</table>

<h3>プロジェクトデータ</h3>
<table class="recordview">
<tr>
	<th><?php __('Subject'); ?></th>
	<th><?php __('Start Date'); ?></th>
	<th><?php __('End Date'); ?></th>
	<th><?php __('Contraction Date'); ?></th>
	<th><?php __('Area Of Research'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "subject", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "start_date", $compare_entrust, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "end_date", $compare_entrust, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "contraction_date", $compare_entrust, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "area_of_research", $compare_entrust); ?>
</tr>

<tr>
	<th><?php __('Singular Or Multi'); ?></th>
	<th><?php __('New Or Continuance'); ?></th>
	<th><?php __('Applicant Name 1'); ?></th>
	<th><?php __('Category Of Business'); ?></th>
	<th><?php __('Association Type'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "singular_or_multi", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "new_or_continuance", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "applicant_name_1", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "category_of_business", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "association_type", $compare_entrust); ?>
</tr>
<tr>
	<th><?php __('Applicant Scale'); ?></th>
	<th><?php __('Applicant Name 2'); ?></th>
	<th><?php __('Business Title'); ?></th>
	<th><?php __('Representative'); ?></th>
	<th><?php __('Address'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "applicant_scale", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "applicant_name_2", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "business_title", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "representative", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "address", $compare_entrust); ?>
</tr>
<tr>
	<th><?php __('Associate Researcher Name'); ?></th>
	<th><?php __('Number Of Researchers'); ?></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "associate_researcher_name", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "number_of_researchers", $compare_entrust); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

<h3>経理データ</h3>
<table class="recordview">
<tr>
	<th><?php __('Start Budget Year'); ?></th>
	<th><?php __('Credit'); ?></th>
	<th><?php __('Payment'); ?></th>
	<th><?php __('Division Count'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "start_budget_year", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "credit", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "payment", $compare_entrust, null); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "division_count", $compare_entrust); ?>
	<td></td>
</tr>
<tr>
	<th><?php __('Former Payment D'); ?></th>
	<th><?php __('Former Payment R'); ?></th>
	<th><?php __('Former Payment I'); ?></th>
	<th><?php __('Former Payment Sum'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "former_payment_d", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "former_payment_r", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "former_payment_i", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "former_payment_sum", $compare_entrust, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Current Payment Dr'); ?></th>
	<th><?php __('Current Payment U'); ?></th>
	<th><?php __('Current Payment G'); ?></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_dr", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_u", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_g", $compare_entrust, "num", "number"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Current Payment D'); ?></th>
	<th><?php __('Current Payment R'); ?></th>
	<th><?php __('Current Payment I'); ?></th>
	<th><?php __('Current Payment Sum'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_d", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_r", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_i", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_sum", $compare_entrust, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Formula'); ?></th>
	<th><?php __('Current Payment Alloc'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "formula", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_alloc", $compare_entrust, "num", "number"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Next1 Payment D'); ?></th>
	<th><?php __('Next1 Payment R'); ?></th>
	<th><?php __('Next1 Payment I'); ?></th>
	<th><?php __('Next1 Payment Sum'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next1_payment_d", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next1_payment_r", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next1_payment_i", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next1_payment_sum", $compare_entrust, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Next2 Payment D'); ?></th>
	<th><?php __('Next2 Payment R'); ?></th>
	<th><?php __('Next2 Payment I'); ?></th>
	<th><?php __('Next2 Payment Sum'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next2_payment_d", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next2_payment_r", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next2_payment_i", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next2_payment_sum", $compare_entrust, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Next3 Payment D'); ?></th>
	<th><?php __('Next3 Payment R'); ?></th>
	<th><?php __('Next3 Payment I'); ?></th>
	<th><?php __('Next3 Payment Sum'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next3_payment_d", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next3_payment_r", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next3_payment_i", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next3_payment_sum", $compare_entrust, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Next4 Payment D'); ?></th>
	<th><?php __('Next4 Payment R'); ?></th>
	<th><?php __('Next4 Payment I'); ?></th>
	<th><?php __('Next4 Payment Sum'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next4_payment_d", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next4_payment_r", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next4_payment_i", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next4_payment_sum", $compare_entrust, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>

<tr>
	<th><?php __('D Total'); ?></th>
	<th><?php __('R Total'); ?></th>
	<th><?php __('I Total'); ?></th>
	<th><?php __('Total Amount'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "d_total", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "r_total", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "i_total", $compare_entrust, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "total_amount", $compare_entrust, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Resolution Date'); ?></th>
	<th><?php __('Payment Due'); ?></th>
	<th><?php __('Payment Month'); ?></th>
	<th><?php __('Payment Date'); ?></th>
	<th><?php __('Advance'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "resolution_date", $compare_entrust, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "payment_due", $compare_entrust, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "payment_month", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "payment_date", $compare_entrust, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "advance", $compare_entrust); ?>
</tr>
</table>

<h3>事業所データ</h3>
<table class="recordview">
<tr>
	<th><?php __('Ow Post No'); ?></th>
	<th><?php __('Ow Address'); ?></th>
	<th><?php __('Ow Company Name'); ?></th>
	<th><?php __('Ow Section'); ?></th>
	<th><?php __('Ow Title'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "ow_post_no", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "ow_address", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "ow_company_name", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "ow_section", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "ow_title", $compare_entrust); ?>
</tr>
<tr>
	<th><?php __('Ow Name'); ?></th>
	<th><?php __('Ow Tel'); ?></th>
	<th><?php __('Ow Fax'); ?></th>
	<th><?php __('Ow Email'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "ow_name", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "ow_tel", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "ow_fax", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "ow_email", $compare_entrust); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Bill Post No'); ?></th>
	<th><?php __('Bill Address'); ?></th>
	<th><?php __('Bill Company Name'); ?></th>
	<th><?php __('Bill Section'); ?></th>
	<th><?php __('Bill Title'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "bill_post_no", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "bill_address", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "bill_company_name", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "bill_section", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "bill_title", $compare_entrust); ?>
</tr>
<tr>
	<th><?php __('Bill Name'); ?></th>
	<th><?php __('Bill Tel'); ?></th>
	<th><?php __('Bill Fax'); ?></th>
	<th><?php __('Bill Email'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "bill_name", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "bill_tel", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "bill_fax", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "bill_email", $compare_entrust); ?>
	<td>&nbsp;</td>
</tr>
</table>

<h3>備考</h3>
<table class="recordview">
<tr>
<th colspan="5"><?php __('Entrust Remarks'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($entrust, "Entrust", 'entrust_remarks', $compare_entrust, "memo"); ?>
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
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "open_to_public", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "disabled", $compare_entrust); ?>
	<?php echo $this->Kendb->writeCell($entrust, "Entrust", "hidden", $compare_entrust); ?>
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
	<td><?php echo $this->Kendb->print_date($entrust['Entrust']['created']); ?>&nbsp;</td>
	<td><?php echo $entrust['Entrust']['created_by']; ?>&nbsp;</td>
	<td><?php echo $this->Kendb->print_date($entrust['Entrust']['updated']); ?>&nbsp;</td>
	<td><?php echo $entrust['Entrust']['updated_by']; ?>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

