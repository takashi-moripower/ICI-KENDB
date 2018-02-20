<?php echo $this->KendbForm->create('NedoJstOther', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>
<?php $nedo = new NedoJstOther(); ?>
<?php if ($search_param == 0 || $search_param == 1) { ?>
<h3>管理データ</h3>
	<table>
	<tr>
	<td><?php echo $this->KendbForm->input('id', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->input('project_type', array('type'=>'select', 'div' =>'false', 'options' => array(''=>'', 'NEDO'=>'NEDO','JST'=>'JST','その他'=>'その他'))); ?></td>
	<td><?php echo $this->KendbForm->input('project_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('person_in_charge', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('master_registration',array('type'=>'select', 'div' => false, 'options'=>array('' =>'', '未'=>'未','済'=>'済'))); ?></td>
	<td><?php echo $this->KendbForm->input('arrange_no_1', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('arrange_no_2', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('arrange_no_3', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('arrange_no_4', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('arrange_no_5', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 2) { ?>
<h3>人事データ</h3>
	<table>
	<tr valign="top">
	<td><?php echo $this->KendbForm->input('researcher_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cooperate_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('department', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('major_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('institute_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('school_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('course_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('head_of_department', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('email', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => $nedo->output_column_label_alias['email'])); ?></td>
	<td><?php echo $this->KendbForm->input('area',array('type'=>'select','div' => 'false', 'options'=>array(''=>'','大岡山'=>'大岡山','すずかけ台'=>'すずかけ台','田町'=>'田町'))); ?></td>
	<td><?php echo $this->KendbForm->input('co_researcher', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 3) { ?>
<h3>プロジェクトデータ</h3>
	<table>
	<tr>
	<td><?php echo $this->KendbForm->input('subject', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ordering_organization_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('applicant_job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('applicant_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('contractor_job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('contractor_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('related_ministries', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('business_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ordering_organization_type', array('type' => 'select', 'div' => 'false', 'options'=> $ordering_organization_type)); ?></td>
	<td><?php echo $this->KendbForm->input('government_type',array('type'=>'select', 'div' => 'false', 'options'=>array(''=>'','政府等'=>'政府等','非政府'=>'非政府'))); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('area_of_research', array('type' => 'select', 'div' => 'false', 'options' => $area_of_research)); ?></td>
	<td colspan="2"><?php echo $this->KendbForm->input('start_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Start Date', true))); ?>〜
	<?php echo $this->KendbForm->input('start_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => '')); ?>
	</td>
	<td colspan="2"><?php echo $this->KendbForm->input('end_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('End Date',true))); ?>〜
	<?php echo $this->KendbForm->input('end_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => '')); ?>
	</td>
	<td colspan="2"><?php echo $this->KendbForm->input('memorandum_start_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Memorandum Start Date', true))); ?>〜
	<?php echo $this->KendbForm->input('memorandum_start_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => '')); ?>
	</td>
	<td colspan="2"><?php echo $this->KendbForm->input('memorandum_end_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Memorandum End Date', true))); ?>〜
	<?php echo $this->KendbForm->input('memorandum_end_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => '')); ?>
	</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="3"><?php echo $this->KendbForm->input('asset_belongingness', array('type' => 'select', 'div' => 'false', 'options' => $asset_belongingness)); ?></td>
	<td><?php echo $this->KendbForm->input('continuance_forcast', array('type' => 'select', 'div' => 'false', 'div' => 'false', 'options' => array('' => '', '有' => '有', '無' => '無'))); ?></td>
	<td><?php echo $this->Form->input('new_or_continuance', array('type' => 'select', 'options' => array('' => '', '新規' => '新規', '継続' => '継続')));?></td>
	<td><?php echo $this->Form->input('singular_or_multi', array('type' => 'select', 'div' => 'false', 'options' => array('' => '', '単' => '単', '複' => '複')));?></td>
	<td><?php echo $this->KendbForm->input('multi_year_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('competitive_fund',array('type'=>'select', 'div' => 'false', 'options'=>array(''=>'','競争的資金'=>'競争的資金','非競争的資金'=>'非競争的資金','RR2002・LP'=>'RR2002・LP'))); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 4) { ?>
<h3>事業所データ</h3>
	<table>
	<tr>
	<td><?php echo $this->KendbForm->input('cp_post_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cp_address', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cp_section', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cp_job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cp_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cp_tel', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cp_extension', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cp_fax', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cp_email', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => $nedo->output_column_label_alias['cp_email'])); ?></td>
	</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 5) { ?>
<h3>経理データ</h3>
	<table>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('application_reception_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Application Reception Date', true))); ?>〜
	<?php echo $this->KendbForm->input('application_reception_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('titech_reception_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('notification_drafting_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Notification Drafting Date', true))); ?>〜
	<?php echo $this->KendbForm->input('notification_drafting_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('notification_settlement_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Notification Settlement Date', true))); ?>〜
	<?php echo $this->KendbForm->input('notification_settlement_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('notification_send_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Notification Send Date', true))); ?>〜
	<?php echo $this->KendbForm->input('notification_send_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contract_send_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Contract Send Date', true))); ?>〜
	<?php echo $this->KendbForm->input('contract_send_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>
	</table>

	<table>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contract_reception_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Contract Reception Date', true))); ?>〜
	<?php echo $this->KendbForm->input('contract_reception_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('amount_fixed_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Amount Fixed Date', true))); ?>〜
	<?php echo $this->KendbForm->input('amount_fixed_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('divide_paying', array('type' => 'select', 'div' => false, 'options'=> array(''=>'', '分割入金'=>'分割入金'))); ?></td>
	<td><?php echo $this->KendbForm->input('adjust_paying', array('type'=>'select', 'div' => 'false', 'options'=>array(''=>'','一部精算'=>'一部精算','全部精算'=>'全部精算'))); ?></td>
	<td><?php echo $this->KendbForm->input('charge_format', array('type'=>'select', 'div' => 'false', 'options'=>array(''=>'','有'=>'有','無'=>'無'))); ?></td>
	</tr>
	</table>

	<table>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('charge_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Charge',true))); ?>〜
	<?php echo $this->KendbForm->input('charge_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('charged_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Charged Amount',true))); ?>〜
	<?php echo $this->KendbForm->input('charged_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('claimed_balance_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Claimed Balance',true))); ?>
	〜<?php echo $this->KendbForm->input('claimed_balance_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>
	</table>

	<table>
	<tr>
	<td class="colspan" colspan="2" nowrap><?php echo $this->KendbForm->input('charge_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Charge 1',true))); ?>〜
		<?php echo $this->KendbForm->input('charge_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?></td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_send_date_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Send Date 1',true))); ?>〜
		<?php echo $this->KendbForm->input('statement_send_date_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?></td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_date_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Date 1',true))); ?>〜
		<?php echo $this->KendbForm->input('statement_date_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?></td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_due_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Due 1',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_due_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_date_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Date 1',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_date_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	</tr>
	<tr>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('charge_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Charge 2',true))); ?>〜
	<?php echo $this->KendbForm->input('charge_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_send_date_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Send Date 2',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_send_date_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_date_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Date 2',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_date_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_due_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Due 2',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_due_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_date_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Date 2',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_date_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	</tr>
	<tr>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('charge_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Charge 3',true))); ?>〜
	<?php echo $this->KendbForm->input('charge_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_send_date_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Send Date 3',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_send_date_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_date_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Date 3',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_date_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_due_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Due 3',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_due_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_date_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Date 3',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_date_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	</tr>
	<tr>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('charge_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Charge 4',true))); ?>〜
	<?php echo $this->KendbForm->input('charge_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_send_date_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Send Date 4',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_send_date_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_date_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Date 4',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_date_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_due_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Due 4',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_due_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_date_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Date 4',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_date_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	</tr>
	<tr>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('charge_5_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Charge 5',true))); ?>〜
	<?php echo $this->KendbForm->input('charge_5_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_send_date_5_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Send Date 5',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_send_date_5_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_date_5_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Date 5',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_date_5_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_due_5_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Due 5',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_due_5_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_date_5_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Date 5',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_date_5_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	</tr>
	<tr>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('charge_6_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Charge 6',true))); ?>〜
	<?php echo $this->KendbForm->input('charge_6_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_send_date_6_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Send Date 6',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_send_date_6_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('statement_date_6_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Date 6',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_date_6_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_due_6_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Due 6',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_due_6_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	<td class="colspan" colspan="2"><?php echo $this->KendbForm->input('payment_date_6_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Payment Date 6',true))); ?>〜
	<?php echo $this->KendbForm->input('payment_date_6_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?>
	</td>
	</tr>
	</table>

<table>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accounting_report_due_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Accounting Report Due', true))); ?>〜
		<?php echo $this->KendbForm->input('accounting_report_due_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accounting_report_format',array('type'=>'select', 'div' => 'false', 'options'=>array(''=>'','先方様式'=>'先方様式'))); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accounting_report_request_day_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Accounting Report Request Day', true))); ?>〜
		<?php echo $this->KendbForm->input('accounting_report_request_day_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accounting_report_reception_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Accounting Report Reception Date', true))); ?>〜
		<?php echo $this->KendbForm->input('accounting_report_reception_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accounting_report_drafting_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Accounting Report Drafting Date', true))); ?>〜
		<?php echo $this->KendbForm->input('accounting_report_drafting_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		</tr>
	</table>

<table>
	<tr>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accounting_report_settlement_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Accounting Report Settlement Date',true))); ?>〜
		<?php echo $this->KendbForm->input('accounting_report_settlement_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=>false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accounting_report_send_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Accounting Report Send Date', true))); ?>〜
		<?php echo $this->KendbForm->input('accounting_report_send_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=>false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accomplishment_due_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Accomplishment Due',true))); ?>〜
		<?php echo $this->KendbForm->input('accomplishment_due_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=>false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accomplishment_format',array('type'=>'select', 'div' => 'false', 'options'=>array(''=>'','先方様式'=>'先方様式'))); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('accomplishment_send_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Accomplishment Send Date', true))); ?>〜
		<?php echo $this->KendbForm->input('accomplishment_send_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>
</table>

<table>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('reception_decision_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Reception Decision Date',true))); ?>〜
		<?php echo $this->KendbForm->input('reception_decision_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contraction_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Contraction Date', true))); ?>〜
		<?php echo $this->KendbForm->input('contraction_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('total_reception_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Total Reception Amount',true))); ?>〜
	<?php echo $this->KendbForm->input('total_reception_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_1', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 1',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 1',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_2', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 2',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 2',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_3', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 3',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 3',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		</tr>
		<tr>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_4', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 4',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 4',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_5', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 5',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_5_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 5',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_5_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_6', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 6',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_6_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 6',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_6_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		</tr>
		<tr>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_7', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 7',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_7_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 7',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_7_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_8', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 8',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_8_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 8',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_8_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_9', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 9',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_9_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 9',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_9_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		</tr>
		<tr>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->nendoPullDown('plural_year_10', array('type' => 'text', 'div' => false, 'label'=> __('Plural Year 10',true))); ?></td>
		<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('plural_contract_amount_10_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Plural Contract Amount 10',true))); ?>〜
	<?php echo $this->KendbForm->input('plural_contract_amount_10_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
		</tr>
</table>

	<table>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('photothermic_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Photothermic Cost',true))); ?>〜
	<?php echo $this->KendbForm->input('photothermic_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('other_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Other Cost',true))); ?>〜
	<?php echo $this->KendbForm->input('other_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('research_expense_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Research Expense',true))); ?>〜
	<?php echo $this->KendbForm->input('research_expense_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan">&nbsp;</td>
	<td colspan="2" class="colspan">&nbsp;</td>
	</tr>
	</table>

	<table>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('reconsignment_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Reconsignment Cost',true))); ?>〜
	<?php echo $this->KendbForm->input('reconsignment_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('general_administration_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('General Administration Cost',true))); ?>〜
	<?php echo $this->KendbForm->input('general_administration_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('total_primary_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Total Primary Cost',true))); ?>〜
	<?php echo $this->KendbForm->input('total_primary_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('indirect_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Indirect Cost',true))); ?>〜
	<?php echo $this->KendbForm->input('indirect_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('this_year_reception_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('This Year Reception Amount',true))); ?>〜
	<?php echo $this->KendbForm->input('this_year_reception_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>
	</table>

	<table>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('statement_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Statement Amount',true))); ?>〜
	<?php echo $this->KendbForm->input('statement_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contracted_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Contracted Amount',true))); ?>〜
	<?php echo $this->KendbForm->input('contracted_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contracted_amount_indirect_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Contracted Amount Indirect',true))); ?>〜
	<?php echo $this->KendbForm->input('contracted_amount_indirect_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contracted_count_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Contracted Count',true))); ?>〜
	<?php echo $this->KendbForm->input('contracted_count_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contracted_count_continuance_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Contracted Count Continuance',true))); ?>〜
	<?php echo $this->KendbForm->input('contracted_count_continuance_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>
	</table>

	<table>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('income_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Income 1',true))); ?>〜
	<?php echo $this->KendbForm->input('income_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('income_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Income 2',true))); ?>〜
	<?php echo $this->KendbForm->input('income_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('income_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Income 3',true))); ?>〜
	<?php echo $this->KendbForm->input('income_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('income_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Income 4',true))); ?>〜
	<?php echo $this->KendbForm->input('income_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan">&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('income_5_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Income 5',true))); ?>〜
	<?php echo $this->KendbForm->input('income_5_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('income_6_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Income 6',true))); ?>〜
	<?php echo $this->KendbForm->input('income_6_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="6">&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('former1_project_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('former2_project_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('former3_project_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('functions_manual', array('type' => 'select', 'div' => 'false', 'options' => $functions_manual)); ?></td>
	<td><?php echo $this->KendbForm->input('implementation_document',array('type'=>'select','div' => 'false','options'=>array(''=>'','あり'=>'あり','なし'=>'なし'))); ?></td>
	<td><?php echo $this->KendbForm->input('contract_management_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('reported_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Reported Amount',true))); ?>〜
	<?php echo $this->KendbForm->input('reported_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('fixed_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Fixed Amount',true))); ?>〜
	<?php echo $this->KendbForm->input('fixed_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('balance_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Balance',true))); ?>〜
	<?php echo $this->KendbForm->input('balance_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('turnback_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label'=> __('Turnback Amount',true))); ?>〜
	<?php echo $this->KendbForm->input('turnback_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('advance_confirmation_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Advance Confirmation Date', true))); ?>〜
		<?php echo $this->KendbForm->input('advance_confirmation_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('goods_system_registration_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Goods System Registration Date',true))); ?>〜
		<?php echo $this->KendbForm->input('goods_system_registration_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>
</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 8) { ?>
<h3>その他データ</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="3"><?php echo $this->KendbForm->input('remarks', array('type' => 'text', 'div' => false, 'size' => 30)); ?></td>
	</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 9) { ?>
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
		var rname = $('#NedoJstOtherResearcherName').val();
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
		$("#NedoJstOtherResearcherName").val(researcher.researcher_name);
		$('#r_search_result').dialog('close');
	});
}
</script>
