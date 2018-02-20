<h3>プロジェクト</h3>
<table class="recordview">
<tr>
	<th><?php __('Id'); ?></th><td><?php echo $assessedContribution['AssessedContribution']['id']; ?></td>
</tr>
</table>
<br clear="all" />

<table class="recordview">
<tr>
	<th><?php __('Year'); ?></th>
	<th><?php __('Representative Affiliation'); ?></th>
	<th><?php __('Representative Department'); ?></th>
	<th><?php __('Representative Job Type'); ?></th>
	<th><?php __('Representative Name'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "year", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "representative_affiliation", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "representative_department", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "representative_job_type", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "representative_name", $compare_assessedContribution); ?>
</tr>
<tr>
	<th><?php __('Cooperate No'); ?></th>
	<th><?php __('Personal No'); ?></th>
	<th><?php __('Co Researcher No'); ?></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "cooperate_no", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "personal_no", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "co_researcher_no", $compare_assessedContribution); ?>
	<td></td>
	<td></td>
</tr>

<tr>
	<th><?php __('Institute Code'); ?></th>
	<th><?php __('School Code'); ?></th>
	<th><?php __('Course Code'); ?></th>
	<th class="old_org borderR borderB"><?php __('Co Researcher Department'); ?></th> <!--  -->
	<th class="old_org borderB"><?php __('Co Researcher Major Name'); ?></th> <!--  -->
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "institute_code", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "school_code", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "course_code", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "co_researcher_department", $compare_assessedContribution, 'old_org borderR'); ?> <!--  -->
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "co_researcher_major_name", $compare_assessedContribution, 'old_org borderR'); ?> <!--  -->
</tr>

<tr>
	<th><?php __('Co Researcher Job Type'); ?></th>
	<th><?php __('Department No'); ?></th>
	<th><?php __('Co Researcher Name'); ?></th>
	<th><?php __('Post No'); ?></th>
	<th><?php __('Extension'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "co_researcher_job_type", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "department_no", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "co_researcher_name", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "post_no", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "extension", $compare_assessedContribution); ?>
</tr>
<tr>
	<th><?php __('Fax'); ?></th>
	<th><?php __('Email'); ?></th>
	<th><?php __('Moving History'); ?></th>
	<th><?php __('Research Type'); ?></th>
	<th><?php __('Title No'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "fax", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "email", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "moving_history", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "research_type", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "title_no", $compare_assessedContribution); ?>
</tr>
<tr>
	<th><?php __('Titech Assignment No'); ?></th>
	<th><?php __('Project'); ?></th>
	<th><?php __('Primary Cost'); ?></th>
	<th><?php __('Detail Good Cost'); ?></th>
	<th><?php __('Detail Trip Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "titech_assignment_no", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "project", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "primary_cost", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_good_cost", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_trip_cost", $compare_assessedContribution, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Detail Reward Cost'); ?></th>
	<th><?php __('Detail Other'); ?></th>
	<th><?php __('Indirect Cost'); ?></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_reward_cost", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_other", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "indirect_cost", $compare_assessedContribution, "num", "number"); ?>
	<td></td>
	<td></td>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "remarks", $compare_assessedContribution, "memo"); ?>
</tr>
<tr>
	<th><?php __('Is Distributed Amount Change'); ?></th>
	<th><?php __('Distributed Amount Change'); ?></th>
	<th><?php __('Change Detail Good Cost'); ?></th>
	<th><?php __('Change Detail Trip Cost'); ?></th>
	<th><?php __('Change Detail Reward Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "is_distributed_amount_change", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "distributed_amount_change", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_detail_good_cost", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_detail_trip_cost", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_detail_reward_cost", $compare_assessedContribution, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Change Detail Other'); ?></th>
	<th><?php __('Change Indirect Cost'); ?></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_detail_other", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_indirect_cost", $compare_assessedContribution, "num", "number"); ?>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Distributed Change'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "remarks_distributed_change", $compare_assessedContribution, "memo"); ?>
</tr>
</table>

