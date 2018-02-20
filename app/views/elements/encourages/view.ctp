<h3>プロジェクトデータ</h3>
<table class="recordview">
<tr>
    <th><?php __('Id'); ?></th><td><?php echo $encourage['Encourage']['id']; ?>&nbsp;</td>
</tr>
</table>
<br clear="all" />

<?php $enc = new Encourage(); ?>

<table class="recordview">
<tr>
    <th><?php __('Year'); ?></th>
    <th><?php __('Appointment Date'); ?></th>
    <th><?php __('Decision Date'); ?></th>
    <th><?php __('Payment Date'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'year', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'appointment_date', $compare_encourage, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'decision_date', $compare_encourage, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'payment_date', $compare_encourage, null, "date"); ?>
	<td>&nbsp;</td>
</tr>

<tr>
    <th colspan="5"><?php echo $enc->output_column_label_alias['moving_history']; ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'moving_history', $compare_encourage, "memo"); ?>
</tr>

<tr>
	<th><?php __('Domestic Or Not'); ?></th>
	<th><?php __('Classification'); ?></th>
	<th><?php __('New Or Continuance'); ?></th>
	<th><?php __('Sex'); ?></th>
	<th><?php __('Recruiting Year'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'domestic_or_not', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'classification', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'new_or_continuance', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'sex', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'recruiting_year', $compare_encourage); ?>
</tr>

<tr>
	<th><?php __('Reception No'); ?></th>
	<th><?php __('Assignment No'); ?></th>
	<th><?php echo $enc->output_column_label_alias['this_year_advance_application_date']; ?></th>
	<th><?php __('Qualification And Others'); ?></th>
	<th><?php __('Ambit'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'reception_no', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'assignment_no', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'this_year_advance_application_date', $compare_encourage, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'qualification_and_others', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'ambit', $compare_encourage); ?>
</tr>

<tr>
	<th><?php __('Represent Researcher Name'); ?></th>
	<th><?php __('Cooperate No'); ?></th>
	<th><?php __('Personal No'); ?></th>
	<th><?php __('Researcher No'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'represent_researcher_name', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'cooperate_no', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'personal_no', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'researcher_no', $compare_encourage); ?>
	<td>&nbsp;</td>
</tr>

<tr>
	<th>受入研究者<?php //__('Facility Teacher'); ?></th>
	<th><?php __('Foreigner Researcher'); ?></th>
	<th><?php __('Appointment Department'); ?></th>
	<th><?php __('Appointment Job Title'); ?></th>
	<th>&nbsp;</th>
</tr>

<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'facility_teacher', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'foreigner_researcher', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'appointment_department', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'appointment_job_title', $compare_encourage); ?>
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
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'institute_code', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'school_code', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'course_code', $compare_encourage); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<!--  -->
<tr>
	<th class="old_org"><?php __('Department Represent Researcher'); ?></th><!--  -->
	<th class="old_org"><?php __('Statistical Department'); ?></th> <!--  -->
	<th class="old_org"><?php __('Major'); ?></th> <!-- -->
	<th><?php echo $enc->output_column_label_alias['job_title']; ?></th>
	<th><?php __('Matriculation Number'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'department_represent_researcher', $compare_encourage, "old_org"); ?> <!-- -->
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'statistical_department', $compare_encourage, "old_org"); ?> <!-- -->
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'major', $compare_encourage, "old_org"); ?> <!-- -->
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'job_title', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'matriculation_number', $compare_encourage); ?>
</tr>
<!--  -->

<tr>
	<th><?php __('Recruit Start Date'); ?></th>
	<th><?php __('Recruit End Date'); ?></th>
	<th><?php __('Number Of Month'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'recruit_start_date', $compare_encourage, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'recruit_end_date', $compare_encourage, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'number_of_month', $compare_encourage); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Change'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'remarks_change', $compare_encourage, "memo"); ?>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Qualification'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'remarks_qualification', $compare_encourage, "memo"); ?>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'remarks', $compare_encourage, "memo"); ?>
