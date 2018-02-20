<h3>プロジェクトデータ</h3>
<table class="recordview">
<tr>
	<th><?php __('Id'); ?></th><td><?php echo $otherResearchGrant['OtherResearchGrant']['id']; ?>&nbsp;</td>
</tr>
</table>
<br clear="all" />

<table class="recordview">
<tr>
	<th><?php __('Year'); ?></th>
	<th><?php __('Grant Initial Appointment Date'); ?></th>
	<th><?php __('Grant Initial Decision Date'); ?></th>
	<th><?php __('Payment Date'); ?></th>
	<th><?php __('Paying For Day'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'year', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant",'grant_initial_appointment_date', $compare_otherResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant",'grant_initial_decision_date', $compare_otherResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant",'payment_date', $compare_otherResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant",'paying_for_day', $compare_otherResearchGrant, null, "date"); ?>
</tr>

<tr>
<th><?php __('Moving History'); ?></th>
<th><?php __('Business Name'); ?></th>
<th><?php __('Titech Assignment No'); ?></th>
<th><?php __('Assignment No'); ?></th>
<th><?php __('New Or Continuance'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'moving_history', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'business_name', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'titech_assignment_no', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'assignment_no', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'new_or_continuance', $compare_otherResearchGrant); ?>
</tr>

<tr>
<th><?php __('Cooperate No'); ?></th>
<th><?php __('Personal No'); ?></th>
<th><?php __('Researcher No'); ?></th>
<th><?php __('Name'); ?></th>
<th><?php __('Represent Researcher'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'cooperate_no', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'personal_no', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'researcher_no', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'name', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'represent_researcher', $compare_otherResearchGrant); ?>
</tr>

<tr>
<th><?php __('Institute Code'); ?></th>
<th><?php __('School Code'); ?></th>
<th><?php __('Course Code'); ?></th>
<th></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'institute_code', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'school_code', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'course_code', $compare_otherResearchGrant); ?>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<th><?php __('Statistical Job'); ?></th>
<th class="old_org borderR borderB"><?php __('Notifying Department'); ?></th>
<th class="old_org borderR borderB"><?php __('Statistical Department'); ?></th>
<th class="old_org borderR borderB"><?php __('Affiliated Major Name'); ?></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'statistical_job', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'notifying_department', $compare_otherResearchGrant, 'old_org borderR'); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'statistical_department', $compare_otherResearchGrant, 'old_org borderR'); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'affiliated_major_name', $compare_otherResearchGrant, 'old_org borderR'); ?>
<td>&nbsp;</td>
</tr>

<tr>
<th><?php __('This Year Application Amount'); ?></th>
<th><?php __('This Year Total At Decision'); ?></th>
<th><?php __('This Year Direct At Decision'); ?></th>
<th><?php __('This Year Indirect At Decision'); ?></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_application_amount', $compare_otherResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_total_at_decision', $compare_otherResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_direct_at_decision', $compare_otherResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_indirect_at_decision', $compare_otherResearchGrant, "num", "number"); ?>
<td>&nbsp;</td>
</tr>

<tr>
<th><?php __('This Year Application Amount Sum'); ?></th>
<th><?php __('This Year Direct Cost'); ?></th>
<th><?php __('This Year Indirect Cost'); ?></th>
<th></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_application_amount_sum', $compare_otherResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_direct_cost', $compare_otherResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_indirect_cost', $compare_otherResearchGrant, "num", "number"); ?>
<td></td>
<td></td>
</tr>

<tr>
<th colspan="5" class="memo"><?php __('Research Assignment'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'research_assignment', $compare_otherResearchGrant, "memo"); ?>
</tr>

<tr>
<th><?php __('Contribution Count'); ?></th>
<th><?php __('Contribution Partition'); ?></th>
<th></th>
<th></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'contribution_count', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'contribution_partition', $compare_otherResearchGrant); ?>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<th colspan="5" class="memo"><?php __('Contribution Remarks'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'contribution_remarks', $compare_otherResearchGrant, "memo"); ?>
</tr>

<tr>
<th><?php __('Research Start Date'); ?></th>
<th><?php __('Research End Date'); ?></th>
<th><?php __('Project Start Year'); ?></th>
<th><?php __('Project End Year'); ?></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant",'research_start_date', $compare_otherResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'research_end_date', $compare_otherResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'project_start_year', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'project_end_year', $compare_otherResearchGrant); ?>
<td></td>
</tr>

<tr>
<th colspan="5" class="memo"><?php __('Remarks'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'remarks', $compare_otherResearchGrant, "memo"); ?>
</tr>

<tr>
<th><?php __('Extension'); ?></th>
<th><?php __('Fax'); ?></th>
<th><?php __('Post No'); ?></th>
<th><?php __('Email'); ?></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant",'extension', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'fax', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'post_no', $compare_otherResearchGrant); ?>
<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'email', $compare_otherResearchGrant); ?>
<td></td>
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
	<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", "open_to_public", $compare_otherResearchGrant); ?>
	<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", "disabled", $compare_otherResearchGrant); ?>
	<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", "hidden", $compare_otherResearchGrant); ?>
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
	<td><?php echo $this->Kendb->print_date($otherResearchGrant['OtherResearchGrant']['created']); ?>&nbsp;</td>
	<td><?php echo $otherResearchGrant['OtherResearchGrant']['created_by']; ?>&nbsp;</td>
	<td><?php echo $this->Kendb->print_date($otherResearchGrant['OtherResearchGrant']['updated']); ?>&nbsp;</td>
	<td><?php echo $otherResearchGrant['OtherResearchGrant']['updated_by']; ?>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

