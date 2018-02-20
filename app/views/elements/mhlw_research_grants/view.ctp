<h3>プロジェクトデータ</h3>
<table class="recordview">
<tr>
	<th><?php __('Id'); ?></th><td><?php echo $mhlwResearchGrant['MhlwResearchGrant']['id']; ?>&nbsp;</td>
</tr>
</table>
<br clear="all" />

<table class="recordview">
<tr>
	<th><?php __('Year'); ?></th>
	<th><?php __('Grant Initial Appointment Date'); ?></th>
	<th><?php __('Grant Initial Decision Date'); ?></th>
	<th><?php __('Payment Date'); ?></th>
	<th><?php __('This Year Advance Application Date'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'year', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant",'grant_initial_appointment_date', $compare_mhlwResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant",'grant_initial_decision_date', $compare_mhlwResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant",'payment_date', $compare_mhlwResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant",'this_year_advance_application_date', $compare_mhlwResearchGrant, null, "date"); ?>
</tr>

<tr>
<th><?php __('Moving History'); ?></th>
<th><?php __('Commission Coi Check'); ?></th>
<th><?php __('Business Name'); ?></th>
<th><?php __('Titech Assignment No'); ?></th>
<th><?php __('Assignment No'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'moving_history', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'commission_coi_check', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'business_name', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'titech_assignment_no', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'assignment_no', $compare_mhlwResearchGrant); ?>
</tr>

<tr>
<th><?php __('New Or Continuance'); ?></th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'new_or_continuance', $compare_mhlwResearchGrant); ?>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<th><?php __('Cooperate No'); ?></th>
<th><?php __('Personal No'); ?></th>
<th><?php __('Researcher No'); ?></th>
<th><?php __('Name'); ?></th>
<th><?php __('Represent Researcher'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'cooperate_no', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'personal_no', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'researcher_no', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'name', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'represent_researcher', $compare_mhlwResearchGrant); ?>
</tr>

<tr>
<th><?php __('Institute Code'); ?></th>
<th><?php __('School Code'); ?></th>
<th><?php __('Course Code'); ?></th>
<th></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'institute_code', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'school_code', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'course_code', $compare_mhlwResearchGrant); ?>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<th><?php __('Statistical Job'); ?></th>
<th class="old_org"><?php __('Notifying Department'); ?></th>
<th class="old_org"><?php __('Statistical Department'); ?></th>
<th class="old_org"><?php __('Affiliated Major Name'); ?></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'statistical_job', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'notifying_department', $compare_mhlwResearchGrant, 'old_org borderR'); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'statistical_department', $compare_mhlwResearchGrant, 'old_org borderR'); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'affiliated_major_name', $compare_mhlwResearchGrant, 'old_org borderR'); ?>
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
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'this_year_application_amount', $compare_mhlwResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'this_year_total_at_decision', $compare_mhlwResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'this_year_direct_at_decision', $compare_mhlwResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'this_year_indirect_at_decision', $compare_mhlwResearchGrant, "num", "number"); ?>
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
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'this_year_application_amount_sum', $compare_mhlwResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'this_year_direct_cost', $compare_mhlwResearchGrant, "num", "number"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'this_year_indirect_cost', $compare_mhlwResearchGrant, "num", "number"); ?>
<td></td>
<td></td>
</tr>

<tr>
<th colspan="5" class="memo"><?php __('Research Assignment'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'research_assignment', $compare_mhlwResearchGrant, "memo"); ?>
</tr>

<tr>
<th><?php __('Contribution Count'); ?></th>
<th><?php __('Contribution Partition'); ?></th>
<th></th>
<th></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'contribution_count', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'contribution_partition', $compare_mhlwResearchGrant); ?>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<th colspan="5" class="memo"><?php __('Contribution Remarks'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'contribution_remarks', $compare_mhlwResearchGrant, "memo"); ?>
</tr>

<tr>
<th><?php __('Research Start Date'); ?></th>
<th><?php __('Research End Date'); ?></th>
<th><?php __('Project Start Year'); ?></th>
<th><?php __('Project End Year'); ?></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant",'research_start_date', $compare_mhlwResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'research_end_date', $compare_mhlwResearchGrant, null, "date"); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'project_start_year', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'project_end_year', $compare_mhlwResearchGrant); ?>
<td></td>
</tr>

<tr>
<th colspan="5" class="memo"><?php __('Remarks'); ?></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'remarks', $compare_mhlwResearchGrant, "memo"); ?>
</tr>

<tr>
<th><?php __('Extension'); ?></th>
<th><?php __('Fax'); ?></th>
<th><?php __('Post No'); ?></th>
<th><?php __('Email'); ?></th>
<th></th>
</tr>
<tr>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant",'extension', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'fax', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'post_no', $compare_mhlwResearchGrant); ?>
<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", 'email', $compare_mhlwResearchGrant); ?>
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
	<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", "open_to_public", $compare_mhlwResearchGrant); ?>
	<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", "disabled", $compare_mhlwResearchGrant); ?>
	<?php echo $this->Kendb->writeCell($mhlwResearchGrant, "MhlwResearchGrant", "hidden", $compare_mhlwResearchGrant); ?>
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
	<td><?php echo $this->Kendb->print_date($mhlwResearchGrant['MhlwResearchGrant']['created']); ?>&nbsp;</td>
	<td><?php echo $mhlwResearchGrant['MhlwResearchGrant']['created_by']; ?>&nbsp;</td>
	<td><?php echo $this->Kendb->print_date($mhlwResearchGrant['MhlwResearchGrant']['updated']); ?>&nbsp;</td>
	<td><?php echo $mhlwResearchGrant['MhlwResearchGrant']['updated_by']; ?>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

