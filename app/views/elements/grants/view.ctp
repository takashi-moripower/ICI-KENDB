<h3>基本情報</h3>
<table class="recordview">
<tr>
	<th><?php __('Id'); ?></th><td><?php echo $grant['Grant']['id']; ?>&nbsp;</td>
</tr>
</table>
<br clear="all" />

<table class="recordview">
<tr>
	<th><?php __('Year'); ?></th>
	<th><?php __('Adoption Year'); ?></th>
	<th><?php __('Cooperate No'); ?></th>
	<th><?php __('Researcher No'); ?></th>
	<th><?php __('Project Code'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant", 'year', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant", 'adoption_year', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'cooperate_no', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'researcher_no', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'project_code', $compare_grant); ?>
</tr>
<tr>
	<th><?php __('Assignment No'); ?></th>
	<th><?php __('Grant Name'); ?></th>
	<th><?php __('Grant Project Name'); ?></th>
	<th><?php __('Project Assignment Name'); ?></th>
	<th><?php __('Grant Initial Decision Date'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'assignment_no', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_name', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_project_name', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'project_assignment_name', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_initial_decision_date', $compare_grant, null, "date"); ?>
</tr>

<tr>
	<th><?php __('Grant Initial Start Date'); ?></th>
	<th><?php __('Grant Initial End Date'); ?></th>
	<th><?php __('Grant This Year Decision Date'); ?></th>
	<th><?php __('Grant This Year Start Date'); ?></th>
	<th><?php __('Grant This Year End Date'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_initial_start_date', $compare_grant, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_initial_end_date', $compare_grant, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_this_year_decision_date', $compare_grant, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_this_year_start_date', $compare_grant, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_this_year_end_date', $compare_grant, null, "date"); ?>
</tr>
</table>


<h3>事業情報内容</h3>
<table class="recordview">
<tr>
	<th><?php __('Represent Type'); ?></th>
	<th><?php __('Represent Researcher Name'); ?></th>
	<th><?php __('Job Title'); ?></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'represent_type', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'represent_researcher_name', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'job_title', $compare_grant); ?>
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
	<?php echo $this->Kendb->writeCell($grant, "Grant",'institute_code', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'school_code', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'course_code', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'department', $compare_grant, 'old_org borderR'); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'major_name', $compare_grant, 'old_org borderR'); ?>

</tr>
<tr>
	<th><?php __('Grant Funds Institute'); ?></th>
	<th><?php __('Grant Delivery Institute'); ?></th>
	<th><?php __('Delegate 1'); ?></th>
	<th><?php __('Delegate 2'); ?></th>
	<th><?php __('Delegate 3'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_funds_institute', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_delivery_institute', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'delegate_1', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'delegate_2', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'delegate_3', $compare_grant); ?>
</tr>
<tr>
	<th><?php __('Delegate 4'); ?></th>
	<th><?php __('Singular Or Multi'); ?></th>
	<th><?php __('Balance Carried Forward'); ?></th>
	<th><?php __('Grant This Year Decision Money'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'delegate_4', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'singular_or_multi', $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'balance_carried_forward', $compare_grant, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_this_year_decision_money', $compare_grant, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Grant This Year Reception Amount'); ?></th>
	<th><?php __('Primary Cost'); ?></th>
	<th><?php __('Indirect Cost'); ?></th>
	<th><?php __('General Administration Cost'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'grant_this_year_reception_amount', $compare_grant, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'primary_cost', $compare_grant, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'indirect_cost', $compare_grant, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'general_administration_cost', $compare_grant, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Self Contribute Money'); ?></th>
	<th><?php __('Other Cost'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'self_contribute_money', $compare_grant, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'other_cost', $compare_grant, "num", "number"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Delegate 1 Money'); ?></th>
	<th><?php __('Delegate 2 Money'); ?></th>
	<th><?php __('Delegate 3 Money'); ?></th>
	<th><?php __('Delegate 4 Money'); ?></th>
	<th><?php __('Billing Type'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'delegate_1_money', $compare_grant, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'delegate_2_money', $compare_grant, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'delegate_3_money', $compare_grant, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'delegate_4_money', $compare_grant, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'billing_type', $compare_grant); ?>
</tr>
</table>



<h3>その他</h3>
<table class="recordview">
<tr>
	<th><?php __('Kaken System Registration Date'); ?></th>
	<th><?php __('Reception Status Entry Date'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'kaken_system_registration_date', $compare_grant, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant",'reception_status_entry_date', $compare_grant, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

<h3>備考</h3>
<table class="recordview">
<tr>
	<th><?php __('Remarks1'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant", 'remarks1', $compare_grant); ?>
</tr>
<tr>
	<th><?php __('Remarks2'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant", 'remarks2', $compare_grant); ?>
</tr>
<tr>
	<th><?php __('Remarks3'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($grant, "Grant", 'remarks3', $compare_grant); ?>
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
	<?php echo $this->Kendb->writeCell($grant, "Grant", "open_to_public", $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant", "disabled", $compare_grant); ?>
	<?php echo $this->Kendb->writeCell($grant, "Grant", "hidden", $compare_grant); ?>
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
	<td><?php echo $this->Kendb->print_date($grant['Grant']['created']); ?>&nbsp;</td>
	<td><?php echo $grant['Grant']['created_by']; ?>&nbsp;</td>
	<td><?php echo $this->Kendb->print_date($grant['Grant']['updated']); ?>&nbsp;</td>
	<td><?php echo $grant['Grant']['updated_by']; ?>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>
