<h3>プロジェクト</h3>
<table class="recordview">
<tr>
	 <th><?php __('Id'); ?></th><td><?php echo $adoption['Adoption']['id']; ?>&nbsp;</td>
</tr>
</table>
<br clear="all" />

<table class="recordview">
<tr>
	<th><?php __('Year'); ?></th>
	<th><?php __('Type No'); ?></th>
	<th><?php __('Grant Delivery Institute'); ?></th>
	<th><?php __('Appointment Date'); ?></th>
	<th><?php __('Decision Date'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'year', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'type_no', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'grant_delivery_institute', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'appointment_date', $compare_adoption, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'decision_date', $compare_adoption, null, "date"); ?>
</tr>
<tr>
	<th><?php __('Payment Date'); ?></th>
	<th><?php __('Advance Application Reception Date'); ?></th>
	<th><?php __('Move Out In Etc'); ?></th>
	<th><?php __('Research Type'); ?></th>
	<th><?php __('Screening'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'payment_date', $compare_adoption, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'advance_application_reception_date', $compare_adoption, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'move_out_in_etc', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'research_type', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'screening', $compare_adoption); ?>
</tr>
<tr>
	<th><?php __('End Before Application'); ?></th>
	<th><?php __('Contribution'); ?></th>
	<th><?php __('Detail Ambit No'); ?></th>
	<th><?php __('Division A B'); ?></th>
	<th><?php __('Research Number Points'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'end_before_application', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'contribution', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'detail_ambit_no', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'division_a_b', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'research_number_points', $compare_adoption); ?>
</tr>
<tr>
	<th><?php __('Arrange No'); ?></th>
	<th><?php __('Problem No'); ?></th>
	<th><?php __('New Or Continuance'); ?></th>
	<th><?php __('Name'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'arrange_no', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'problem_no', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'new_or_continuance', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'name', $compare_adoption); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Institute Code'); ?></th>
	<th><?php __('School Code'); ?></th>
	<th><?php __('Course Code'); ?></th>
	<th><?php __('Application Job'); ?></th>
	<th><?php __('Current Job Title'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'institute_code', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'school_code', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'course_code', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'application_job', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'current_job_title', $compare_adoption); ?>
