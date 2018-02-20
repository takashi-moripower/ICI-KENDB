
	<?php echo $this->KendbForm->create('Entrust', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>
	<?php if ($search_param == 0 || $search_param == 1) { ?>
	<h3>管理データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('id', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->input('project_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('project_type', array('type' => 'select', 'div' => false, 'options' => array('' => '', '共同' => '共同', '受託' => '受託'))); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('reception_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Reception Date', true))); ?>〜<?php echo $this->KendbForm->input('reception_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('person_in_charge', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('resolution_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('branch_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('continuance_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 2) { ?>
	<h3>人事データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->input('cooperate_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('department', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('major_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('institute_code', array('type' => 'text', 'div' => false, 'size' => 100)); ?></td>
	<td><?php echo $this->KendbForm->input('school_code', array('type' => 'text', 'div' => false, 'size' => 100)); ?></td>
	<td><?php echo $this->KendbForm->input('course_code', array('type' => 'text', 'div' => false, 'size' => 100)); ?></td>
	<td><?php echo $this->KendbForm->input('job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('extension', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('post_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('email', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 3) { ?>
	<h3>プロジェクトデータ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('subject', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('start_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Start Date', true))); ?>〜<?php echo $this->KendbForm->input('start_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('end_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('End Date', true))); ?>〜<?php echo $this->KendbForm->input('end_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contraction_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Contraction Date', true))); ?>〜<?php echo $this->KendbForm->input('contraction_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->Form->input('area_of_research', array('type' => 'select', 'div' => false, 'options' => $area_of_research)); ?></td>
	<td><?php echo $this->Form->input('singular_or_multi', array('type' => 'select', 'div' => false, 'options' => array('' => '', '単' => '単', '複' => '複'))); ?></td>
	<td><?php echo $this->KendbForm->input('new_or_continuance', array('type' => 'select', 'div' => false, 'options' => array('' => '', '新規' => '新規', '継続' => '継続'))); ?></td>
	<td><?php echo $this->KendbForm->input('applicant_name_1', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->Form->input('category_of_business', array('type' => 'select', 'div' => false, 'options' => $category_of_business)); ?></td>
	<td><?php echo $this->Form->input('association_type', array('type' => 'select', 'options' => array('' => '', '会' => '会', '外'=>'外', '団' => '団')));?></td>
	<td><?php echo $this->Form->input('applicant_scale', array('type' => 'select', 'options' => array('' => '', '大' => '大', '中小' => '中小', '小規模' => '小規模')));?></td>
	<td><?php echo $this->KendbForm->input('applicant_name_2', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('business_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('representative', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('address', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('associate_researcher_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('number_of_researchers', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td></td>
	<td></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 4) { ?>
	<h3>経理データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('start_budget_year', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('credit_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Credit', true))); ?>〜<?php echo $this->KendbForm->input('credit_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('division_count_f', array('type' => 'text', 'div' => false, 'size' => 3, 'label' => __('Division Count', true))); ?>〜<?php echo $this->KendbForm->input('division_count_t', array('type' => 'text', 'div' => false, 'size' => 3, 'label' => false)); ?></td>
	<td colspan="2"></td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('former_payment_d_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Former Payment D', true))); ?>〜<?php echo $this->KendbForm->input('former_payment_d_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('former_payment_r_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Former Payment R', true))); ?>〜<?php echo $this->KendbForm->input('former_payment_r_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('former_payment_i_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Former Payment I', true))); ?>〜<?php echo $this->KendbForm->input('former_payment_i_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('former_payment_sum_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Former Payment Sum', true))); ?>〜<?php echo $this->KendbForm->input('former_payment_sum_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('current_payment_d_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Current Payment D', true))); ?>〜<?php echo $this->KendbForm->input('current_payment_d_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('current_payment_r_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Current Payment R', true))); ?>〜<?php echo $this->KendbForm->input('current_payment_r_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('current_payment_i_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Current Payment I', true))); ?>〜<?php echo $this->KendbForm->input('current_payment_i_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('current_payment_sum_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Current Payment Sum', true))); ?>〜<?php echo $this->KendbForm->input('current_payment_sum_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('current_payment_dr_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Current Payment Dr', true))); ?>〜<?php echo $this->KendbForm->input('current_payment_dr_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('current_payment_u_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Current Payment U', true))); ?>〜<?php echo $this->KendbForm->input('current_payment_u_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('current_payment_g_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Current Payment G', true))); ?>〜<?php echo $this->KendbForm->input('current_payment_g_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan">&nbsp;</td>
	</tr>
	<tr>
	<!--
	<td colspan="4"><?php echo $this->Form->input('formula', array('type' => 'select', 'options' => array('1' => '本年度直(研究室配分)+(本年度研料/401400)*301400', '0' => '')));?></td>
	-->
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('current_payment_alloc_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Current Payment Alloc', true))); ?>〜<?php echo $this->KendbForm->input('current_payment_alloc_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="8">&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next1_payment_d_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next1 Payment D', true))); ?>〜<?php echo $this->KendbForm->input('next1_payment_d_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next1_payment_r_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next1 Payment R', true))); ?>〜<?php echo $this->KendbForm->input('next1_payment_r_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next1_payment_i_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next1 Payment I', true))); ?>〜<?php echo $this->KendbForm->input('next1_payment_i_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next1_payment_sum_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next1 Payment Sum', true))); ?>〜<?php echo $this->KendbForm->input('next1_payment_sum_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next2_payment_d_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next2 Payment D', true))); ?>〜<?php echo $this->KendbForm->input('next2_payment_d_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next2_payment_r_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next2 Payment R', true))); ?>〜<?php echo $this->KendbForm->input('next2_payment_r_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next2_payment_i_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next2 Payment I', true))); ?>〜<?php echo $this->KendbForm->input('next2_payment_i_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next2_payment_sum_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next2 Payment Sum', true))); ?>〜<?php echo $this->KendbForm->input('next2_payment_sum_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next3_payment_d_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next3 Payment D', true))); ?>〜<?php echo $this->KendbForm->input('next3_payment_d_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next3_payment_r_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next3 Payment R', true))); ?>〜<?php echo $this->KendbForm->input('next3_payment_r_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next3_payment_i_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next3 Payment I', true))); ?>〜<?php echo $this->KendbForm->input('next3_payment_i_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next3_payment_sum_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next3 Payment Sum', true))); ?>〜<?php echo $this->KendbForm->input('next3_payment_sum_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next4_payment_d_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next4 Payment D', true))); ?>〜<?php echo $this->KendbForm->input('next4_payment_d_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next4_payment_r_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next4 Payment R', true))); ?>〜<?php echo $this->KendbForm->input('next4_payment_r_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next4_payment_i_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next4 Payment I', true))); ?>〜<?php echo $this->KendbForm->input('next4_payment_i_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next4_payment_sum_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Next4 Payment Sum', true))); ?>〜<?php echo $this->KendbForm->input('next4_payment_sum_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('d_total_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('D Total', true))); ?>〜<?php echo $this->KendbForm->input('d_total_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('r_total_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('R Total', true))); ?>〜<?php echo $this->KendbForm->input('r_total_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('i_total_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('I Total', true))); ?>〜<?php echo $this->KendbForm->input('i_total_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('total_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Total Amount', true))); ?>〜<?php echo $this->KendbForm->input('total_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('resolution_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Resolution Date', true))); ?>〜<?php echo $this->KendbForm->input('resolution_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_due_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Due', true))); ?>〜<?php echo $this->KendbForm->input('payment_due_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_month_f', array('type' => 'text', 'div' => false, 'label' => __('Payment Month', true))); ?>〜<?php echo $this->KendbForm->input('payment_month_t', array('type' => 'text', 'div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Date', true))); ?>〜<?php echo $this->KendbForm->input('payment_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->Form->input('advance', array('type' => 'select', 'options' => array('' => '', '×' => '×', '◎' => '◎', '○' => '○', '不' => '不')));?></td>
	<td>&nbsp;</td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 5) { ?>
	<h3>事業所データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('ow_post_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ow_address', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ow_company_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ow_section', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ow_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ow_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ow_tel', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ow_fax', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ow_email', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('bill_post_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('bill_address', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('bill_company_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('bill_section', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('bill_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('bill_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('bill_tel', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('bill_fax', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('bill_email', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td>&nbsp;</td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 6) { ?>
	<h3>備考</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="4"><?php echo $this->KendbForm->input('entrust_remarks', array('type' => 'text', 'div' => false, 'size' => 30)); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 7) { ?>
	<h3>データ件数と範囲</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
		<td><?php echo $this->Form->input('limit', array('label' => __('Limit', true), 'type' => 'select', 'div' => false, 'options' => array("20" => "20", "50" => "50", "100" => "100"))); ?></td>
		<!-- 隠している削除データを表示するか -->
		<td colspan="8"><?php echo $this->Form->input('scope', array('label' => __('Scope', true), 'type' => 'select', 'div' => false, 'options' => array('0' => __('Show Valid Data', true), '1' => __('Show Data includes deleted item', true), '2' => __('Show All Data', true)))); ?></td>
	</tr>
	</table>
	<?php } ?>
	<br clear="all" />
	<table>
	<tr>
	<td><?php echo $this->Form->input('show_flat', array('label' => false, 'type' =>'select', 'div' => false, 'options' => array("0" => "プロジェクトレコードのみ", "1"=> "全データ"))); ?></td>
	<td><?php echo $this->Form->submit(__('Search',true), array('div' => false)); ?></td>
	</table>

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
		var rname = $('#EntrustResearcherName').val();
		if(rname == "") {
			alert("名前を一文字以上入力してください");
			return;
		}
		var url = "<?php echo $html->url('/researchers/ajax_search'); ?>";
		$.post(url,
			{ researcher_name: rname},
			function(data) {
				//alert(data);
				$('#r_search_result').html(data);
			}
		);
		$('#r_search_result').dialog('open');
	});
});

function set_rinfo(id) {
	$.get("/researchers/getJsonById/"+id, function(data) {
		var researcher = jQuery.parseJSON(data);
		$("#EntrustResearcherName").val(researcher.researcher_name);
		$('#r_search_result').dialog('close');
	});
}
</script>