</tr>
<tr>
	<th><?php __('Research Plan Reception Date'); ?></th>
	<th><?php __('Confirmation Statement Date'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'research_plan_reception_date', $compare_encourage, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'confirmation_statement_date', $compare_encourage, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('This Year Application Amount'); ?></th>
	<th><?php __('This Year Distributed Amount Appointment'); ?></th>
	<th><?php __('Next Year Distributed Amount Appointment'); ?></th>
	<th><?php __('Next2 Year Distributed Amount Appointment'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'this_year_application_amount', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'this_year_distributed_amount_appointment', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'next_year_distributed_amount_appointment', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'next2_year_distributed_amount_appointment', $compare_encourage, "num", "number"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('This Year Distributed Amount'); ?></th>
	<th><?php __('Next Year Distributed Amount'); ?></th>
	<th><?php __('Next2 Year Distributed Amount'); ?></th>
	<th><?php __('Titech Assignment No'); ?></th>
	<th><?php __('Research Assignment'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'this_year_distributed_amount', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'next_year_distributed_amount', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'next2_year_distributed_amount', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'titech_assignment_no', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'research_assignment', $compare_encourage); ?>
</tr>
</table>

<h3>交付申請等</h3>
<table class="recordview">
<tr>
	<th><?php __('Acceptance Statement'); ?></th>
	<th><?php __('Acceptance Application Reception Date'); ?></th>
	<th><?php __('Issue Application Reception Date'); ?></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'acceptance_statement', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'acceptance_application_reception_date', $compare_encourage, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'issue_application_reception_date', $compare_encourage, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Total Primary Cost'); ?></th>
	<th><?php __('Detail Goods Cost'); ?></th>
	<th><?php __('Detail Travel Cost'); ?></th>
	<th><?php __('Detail Gratuity Cost'); ?></th>
	<th><?php __('Detail Other Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'total_primary_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'detail_goods_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'detail_travel_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'detail_gratuity_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'detail_other_cost', $compare_encourage, "num", "number"); ?>
</tr>
<tr>
	<th colspan="5"><?php __('Issue Application Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'issue_application_remarks', $compare_encourage, "memo"); ?>
</tr>
</table>

<h3>実績報告</h3>
<table class="recordview">
<tr>
	<th><?php __('Achievement Report Reception Date'); ?></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_report_reception_date', $compare_encourage, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Achievement Primary Cost'); ?></th>
	<th><?php __('Achievement Detail Goods Cost'); ?></th>
	<th><?php __('Achievement Detail Travel Cost'); ?></th>
	<th><?php __('Achievement Detail Gratuity Cost'); ?></th>
	<th><?php __('Achievement Detail Other Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_primary_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_detail_goods_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_detail_travel_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_detail_gratuity_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_detail_other_cost', $compare_encourage, "num", "number"); ?>
</tr>
<tr>
	<th colspan="5"><?php __('Achievement Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_remarks', $compare_encourage, "memo"); ?>
</tr>
</table>

<h3>繰越</h3>
<table class="recordview">
<tr>
	<th><?php __('Achievement Carried Report Reception Date'); ?></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_report_reception_date', $compare_encourage, null, "date"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Achievement Carried Primary Cost'); ?></th>
	<th><?php __('Achievement Carried Detail Goods Cost'); ?></th>
	<th><?php __('Achievement Carried Detail Travel Cost'); ?></th>
	<th><?php __('Achievement Carried Detail Gratuity Cost'); ?></th>
	<th><?php __('Achievement Carried Detail Other Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_primary_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_detail_goods_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_detail_travel_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_detail_gratuity_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_detail_other_cost', $compare_encourage, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Carried Titech Assignment No'); ?></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'carried_titech_assignment_no', $compare_encourage); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Balance Carried'); ?></th>
	<th><?php __('Carried Detail Goods Cost'); ?></th>
	<th><?php __('Carried Detail Travel Cost'); ?></th>
	<th><?php __('Carried Detail Gratuity Cost'); ?></th>
	<th><?php __('Carried Detail Other Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'balance_carried', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'carried_detail_goods_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'carried_detail_travel_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'carried_detail_gratuity_cost', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'carried_detail_other_cost', $compare_encourage, "num", "number"); ?>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Carried'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'remarks_carried', $compare_encourage, "memo"); ?>
</tr>
</table>

<h3>返還・確定</h3>
<table class="recordview">
<tr>
	<th><?php echo $enc->output_column_label_alias['fixed_amount']; ?></th>
	<th><?php echo $enc->output_column_label_alias['turnback_amount']; ?></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'fixed_amount', $compare_encourage, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'turnback_amount', $compare_encourage, "num", "number"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Balance Fixed Turnback'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'remarks_balance_fixed_turnback', $compare_encourage, "memo"); ?>
</tr>
</table>

<h3>連絡先</h3>
<table class="recordview">
<tr>
	<th><?php echo $enc->output_column_label_alias['extension']; ?></th>
	<th><?php echo $enc->output_column_label_alias['fax']; ?></th>
	<th><?php echo $enc->output_column_label_alias['email']; ?></th>
	<th><?php echo $enc->output_column_label_alias['mobile_phone']; ?></th>
	<th><?php __('Extension Researcher'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'extension', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'fax', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'email', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'mobile_phone', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'post_no', $compare_encourage); ?>
</tr>
<tr>
    <th><?php echo $enc->output_column_label_alias['post_no']; ?></th>
	<th><?php __('Extension Researcher'); ?></th>
	<th><?php echo $enc->output_column_label_alias['received_researcher_email']; ?></th>

</tr>
<tr>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'post_no', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'extension_researcher', $compare_encourage); ?>
	<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'received_researcher_email', $compare_encourage); ?>

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
    <?php echo $this->Kendb->writeCell($encourage, "Encourage", "open_to_public", $compare_encourage); ?>
    <?php echo $this->Kendb->writeCell($encourage, "Encourage", "disabled", $compare_encourage); ?>
    <?php echo $this->Kendb->writeCell($encourage, "Encourage", "hidden", $compare_encourage); ?>
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
    <td><?php echo $this->Kendb->print_date($encourage['Encourage']['created']); ?>&nbsp;</td>
    <td><?php echo $encourage['Encourage']['created_by']; ?>&nbsp;</td>
    <td><?php echo $this->Kendb->print_date($encourage['Encourage']['updated']); ?>&nbsp;</td>
    <td><?php echo $encourage['Encourage']['updated_by']; ?>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>
