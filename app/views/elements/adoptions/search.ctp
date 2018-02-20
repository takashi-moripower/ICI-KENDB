	<?php echo $this->KendbForm->create('Adoption', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>
	<?php if ($search_param == 9) { ?>
	<h3>カスタム検索</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->input('problem_no'); ?></td>
	<td><?php echo $this->KendbForm->input('name'); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('research_type'); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 1) { ?>
	<h3>プロジェクトデータ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('id', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->input('type_no'); ?></td>
	<td><?php echo $this->KendbForm->input('grant_delivery_institute'); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('appointment_date_f', array('div' => false, 'label' => __('Appointment Date' , true))); ?>〜<?php echo $this->KendbForm->input('appointment_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('decision_date_f', array('div' => false, 'label' => __('Decision Date' , true))); ?>〜<?php echo $this->KendbForm->input('decision_date_f', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_date_f', array('div' => false, 'label' => __('Payment Date' , true))); ?>〜<?php echo $this->KendbForm->input('payment_date_t', array('div' => false, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('advance_application_reception_date_f', array('div' => false, 'label' => __('Advance Application Reception Date' , true))); ?>〜<?php echo $this->KendbForm->input('advance_application_reception_date_t', array('div' => false, 'label' => false)); ?>
	</td>
	<td><?php echo $this->KendbForm->input('move_out_in_etc'); ?></td>
	<td><?php echo $this->KendbForm->input('research_type'); ?></td>
	<td><?php echo $this->KendbForm->input('screening'); ?></td>
	<td><?php echo $this->KendbForm->input('end_before_application'); ?></td>
	<td><?php echo $this->KendbForm->input('contribution'); ?></td>
	<td><?php echo $this->KendbForm->input('detail_ambit_no'); ?></td>
	<td><?php echo $this->KendbForm->input('division_a_b'); ?></td>
	<td><?php echo $this->KendbForm->input('research_number_points'); ?></td>
	</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->input('arrange_no'); ?></td>
	<td><?php echo $this->KendbForm->input('problem_no'); ?></td>
	<td><?php echo $this->KendbForm->input('new_or_continuance', array('type' => 'select', 'div' => false, 'options' => array('' => '', '新規' => '新規', '継続' => '継続'))); ?></td>
	<td><?php echo $this->KendbForm->input('name'); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('department'); ?></td>
	<td><?php echo $this->KendbForm->input('notifying_department'); ?></td>
	<td><?php echo $this->KendbForm->input('statistical_department'); ?></td>
	<td><?php echo $this->KendbForm->input('major_name'); ?></td>
	<td><?php echo $this->KendbForm->input('institute_code'); ?></td>
	<td><?php echo $this->KendbForm->input('school_code'); ?></td>
	<td><?php echo $this->KendbForm->input('course_code'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('application_job'); ?></td>
	<td><?php echo $this->KendbForm->input('current_job_title'); ?></td>
	<td><?php echo $this->KendbForm->input('statistical_job'); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('this_year_application_amount_f', array('div' => false, 'label' => __('This Year Application Amount' , true))); ?>〜<?php echo $this->KendbForm->input('this_year_application_amount_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('current_payment_sum_appointment_f', array('div' => false, 'label' => __('Current Payment Sum Appointment' , true))); ?>〜<?php echo $this->KendbForm->input('current_payment_sum_appointment_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('current_payment_d_appointment_f', array('div' => false, 'label' => __('Current Payment D Appointment' , true))); ?>〜<?php echo $this->KendbForm->input('current_payment_d_appointment_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('current_payment_i_appointment_f', array('div' => false, 'label' => __('Current Payment I Appointment' , true))); ?>〜<?php echo $this->KendbForm->input('current_payment_i_appointment_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next1_payment_d_appointment_f', array('div' => false, 'label' => __('Next1 Payment D Appointment' , true))); ?>〜<?php echo $this->KendbForm->input('next1_payment_d_appointment_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next2_payment_d_appointment_f', array('div' => false, 'label' => __('Next2 Payment D Appointment' , true))); ?>〜<?php echo $this->KendbForm->input('next2_payment_d_appointment_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next3_payment_d_appointment_f', array('div' => false, 'label' => __('Next3 Payment D Appointment' , true))); ?>〜<?php echo $this->KendbForm->input('next3_payment_d_appointment_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next4_payment_d_appointment_f', array('div' => false, 'label' => __('Next4 Payment D Appointment' , true))); ?>〜<?php echo $this->KendbForm->input('next4_payment_d_appointment_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next5_payment_d_appointment_f', array('div' => false, 'label' => __('Next5 Payment D Appointment' , true))); ?>〜<?php echo $this->KendbForm->input('next5_payment_d_appointment_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('current_payment_sum_f', array('div' => false, 'label' => __('Current Payment Sum' , true))); ?>〜<?php echo $this->KendbForm->input('current_payment_sum_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('current_payment_d_f', array('div' => false, 'label' => __('Current Payment D' , true))); ?>〜<?php echo $this->KendbForm->input('current_payment_d_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('current_payment_i_f', array('div' => false, 'label' => __('Current Payment R' , true))); ?>〜<?php echo $this->KendbForm->input('current_payment_i_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next1_payment_d_f', array('div' => false, 'label' => __('Next1 Payment D' , true))); ?>〜<?php echo $this->KendbForm->input('next1_payment_d_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next2_payment_d_f', array('div' => false, 'label' => __('Next2 Payment D' , true))); ?>〜<?php echo $this->KendbForm->input('next2_payment_d_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next3_payment_d_f', array('div' => false, 'label' => __('Next3 Payment D' , true))); ?>〜<?php echo $this->KendbForm->input('next3_payment_d_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next4_payment_d_f', array('div' => false, 'label' => __('Next4 Payment D' , true))); ?>〜<?php echo $this->KendbForm->input('next4_payment_d_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('next5_payment_d_f', array('div' => false, 'label' => __('Next5 Payment D' , true))); ?>〜<?php echo $this->KendbForm->input('next5_payment_d_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>


	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('researcher_no'); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_assignment'); ?></td>
	<td><?php echo $this->KendbForm->input('remarks1', array('type' => 'text', 'size' => 20)); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 2) { ?>
	<h3>交付申請データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('grant_reception_date_f', array('div' => false, 'label' => __('Grant Reception Date' , true))); ?>〜<?php echo $this->KendbForm->input('grant_reception_date_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('total_primary_cost_f', array('div' => false, 'label' => __('Total Primary Cost' , true))); ?>〜<?php echo $this->KendbForm->input('total_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('detail_goods_cost_f', array('div' => false, 'label' => __('Detail Goods Cost' , true))); ?>〜<?php echo $this->KendbForm->input('detail_goods_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('detail_travel_cost_f', array('div' => false, 'label' => __('Detail Travel Cost' , true))); ?>〜<?php echo $this->KendbForm->input('detail_travel_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('detail_gratuity_cost_f', array('div' => false, 'label' => __('Detail Gratuity Cost' , true))); ?>〜<?php echo $this->KendbForm->input('detail_gratuity_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('detail_other_cost_f', array('div' => false, 'label' => __('Detail Other Cost' , true))); ?>〜<?php echo $this->KendbForm->input('detail_other_cost_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_issue_application', array('type' => 'text')); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('contribution_count_f', array('div' => false, 'label' => __('Contribution Count' , true))); ?>〜<?php echo $this->KendbForm->input('contribution_count_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('contribution_amount_f', array('div' => false, 'label' => __('Contribution Amount' , true))); ?>〜<?php echo $this->KendbForm->input('contribution_amount_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('contribution_partition_f', array('div' => false, 'label' => __('Contribution Partition' , true))); ?>〜<?php echo $this->KendbForm->input('contribution_partition_t', array('div' => false, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('adjudicator'); ?></td>
	<td><?php echo $this->KendbForm->input('contribution_remarks', array('type' => 'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 3) { ?>
	<h3>実績報告データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_report_reception_date_f', array('div' => false, 'label' => __('Achievement Report Reception Date' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_report_reception_date_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_primary_cost_f', array('div' => false, 'label' => __('Achievement Primary Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_detail_goods_cost_f', array('div' => false, 'label' => __('Achievement Detail Goods Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_detail_goods_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_detail_travel_cost_f', array('div' => false, 'label' => __('Achievement Detail Travel Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_detail_travel_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_detail_gratuity_cost_f', array('div' => false, 'label' => __('Achievement Detail Gratuity Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_detail_gratuity_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_detail_other_cost_f', array('div' => false, 'label' => __('Achievement Detail Other Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_detail_other_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_indirect_cost_f', array('div' => false, 'label' => __('Achievement Indirect Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_indirect_cost_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('achievement_remarks', array('type' => 'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 4) { ?>
	<h3>繰越データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_carried_report_reception_date_f', array('div' => false, 'label' => __('Achievement Carried Report Reception Date' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_report_reception_date_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_carried_primary_cost_f', array('div' => false, 'label' => __('Achievement Carried Primary Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_carried_detail_goods_cost_f', array('div' => false, 'label' => __('Achievement Carried Detail Goods Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_detail_goods_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_carried_detail_travel_cost_f', array('div' => false, 'label' => __('Achievement Carried Detail Travel Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_detail_travel_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_carried_detail_gratuity_cost_f', array('div' => false, 'label' => __('Achievement Carried Detail Gratuity Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_detail_gratuity_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_carried_detail_other_cost_f', array('div' => false, 'label' => __('Achievement Carried Detail Other Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_detail_other_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('achievement_carried_indirect_cost_f', array('div' => false, 'label' => __('Achievement Carried Indirect Cost' , true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_indirect_cost_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('carried_titech_assignment_no'); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('carried_primary_cost_f', array('div' => false, 'label' => __('Carried Primary Cost' , true))); ?>〜<?php echo $this->KendbForm->input('carried_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('carried_detail_goods_cost_f', array('div' => false, 'label' => __('Carried Detail Goods Cost' , true))); ?>〜<?php echo $this->KendbForm->input('carried_detail_goods_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('carried_detail_travel_cost_f', array('div' => false, 'label' => __('Carried Detail Travel Cost' , true))); ?>〜<?php echo $this->KendbForm->input('carried_detail_travel_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('carried_detail_gratuity_cost_f', array('div' => false, 'label' => __('Carried Detail Gratuity Cost' , true))); ?>〜<?php echo $this->KendbForm->input('carried_detail_gratuity_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('carried_detail_other_cost_f', array('div' => false, 'label' => __('Carried Detail Other Cost' , true))); ?>〜<?php echo $this->KendbForm->input('carried_detail_other_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('carried_indirect_cost_f', array('div' => false, 'label' => __('Carried Indirect Cost' , true))); ?>〜<?php echo $this->KendbForm->input('carried_indirect_cost_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('process_carried_remarks', array('type' => 'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 5) { ?>
	<h3>額の返還・確定データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('fixed_amount_f', array('div' => false, 'label' => __('Fixed Amount' , true))); ?>〜<?php echo $this->KendbForm->input('fixed_amount_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('fixed_amount_primary_cost_f', array('div' => false, 'label' => __('Fixed Amount Primary Cost' , true))); ?>〜<?php echo $this->KendbForm->input('fixed_amount_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('fixed_amount_indirect_cost_f', array('div' => false, 'label' => __('Fixed Amount Indirect Cost' , true))); ?>〜<?php echo $this->KendbForm->input('fixed_amount_indirect_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('turnback_amount_f', array('div' => false, 'label' => __('Turnback Amount' , true))); ?>〜<?php echo $this->KendbForm->input('turnback_amount_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('turnback_amount_primary_cost_f', array('div' => false, 'label' => __('Turnback Amount Primary Cost' , true))); ?>〜<?php echo $this->KendbForm->input('turnback_amount_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('turnback_amount_indirect_cost_f', array('div' => false, 'label' => __('Turnback Amount Indirect Cost' , true))); ?>〜<?php echo $this->KendbForm->input('turnback_amount_indirect_cost_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('turnback_amount_remarks', array('type'=> 'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 6) { ?>
	<h3>自己評価・成果データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
		<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('self_assessment_person'); ?></td>
		<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('self_assessment_date_f', array('div' => false, 'label' => __('Self Assessment Date' , true))); ?>〜<?php echo $this->KendbForm->input('self_assessment_date_t', array('div' => false, 'label' => false)); ?></td>
		<td><?php echo $this->KendbForm->input('self_assessment_remarks', array('type'=>'text')); ?></td>
		<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('accomplishment_object_person'); ?></td>
	</tr>
	<tr>
		<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('accomplishment_date_f', array('div' => false, 'label' => __('Accomplishment Date' , true))); ?>〜<?php echo $this->KendbForm->input('accomplishment_date_t', array('div' => false, 'label' => false)); ?></td>
		<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('process_date_f', array('div' => false, 'label' => __('Process Date' , true))); ?>〜<?php echo $this->KendbForm->input('process_date_t', array('div' => false, 'label' => false)); ?></td>
		<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('accomplishment_scheduled_date_f', array('div' => false, 'label' => __('Accomplishment Scheduled Date' , true))); ?>〜<?php echo $this->KendbForm->input('accomplishment_scheduled_date_t', array('div' => false, 'label' => false)); ?></td>
		<td><?php echo $this->KendbForm->input('accomplishment_remarks', array('type' => 'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 7) { ?>
	<h3>連絡先・その他データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('extension'); ?></td>
	<td><?php echo $this->KendbForm->input('fax'); ?></td>
	<td><?php echo $this->KendbForm->input('post_no'); ?></td>
	<td><?php echo $this->KendbForm->input('email'); ?></td>
	<td><?php echo $this->KendbForm->input('special_mention', array('type'=>'text')); ?></td>
	<td><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
	<td><?php echo $this->KendbForm->input('personal_no'); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 8) { ?>
	<h3>データ件数と範囲</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
		<td><?php echo $this->Form->input('limit', array('label' => __('Limit', true), 'type' => 'select', 'div' => false, 'options' => array("20" => "20", "50" => "50", "100" => "100"))); ?></td>
		<!-- 隠している削除データを表示するか -->
		<td colspan="8"><?php echo $this->Form->input('scope', array('label' => __('Scope', true), 'type' => 'select', 'div' => false, 'options' => array('0' => __('Show Valid Data', true), '1' => __('Show Data includes deleted item', true), '2' => __('Show All Data', true)))); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php echo $this->Form->submit(__('Search',true)); ?>

	<?php echo $this->Form->end(); ?>

	<?php echo $this->element("form_tips"); ?>


<div id="r_search_result" title="教員の選択" style="display : none;">&nbsp;</div>

<script type="text/javascript">
$(document).ready(function() {
	// ダイアログボックスの初期化
	$('#r_search_result').dialog({
		bgiframe: true,
		autoOpen: false,
		width: 500,
		modal: true,
		buttons: {
			'閉じる': function() {
				$(this).dialog('close');
			}
		}
	});

	$('#r_search').click(function() {
		var rname = $('#AdoptionName').val();
		if(rname == "") {
			alert("名前を一文字以上入力してください");
			return;
		}
		var url = "<?php echo $html->url('/researchers/ajax_search'); ?>";
		$.post(url,
			{ researcher_name: rname},
			function(data) {
				$('#r_search_result').html(data);
			}
		);
		$('#r_search_result').dialog('open');
	});
});

function set_rinfo(id) {
	$.get("/researchers/getJsonById/"+id, function(data) {
		var researcher = jQuery.parseJSON(data);
		$("#AdoptionName").val(researcher.researcher_name);
		$('#r_search_result').dialog('close');
	});
}

</script>
