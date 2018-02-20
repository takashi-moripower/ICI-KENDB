<h3>管理データ</h3>
<input type="hidden" name="rtn" value="<?php echo $rtn; ?>">

<table width="100%" border="0">
<tr>
<td width="20%"><?php echo $this->KendbForm->nendoPullDown('year'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('project_type', array('type'=>'select', 'options' => array(''=>'', 'NEDO'=>'NEDO','JST'=>'JST','その他'=>'その他'))); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('project_code'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('person_in_charge'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('master_registration',array('type'=>'select','options'=>array('未'=>'未','済'=>'済'))); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('arrange_no_1'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('arrange_no_2'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('arrange_no_3'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('arrange_no_4'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('arrange_no_5'); ?></td>
</tr>
</table>
<br clear="all" />

<?php $nedo = new NedoJstOther(); ?>

<div id="tab_parent">
<ul>
	<li><a href="#tab_jinji">人事データ</a></li>
	<li><a href="#tab_project">プロジェクトデータ</a></li>
	<li><a href="#tab_jigyousho">事業所データ</a></li>
	<li><a href="#tab_keiri">経理データ</a></li>
	<li><a href="#tab_change">変更データ</a></li>
	<li><a href="#tab_contract_change">契約変更データ</a></li>
	<li><a href="#tab_other">その他データ</a></li>
</ul>
<div style="float:right;margin-bottom:-30px;">
<input type="button" name="recalc" id="recalc" value="再計算" />
</div>

<div id="tab_jinji">
<div id="r_search_result" title="教員の選択" style="display : none;">&nbsp;</div>

<h3>人事データ</h3>
<table width="100%" border="0">
<tr>
<td width="20%"><?php echo $this->KendbForm->input('researcher_no'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('researcher_name'); ?><input type="button" id="r_search" value="検索" /></td>

</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('institute_code'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('school_code'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('course_code'); ?></td>
</tr>
<tr class="old_item_row">
	<td width="20%"><?php echo $this->KendbForm->input('department', array('class' => 'old_org')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('major_name', array('class' => 'old_org')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('head_of_department', array('class' => 'old_org')); ?></td>
	<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('job_title'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('email', array('label' => $nedo->output_column_label_alias['email'])); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('area',array('type'=>'select','options'=>array(''=>'','大岡山'=>'大岡山','すずかけ台'=>'すずかけ台','田町'=>'田町'))); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('co_researcher'); ?></td>
</tr>
</table>
</div>

<div id="tab_project">
<h3>プロジェクトデータ</h3>
<table width="100%" border="0">
<tr>
<td colspan="3" width="60%"><?php echo $this->KendbForm->input('subject', array('style' => 'width:600px')); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('ordering_organization_name'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('applicant_job_title'); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('applicant_name'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('contractor_job_title'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('contractor_name'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('related_ministries'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('business_name'); ?></td>
</tr>
<tr>
<?php
	// 現在の選択肢をプルダウンに追加する
	$ordering_organization_type[$this->Form->value('ordering_organization_type')] = $this->Form->value('ordering_organization_type');
?>
<td width="20%"><?php echo $this->KendbForm->input('ordering_organization_type', array('type' => 'select', 'options'=> $ordering_organization_type)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('government_type',array('type'=>'select','options'=>array(''=>'','政府等'=>'政府等','非政府'=>'非政府'))); ?></td>
<?php
	// 現在の選択肢をプルダウンに追加する
	$area_of_research[$this->Form->value('area_of_research')] = $this->Form->value('area_of_research');
?>
<td width="20%"><?php echo $this->KendbForm->input('area_of_research', array('type' => 'select', 'options' => $area_of_research)); ?></td>
<td width="20%"><?php echo $datePicker->picker('start_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('end_date', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('memorandum_start_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('memorandum_end_date', array('empty'=>true)); ?></td>
<?php
	// 現在の選択肢をプルダウンに追加する
	$asset_belongingness[$this->Form->value('asset_belongingness')] = $this->Form->value('asset_belongingness');
?>
<td colspan="3"><?php echo $this->KendbForm->input('asset_belongingness', array('type' => 'select', 'options' => $asset_belongingness)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('continuance_forcast', array('type' => 'select', 'options' => array('' => '', '有' => '有', '無' => '無'))); ?></td>
<td width="20%"><?php echo $this->Form->input('new_or_continuance', array('type' => 'select', 'options' => array('' => '', '新規' => '新規', '継続' => '継続')));?></td>
<td width="20%"><?php echo $this->Form->input('singular_or_multi', array('type' => 'select', 'options' => array('' => '', '単' => '単', '複' => '複')));?></td>
<td width="20%"><?php echo $this->KendbForm->input('multi_year_no'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('competitive_fund',array('type'=>'select', 'options'=>array(''=>'','競争的資金'=>'競争的資金','非競争的資金'=>'非競争的資金','RR2002・LP'=>'RR2002・LP'))); ?></td>
</tr>
</table>
</div>

<div id="tab_jigyousho">
<h3>事業所データ</h3>
<table width="100%" border="0">
<tr>
<td width="20%"><?php echo $this->KendbForm->input('cp_post_no'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cp_address'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cp_section'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cp_job_title'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cp_name'); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('cp_tel'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cp_extension'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cp_fax'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cp_email', array('label' => $nedo->output_column_label_alias['cp_email'])); ?></td>
<td>&nbsp;</td>
</tr>
</table>
</div>

<div id="tab_keiri">
<h3>経理データ</h3>
<table width="100%" border="0">
<tr>
<td width="20%"><?php echo $datePicker->picker('application_reception_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('titech_reception_no'); ?></td>
<td width="20%">&nbsp;</td>
<td width="20%">&nbsp;</td>
<td width="20%">&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('notification_drafting_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('notification_settlement_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('notification_send_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('contract_send_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('contract_reception_date', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('amount_fixed_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('divide_paying', array('type' => 'select', 'options'=> array(''=>'', '分割入金'=>'分割入金'))); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('adjust_paying', array('type'=>'select', 'options'=>array(''=>'','一部精算'=>'一部精算','全部精算'=>'全部精算'))); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->Form->input('charge_format', array('type'=>'select', 'options'=>array('有'=>'有','無'=>'無'))); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('charge', array('class' => 'autocalc autocalcresult')); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('charged_amount', array('class' =>'autocalc autocalcresult')); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('claimed_balance', array('class' =>'autocalc autocalcresult')); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('charge_1', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_send_date_1', array('empty'=>true, 'class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_date_1', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_due_1', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_date_1', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('charge_2', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_send_date_2', array('empty'=>true, 'class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_date_2', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_due_2', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_date_2', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('charge_3', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_send_date_3', array('empty'=>true, 'class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_date_3', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_due_3', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_date_3', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('charge_4', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_send_date_4', array('empty'=>true, 'class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_date_4', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_due_4', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_date_4', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('charge_5', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_send_date_5', array('empty'=>true, 'class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_date_5', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_due_5', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_date_5', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('charge_6', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_send_date_6', array('empty'=>true, 'class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $datePicker->picker('statement_date_6', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_due_6', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('payment_date_6', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('accounting_report_due', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('accounting_report_format',array('type'=>'select', 'options'=>array(''=>'','先方様式'=>'先方様式'))); ?></td>
<td width="20%"><?php echo $datePicker->picker('accounting_report_request_day', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('accounting_report_reception_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('accounting_report_drafting_date', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('accounting_report_settlement_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('accounting_report_send_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('accomplishment_due', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('accomplishment_format',array('type'=>'select', 'options'=>array(''=>'','先方様式'=>'先方様式'))); ?></td>
<td width="20%"><?php echo $datePicker->picker('accomplishment_send_date', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('reception_decision_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('contraction_date', array('empty'=>true)); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('total_reception_amount', array('class' => 'autocalc autocalcresult')); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_1'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_1', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_2'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_2', array('class' => 'autocalc')); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_3'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_3', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_4'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_4', array('class' => 'autocalc')); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_5'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_5', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_6'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_6', array('class' => 'autocalc')); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_7'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_7', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_8'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_8', array('class' => 'autocalc')); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_9'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_9', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $this->KendbForm->warekiPullDown('plural_year_10'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('plural_contract_amount_10', array('class' => 'autocalc')); ?></td>
<td>&nbsp;</td>
</tr>

<tr>
<td width="20%"><?php echo $this->KendbForm->input('photothermic_cost', array('class' => 'autocalc', 'label' => $nedo->output_column_label_alias['photothermic_cost'])); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('other_cost', array('class' => 'autocalc', 'label'=> $nedo->output_column_label_alias['other_cost'])); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('research_expense', array('class' => 'autocalc autocalcresult', 'label'=> $nedo->output_column_label_alias['research_expense'])); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('reconsignment_cost', array('class' => 'autocalc','label'=> $nedo->output_column_label_alias['reconsignment_cost'])); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('general_administration_cost', array('class' => 'autocalc','label'=> $nedo->output_column_label_alias['general_administration_cost'])); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('total_primary_cost', array('class' => 'autocalc autocalcresult','label'=> $nedo->output_column_label_alias['total_primary_cost'])); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('titech_earnings', array('class' => 'autocalc', 'label' => $nedo->output_column_label_alias['titech_earnings'])); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('labo_earnings', array('class' => 'autocalc', 'label' => $nedo->output_column_label_alias['labo_earnings'])); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('indirect_cost', array('class' => 'autocalc autocalcresult','label'=> $nedo->output_column_label_alias['indirect_cost'])); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('this_year_reception_amount', array('class' => 'autocalcresult','label'=> $nedo->output_column_label_alias['this_year_reception_amount'])); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('statement_amount', array('label' => $nedo->output_column_label_alias['statement_amount'], 'class' => 'autocalc autocalcresult')); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('income_1', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('income_2', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('income_3', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('income_4', array('class' => 'autocalc')); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('income_5', array('class' => 'autocalc')); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('income_6', array('class' => 'autocalc')); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('former1_project_code'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('former2_project_code'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('former3_project_code'); ?></td>
<?php
	// 現在の選択肢をプルダウンに追加する
	$functions_manual[$this->Form->value('functions_manual')] = $this->Form->value('functions_manual');
?>
<td width="20%"><?php echo $this->KendbForm->input('functions_manual', array('type' => 'select', 'options' => $functions_manual)); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('implementation_document',array('type'=>'select','options'=>array(''=>'','あり'=>'あり','なし'=>'なし'))); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('contract_management_no'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('reported_amount'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('fixed_amount'); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('balance', array('class' => 'autocalc autocalcresult','label'=> '残高（契約額－報告書）')); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $this->KendbForm->input('turnback_amount'); ?></td>
<td width="20%"><?php echo $datePicker->picker('advance_confirmation_date', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('goods_system_registration_date', array('empty'=>true)); ?></td>
<td width="20%"></td>
<td width="20%"></td>
</tr>
</table>
</div>

<div id="tab_change">
<h3>変更情報</h3>
<table>
<?php for($i=1; $i<=20; $i++): ?>
<tr>
<td width="20%">
<?php echo $datePicker->picker('contraction_change_date_'.$i , array('empty'=>true, 'label' => sprintf(__('Contraction Change Date(%d)', true), $i))); ?>
</td>
<td width="80%" colspan="4">
<?php echo $this->KendbForm->input('contraction_change_outline_'.$i, array('size' => 100, 'label' => sprintf(__('Contraction Change Outline(%d)', true), $i))); ?>
</td>
</tr>
<?php endfor;?>
</table>
</div>

<div id="tab_contract_change">
<h3>契約変更情報(一次)</h3>
<table width="100%" border="0">
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_reception_date_1', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cc_titech_reception_no_1'); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_drafting_date_1', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_settlement_date_1', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_send_date_1', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_contract_send_date_1', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_contract_reception_date_1', array('empty'=>true)); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>

<h3>契約変更情報(ニ次)</h3>
<table width="100%" border="0">
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_reception_date_2', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cc_titech_reception_no_2'); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_drafting_date_2', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_settlement_date_2', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_send_date_2', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_contract_send_date_2', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_contract_reception_date_2', array('empty'=>true)); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>

<h3>契約変更情報(三次)</h3>
<table width="100%" border="0">
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_reception_date_3', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cc_titech_reception_no_3'); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_drafting_date_3', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_settlement_date_3', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_send_date_3', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_contract_send_date_3', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_contract_reception_date_3', array('empty'=>true)); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>

<h3>契約変更情報(四次)</h3>
<table width="100%" border="0">
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_reception_date_4', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cc_titech_reception_no_4'); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_drafting_date_4', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_settlement_date_4', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_send_date_4', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_contract_send_date_4', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_contract_reception_date_4', array('empty'=>true)); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>

<h3>契約変更情報(五次)</h3>
<table width="100%" border="0">
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_reception_date_5', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $this->KendbForm->input('cc_titech_reception_no_5'); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_drafting_date_5', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_settlement_date_5', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_notification_send_date_5', array('empty'=>true)); ?></td>
</tr>
<tr>
<td width="20%"><?php echo $datePicker->picker('cc_contract_send_date_5', array('empty'=>true)); ?></td>
<td width="20%"><?php echo $datePicker->picker('cc_contract_reception_date_5', array('empty'=>true)); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
</div>

<div id="tab_other">
<h3>備考</h3>
<table border="0">
<tr>
<td><?php echo $this->KendbForm->input('remarks', array('rows' => 10, 'cols' => 150)); ?></td>
</tr>
</table>

<h3>システムデータ</h3>
<table border="0">
<tr>
<td width="20%"><?php echo $this->Form->input('open_to_public'); ?></td>
<td width="20%"><?php echo $this->Form->input('disabled'); ?></td>
<td width="20%"><?php echo $this->Form->input('hidden'); ?></td>
<td width="20%"><?php echo $this->Form->input('unaggregate'); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
</div>

</div>

<script type="text/javascript">
	$('#tab_parent').tabs();
</script>

<?php echo $this->element("form_tips"); ?>

<?php echo $javascript->link('nedo_jst_other'); ?>

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
</script>