<h3>受入手続</h3>
<table class="recordview">
<tr>
	<th><?php __('Contribution Repartition Official Letter'); ?></th>
	<th><?php __('Detail Cost Check'); ?></th>
	<th><?php __('Recept Commission Request Date'); ?></th>
	<th><?php __('Recept Commission Recept Date'); ?></th>
	<th><?php __('Request Transfer'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'contribution_repartition_official_letter', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_cost_check", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'recept_commission_request_date', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'recept_commission_recept_date', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'request_transfer', $compare_assessedContribution, null, "date"); ?>
</tr>
<tr>
	<th><?php __('Representative Organization Send'); ?></th>
	<th><?php __('Payment Date'); ?></th>
	<th><?php __('Recovery Date'); ?></th>
	<th><?php __('Payment Confirmed Date'); ?></th>
	<th><?php __('Research Plan Contact'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'representative_organization_send', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'payment_date', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'recovery_date', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'payment_confirmed_date', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'research_plan_contact', $compare_assessedContribution, null, "date"); ?>
</tr>
</table>

<h3>配分額変更手続</h3>
<table class="recordview">
<tr>
	<th><?php __('Contribution Repartition Official Letter Distributed Change'); ?></th>
	<th><?php __('Detail Cost Check Amount Change'); ?></th>
	<th><?php __('Recept Commission Request Date Distributed Change'); ?></th>
	<th><?php __('Recept Commission Recept Date Distributed Change'); ?></th>
	<th><?php __('Request Transfer Distributed Change'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'contribution_repartition_official_letter_distributed_change', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_cost_check_amount_change", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'recept_commission_request_date_distributed_change', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'recept_commission_recept_date_distributed_change', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'request_transfer_distributed_change', $compare_assessedContribution, null, "date"); ?>
</tr>
<tr>
	<th><?php __('Representative Organization Send Distributed Change'); ?></th>
	<th><?php __('Payment Date Distributed Change'); ?></th>
	<th><?php __('Recovery Date Distributed Change'); ?></th>
	<th><?php __('Payment Confirmed Date Distributed Change'); ?></th>
	<th><?php __('Research Plan Contact Distributed Change'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'representative_organization_send_distributed_change', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'payment_date_distributed_change', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'recovery_date_distributed_change', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'payment_confirmed_date_distributed_change', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'research_plan_contact_distributed_change', $compare_assessedContribution, null, "date"); ?>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Distributed Change Process'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "remarks_distributed_change_process", $compare_assessedContribution, "memo"); ?>
</tr>
</table>

<h3>報告手続</h3>
<table class="recordview">
<tr>
	<th><?php __('Exhibit Overdue'); ?></th>
	<th><?php __('Exhibit Induction Date'); ?></th>
	<th><?php __('Real Primary Cost'); ?></th>
	<th><?php __('Expense Detail Goods Cost'); ?></th>
	<th><?php __('Expense Detail Trip Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'exhibit_overdue', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", 'exhibit_induction_date', $compare_assessedContribution, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "real_primary_cost", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "expense_detail_goods_cost", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "expense_detail_trip_cost", $compare_assessedContribution, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Expense Detail Reward Cost'); ?></th>
	<th><?php __('Expense Detail Other'); ?></th>
	<th><?php __('Real Indirect Cost'); ?></th>
	<th><?php __('Turnback Payment Amount'); ?></th>
	<th><?php __('Turnback Indirect Amount'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "expense_detail_reward_cost", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "expense_detail_other", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "real_indirect_cost", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "turnback_payment_amount", $compare_assessedContribution, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "turnback_indirect_amount", $compare_assessedContribution, "num", "number"); ?>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Report'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "remarks_report", $compare_assessedContribution, "memo"); ?>
</tr>
</table>

<h3>担当連絡先等</h3>
<table class="recordview">
<tr>
	<th><?php __('Represent Postal No'); ?></th>
	<th><?php __('Address'); ?></th>
	<th><?php __('Research Institute Name'); ?></th>
	<th><?php __('Office In Charge'); ?></th>
	<th><?php __('Person In Charge'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "represent_postal_no", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "address", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "research_institute_name", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "office_in_charge", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "person_in_charge", $compare_assessedContribution); ?>
</tr>
<tr>
	<th><?php __('Tel In Charge'); ?></th>
	<th><?php __('Fax In Charge'); ?></th>
	<th><?php __('Email In Charge'); ?></th>
	<th><?php __('Other Contact In Charge'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "tel_in_charge", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "fax_in_charge", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "email_in_charge", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "other_contact_in_charge", $compare_assessedContribution); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Other'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "remarks_other", $compare_assessedContribution, "memo"); ?>
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
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "open_to_public", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "disabled", $compare_assessedContribution); ?>
	<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "hidden", $compare_assessedContribution); ?>
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
	<td><?php echo $this->Kendb->print_date($assessedContribution['AssessedContribution']['created']); ?>&nbsp;</td>
	<td><?php echo $assessedContribution['AssessedContribution']['created_by']; ?>&nbsp;</td>
	<td><?php echo $this->Kendb->print_date($assessedContribution['AssessedContribution']['updated']); ?>&nbsp;</td>
	<td><?php echo $assessedContribution['AssessedContribution']['updated_by']; ?>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>