</tr>
<tr>
	<th class="old_org borderR borderB"><?php __('Notifying Department'); ?></th>
	<th class="old_org borderR borderB"><?php __('Statistical Department'); ?></th>
	<th class="old_org borderR borderB"><?php __('Department'); ?></th> <!--  -->
	<th class="old_org borderR borderB"><?php __('Major Name'); ?></th> <!--  -->
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'notifying_department', $compare_adoption, 'old_org borderR'); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'statistical_department', $compare_adoption, 'old_org borderR'); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'department', $compare_adoption, 'old_org borderR'); ?> <!--  -->
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'major_name', $compare_adoption, 'old_org borderR'); ?> <!--  -->
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Statistical Job'); ?></th>
	<th><?php __('This Year Application Amount'); ?></th>
	<th><?php __('Current Payment Sum Appointment'); ?></th>
	<th><?php __('Current Payment D Appointment'); ?></th>
	<th><?php __('Current Payment I Appointment'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'statistical_job', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'this_year_application_amount', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'current_payment_sum_appointment', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'current_payment_d_appointment', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'current_payment_i_appointment', $compare_adoption, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Next1 Payment D Appointment'); ?></th>
	<th><?php __('Next2 Payment D Appointment'); ?></th>
	<th><?php __('Next3 Payment D Appointment'); ?></th>
	<th><?php __('Next4 Payment D Appointment'); ?></th>
	<th><?php __('Next5 Payment D Appointment'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next1_payment_d_appointment', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next2_payment_d_appointment', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next3_payment_d_appointment', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next4_payment_d_appointment', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next5_payment_d_appointment', $compare_adoption, "num", "number"); ?>
</tr>
<tr>
	<th>本年度合計<?php //__('Current Payment Sum'); ?></th>
	<th><?php __('Current Payment D'); ?></th>
	<th><?php __('Current Payment I'); ?></th>
	<th><?php __('Next1 Payment D'); ?></th>
	<th><?php __('Next2 Payment D'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'current_payment_sum', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'current_payment_d', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'current_payment_i', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next1_payment_d', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next2_payment_d', $compare_adoption, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Next3 Payment D'); ?></th>
	<th><?php __('Next4 Payment D'); ?></th>
	<th><?php __('Next5 Payment D'); ?></th>
	<th><?php __('Researcher No'); ?></th>
	<th><?php __('Researcher Assignment'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next3_payment_d', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next4_payment_d', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'next5_payment_d', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'researcher_no', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'researcher_assignment', $compare_adoption); ?>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks1'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, 'Adoption', 'remarks1', $compare_adoption, "memo"); ?>
</tr>
</table>

<h3>交付申請</h3>
<table class="recordview">
<tr>
	<th><?php __('Grant Reception Date'); ?></th>
	<th><?php __('Total Primary Cost'); ?></th>
	<th><?php __('Detail Goods Cost'); ?></th>
	<th><?php __('Detail Travel Cost'); ?></th>
	<th><?php __('Detail Gratuity Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'grant_reception_date', $compare_adoption, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'total_primary_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'detail_goods_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'detail_travel_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'detail_gratuity_cost', $compare_adoption, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Detail Other Cost'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'detail_other_cost', $compare_adoption, "num", "number"); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Issue Application'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'remarks_issue_application', $compare_adoption, "memo"); ?>
</tr>
<tr>
	<th><?php __('Contribution Count'); ?></th>
	<th><?php __('Contribution Amount'); ?></th>
	<th>分配金実配分額<?php //__('Contribution Partition'); ?></th>
	<th><?php __('Adjudicator'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'contribution_count', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'contribution_amount', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'contribution_partition', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'adjudicator', $compare_adoption); ?>
	<td></td>
</tr>
<tr>
	<th colspan="5"><?php __('Contribution Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, 'Adoption', 'contribution_remarks', $compare_adoption, "memo"); ?>
</tr>
</table>

<h3>実績報告</h3>
<table class="recordview">
<tr>
	<th>実績報告書受付日<?php //__('Achievement Report Reception Date'); ?></th>
	<th><?php __('Achievement Primary Cost'); ?></th>
	<th><?php __('Achievement Detail Goods Cost'); ?></th>
	<th><?php __('Achievement Detail Travel Cost'); ?></th>
	<th><?php __('Achievement Detail Gratuity Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_report_reception_date', $compare_adoption, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_primary_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_detail_goods_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_detail_travel_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_detail_gratuity_cost', $compare_adoption, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Achievement Detail Other Cost'); ?></th>
	<th><?php __('Achievement Indirect Cost'); ?></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_detail_other_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_indirect_cost', $compare_adoption, "num", "number"); ?>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<th colspan="5"><?php __('Achievement Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, 'Adoption', 'achievement_remarks', $compare_adoption, "memo"); ?>
</tr>
</table>

<h3>繰越</h3>
<table class="recordview">
<tr>
	<th><?php __('Achievement Carried Report Reception Date'); ?></th>
	<th><?php __('Achievement Carried Primary Cost'); ?></th>
	<th><?php __('Achievement Carried Detail Goods Cost'); ?></th>
	<th><?php __('Achievement Carried Detail Travel Cost'); ?></th>
	<th><?php __('Achievement Carried Detail Gratuity Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_carried_report_reception_date', $compare_adoption, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_carried_primary_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_carried_detail_goods_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_carried_detail_travel_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_carried_detail_gratuity_cost', $compare_adoption, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Achievement Carried Detail Other Cost'); ?></th>
	<th><?php __('Achievement Carried Indirect Cost'); ?></th>
	<th><?php __('Carried Titech Assignment No'); ?></th>
	<th><?php __('Carried Primary Cost'); ?></th>
	<th><?php __('Carried Detail Goods Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_carried_detail_other_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'achievement_carried_indirect_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'carried_titech_assignment_no', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'carried_primary_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'carried_detail_goods_cost', $compare_adoption, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Carried Detail Travel Cost'); ?></th>
	<th><?php __('Carried Detail Gratuity Cost'); ?></th>
	<th><?php __('Carried Detail Other Cost'); ?></th>
	<th><?php __('Carried Indirect Cost'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'carried_detail_travel_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'carried_detail_gratuity_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'carried_detail_other_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'carried_indirect_cost', $compare_adoption, "num", "number"); ?>
	<td></td>
</tr>
<tr>
	<th colspan="5"><?php __('Process Carried Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, 'Adoption', 'process_carried_remarks', $compare_adoption, "memo"); ?>
</tr>
</table>

<h3>額の確定・返還</h3>
<table class="recordview">
<tr>
	<th><?php __('Fixed Amount'); ?></th>
	<th><?php __('Fixed Amount Primary Cost'); ?></th>
	<th><?php __('Fixed Amount Indirect Cost'); ?></th>
	<th><?php __('Turnback Amount'); ?></th>
	<th><?php __('Turnback Amount Primary Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'fixed_amount', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'fixed_amount_primary_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'fixed_amount_indirect_cost', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'turnback_amount', $compare_adoption, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'turnback_amount_primary_cost', $compare_adoption, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Turnback Amount Indirect Cost'); ?></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'turnback_amount_indirect_cost', $compare_adoption, "num", "number"); ?>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<th colspan="5"><?php __('Turnback Amount Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, 'Adoption', 'turnback_amount_remarks', $compare_adoption, "memo"); ?>
</tr>
</table>

<h3>自己評価・成果</h3>
<table class="recordview">
<tr>
	<th><?php __('Self Assessment Person'); ?></th>
	<th><?php __('Self Assessment Date'); ?></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'self_assessment_person', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'self_assessment_date', $compare_adoption); ?>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<th colspan="5"><?php __('Self Assessment Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, 'Adoption', 'self_assessment_remarks', $compare_adoption, "memo"); ?>
</tr>
<tr>
	<th><?php __('Accomplishment Object Person'); ?></th>
	<th><?php __('Accomplishment Date'); ?></th>
	<th><?php __('Process Date'); ?></th>
	<th><?php __('Accomplishment Scheduled Date'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'accomplishment_object_person', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'accomplishment_date', $compare_adoption, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'process_date', $compare_adoption, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'accomplishment_scheduled_date', $compare_adoption, null, "date"); ?>
	<td></td>
</tr>
<tr>
	<th colspan="5"><?php __('Accomplishment Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, 'Adoption', 'accomplishment_remarks', $compare_adoption, "memo"); ?>
</tr>
</table>

<h3>連絡先・その他</h3>
<table class="recordview">
<tr>
	<th><?php __('Extension'); ?></th>
	<th><?php __('Fax'); ?></th>
	<th><?php __('Post No'); ?></th>
	<th><?php __('Email'); ?></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'extension', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'fax', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'post_no', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'email', $compare_adoption); ?>
	<td></td>
</tr>
<tr>
	<th colspan="5"><?php __('Special Mention'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, 'Adoption', 'special_mention', $compare_adoption, null, "memo"); ?>
</tr>
<tr>
	<th><?php __('Cooperate No'); ?></th>
	<th><?php __('Personal No'); ?></th>
	<th></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'cooperate_no', $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", 'personal_no', $compare_adoption); ?>
	<td></td>
	<td></td>
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
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", "open_to_public", $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", "disabled", $compare_adoption); ?>
	<?php echo $this->Kendb->writeCell($adoption, "Adoption", "hidden", $compare_adoption); ?>
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
	<td><?php echo $this->Kendb->print_date($adoption['Adoption']['created']); ?>&nbsp;</td>
	<td><?php echo $adoption['Adoption']['created_by']; ?>&nbsp;</td>
	<td><?php echo $this->Kendb->print_date($adoption['Adoption']['updated']); ?>&nbsp;</td>
	<td><?php echo $adoption['Adoption']['updated_by']; ?>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>




