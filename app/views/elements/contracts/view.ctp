<h3>基本情報</h3>
<table class="recordview">
<tr>
	<th><?php __('Id'); ?></th><td><?php echo $contract['Contract']['id']; ?>&nbsp;</td>
</tr>
</table>
<br clear="all" />

<table class="recordview">
<tr>
	<th><?php __('Year'); ?></th>
	<th><?php __('Cooperate No'); ?></th>
	<th><?php __('Researcher No'); ?></th>
	<th><?php __('Project Code'); ?></th>
	<th><?php __('Assignment No'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'year', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract",'cooperate_no', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract",'researcher_no', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract",'project_code', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract",'assignment_no', $compare_contract); ?>
</tr>
<tr>
	<th><?php __('Funds Institute'); ?></th>
	<th><?php __('Project Name'); ?></th>
	<th><?php __('Project Assignment Name'); ?></th>
	<th><?php __('Project Start Year'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'funds_institute', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'project_name', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'project_assignment_name', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'project_start_year', $compare_contract); ?>
	<td></td>
</tr>
<tr>
	<th><?php __('Initial Start Date'); ?></th>
	<th><?php __('Initial End Date'); ?></th>
	<th><?php __('This Year Start Date'); ?></th>
	<th><?php __('This Year End Date'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'initial_start_date', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'initial_end_date', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'this_year_start_date', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'this_year_end_date', $compare_contract, null, "date"); ?>
	<td></td>
</tr>

</table>

<h3>事業情報内容</h3>
<table class="recordview">
<tr>
	<th><?php __('New Or Continuance'); ?></th>
	<th><?php __('Represent Researcher Name'); ?></th>
	<th><?php __('Job Title'); ?></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'new_or_continuance', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'represent_researcher_name', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'job_title', $compare_contract); ?>
	<td></td>
	<td></td>
</tr>

<tr>
	<th><?php __('Institute Code'); ?></th>
	<th><?php __('School Code'); ?></th>
	<th><?php __('Course Code'); ?></th>
	<th class="old_org borderR borderB"><?php __('Department'); ?></th>
	<th class="old_org borderR borderB"><?php __('Major Name'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'institute_code', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'school_code', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'course_code', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'department', $compare_contract, 'old_org borderR'); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'major_name', $compare_contract, 'old_org borderR'); ?>
</tr>

<tr>
	<th><?php __('Singular Or Multi'); ?></th>
	<th><?php __('Contract Date'); ?></th>
	<th><?php __('Contract Amount'); ?></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'singular_or_multi', $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'contract_date', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'contract_amount', $compare_contract, "num", "number"); ?>
	<td></td>
	<td></td>
</tr>
<tr>
	<th><?php __('This Year Reception Amount'); ?></th>
	<th><?php __('Primary Cost'); ?></th>
	<th><?php __('Common Cost'); ?></th>
	<th><?php __('Indirect Cost'); ?></th>
	<th><?php __('General Administration Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'this_year_reception_amount', $compare_contract, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'primary_cost', $compare_contract, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'common_cost', $compare_contract, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'indirect_cost', $compare_contract, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'general_administration_cost', $compare_contract, "num", "number"); ?>
</tr>


</table>

<h3>請求・入金情報</h3>
<table class="recordview">
<tr>
	<th><?php __('Billing Type'); ?></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'billing_type', $compare_contract); ?>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<th><?php __('Billing Date 1'); ?></th>
	<th><?php __('Payment Due 1'); ?></th>
	<th><?php __('Payment Date 1'); ?></th>
	<th><?php __('Credit 1'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'billing_date_1', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'payment_due_1', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'payment_date_1', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'credit_1', $compare_contract, "num", "number"); ?>
	<td></td>
</tr>
<tr>
	<th><?php __('Billing Date 2'); ?></th>
	<th><?php __('Payment Due 2'); ?></th>
	<th><?php __('Payment Date 2'); ?></th>
	<th><?php __('Credit 2'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'billing_date_2', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'payment_due_2', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'payment_date_2', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'credit_2', $compare_contract, "num", "number"); ?>
	<td></td>
</tr>
<tr>
	<th><?php __('Billing Date 3'); ?></th>
	<th><?php __('Payment Due 3'); ?></th>
	<th><?php __('Payment Date 3'); ?></th>
	<th><?php __('Credit 3'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'billing_date_3', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'payment_due_3', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'payment_date_3', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'credit_3', $compare_contract, "num", "number"); ?>
	<td></td>
</tr>
<tr>
	<th><?php __('Billing Date 4'); ?></th>
	<th><?php __('Payment Due 4'); ?></th>
	<th><?php __('Payment Date 4'); ?></th>
	<th><?php __('Credit 4'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'billing_date_4', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'payment_due_4', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'payment_date_4', $compare_contract, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'credit_4', $compare_contract, "num", "number"); ?>
	<td></td>
</tr>
</table>

<h3>その他</h3>
<table class="recordview">
<tr>
	<th><?php __('Remarks1'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'remarks1', $compare_contract); ?>
</tr>
<tr>
	<th><?php __('Remarks2'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'remarks2', $compare_contract); ?>
</tr>
<tr>
	<th><?php __('Remarks3'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", 'remarks3', $compare_contract); ?>
</tr>
</table>

<h3>システムデータ</h3>
<table class="recordview">
	<th><?php __('Open To Public'); ?></th>
	<th><?php __('Disabled'); ?></th>
	<th><?php __('Hidden'); ?></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($contract, "Contract", "open_to_public", $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", "disabled", $compare_contract); ?>
	<?php echo $this->Kendb->writeCell($contract, "Contract", "hidden", $compare_contract); ?>
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
	<td><?php echo $this->Kendb->print_date($contract['Contract']['created']); ?>&nbsp;</td>
	<td><?php echo $contract['Contract']['created_by']; ?>&nbsp;</td>
	<td><?php echo $this->Kendb->print_date($contract['Contract']['updated']); ?>&nbsp;</td>
	<td><?php echo $contract['Contract']['updated_by']; ?>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>
