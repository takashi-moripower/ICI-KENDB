<div id="r_search_result" title="教員の選択" style="display : none;">&nbsp;</div>

<input type="hidden" name="rtn" value="<?php echo $rtn; ?>">

<div id="tab_parent">
<ul>
<li><a href="#tab_project">プロジェクト</a></li>
<li><a href="#tab_kouhu">交付申請等</a></li>
<li><a href="#tab_jisseki">実績報告</a></li>
<li><a href="#tab_kurikoshi">繰越</a></li>
<li><a href="#tab_henkan">返還・確定</a></li>
<li><a href="#tab_renraku">連絡先</a></li>
<li><a href="#tab_other">その他データ</a></li>
</ul>

<div style="float:right;margin-bottom:-30px;">
<input type="button" name="recalc" id="recalc" value="再計算" />
</div>

<?php $encourage = new Encourage(); ?>

<div id="tab_project">
<h3>プロジェクトデータ</h3>
<table width="100%" border="0">
<tr>
		<td width="20%"><?php echo $this->KendbForm->nendoPullDown('year'); ?></td>
		<td width="20%"><?php echo $datePicker->picker('appointment_date', array('empty' => true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('decision_date', array('empty' => true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_date', array('empty' => true)); ?></td>
		<td width="20%">&nbsp;</td>
</tr>
<tr>
		<td colspan="5"><?php echo $this->KendbForm->input('moving_history', array('label' => $encourage->output_column_label_alias['moving_history'], 'rows' => 10, 'cols' => 120)); ?></td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('domestic_or_not', array('type' => 'select', 'options' => array('' => '', '国' => '国', '外' => '外'))); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('classification'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('new_or_continuance', array('type' => 'select', 'options' => array('' => '', '新' => '新', '継' => '継'))); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('sex', array('type' => 'select', 'options' => array('' => '', '1' => '男', '2' => '女'))); ?></td>
	<td width="20%"><?php echo $this->KendbForm->warekiPullDown('recruiting_year'); ?></td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('reception_no'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('assignment_no'); ?></td>
	<td width="20%"><?php echo $datePicker->picker('this_year_advance_application_date', array('empty' => true, 'label' => $encourage->output_column_label_alias['this_year_advance_application_date'])); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('qualification_and_others', array('type' => 'select', 'options' => array('' => '', 'DC1' => 'DC1', 'DC2' => 'DC2', 'PD'=>'PD', 'SPD'=>'SPD', 'RPD'=>'RPD'))); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('ambit'); ?></td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('represent_researcher_name'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('personal_no'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('researcher_no'); ?></td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('facility_teacher', array('label' => '受入研究者')); ?><input type="button" id="r_search" value="検索" /></td>
	<td width="20%"><?php echo $this->KendbForm->input('foreigner_researcher'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('appointment_department'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('appointment_job_title'); ?></td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('institute_code'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('school_code'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('course_code'); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>

<tr>
	<td width="20%"><?php echo $this->KendbForm->input('job_title', array('label' => $encourage->output_column_label_alias['job_title'])); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('matriculation_number'); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>

<tr class="old_item_row">
	<td width="20%"><?php echo $this->KendbForm->input('department_represent_researcher', array('class' => 'old_org')); ?></td> <!--  -->
	<td width="20%"><?php echo $this->KendbForm->input('statistical_department', array('class' => 'old_org')); ?></td> <!--  -->
	<td width="20%"><?php echo $this->KendbForm->input('major', array('class' => 'old_org')); ?></td> <!-- -->
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>

<tr>
	<td width="20%"><?php echo $datePicker->picker('recruit_start_date', array('empty' => true)); ?></td>
	<td width="20%"><?php echo $datePicker->picker('recruit_end_date', array('empty' => true)); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('number_of_month'); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_change', array('rows' => 10, 'cols' => 120)); ?></td>
</tr>
<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_qualification', array('rows' => 10, 'cols' => 120)); ?></td>
</tr>
<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks', array('rows' => 10, 'cols' => 120)); ?></td>
</tr>
<tr>
	<td width="20%"><?php echo $datePicker->picker('research_plan_reception_date', array('empty' => true)); ?></td>
	<td width="20%"><?php echo $datePicker->picker('confirmation_statement_date', array('empty' => true)); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('this_year_application_amount'); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('this_year_distributed_amount_appointment'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('next_year_distributed_amount_appointment'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('next2_year_distributed_amount_appointment'); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('this_year_distributed_amount'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('next_year_distributed_amount'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('next2_year_distributed_amount'); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('titech_assignment_no'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('research_assignment'); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
</table>
</div>

<div id="tab_kouhu">
<h3>交付申請等</h3>
<table width="100%" border="0">
<tr>
	<td width="20%"><?php echo $datePicker->picker('acceptance_statement', array('empty' => true)); ?></td>
	<td width="20%"><?php echo $datePicker->picker('acceptance_application_reception_date', array('empty' => true)); ?></td>
	<td width="20%"><?php echo $datePicker->picker('issue_application_reception_date', array('empty' => true)); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('total_primary_cost', array('class' => 'autocalc autocalcresult')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('detail_goods_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('detail_travel_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('detail_gratuity_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('detail_other_cost', array('class' => 'autocalc')); ?></td>
</tr>
<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('issue_application_remarks', array('rows' => 10, 'cols' => 120)); ?></td>
</tr>
</table>
</div>

<div id="tab_jisseki">
<h3>実績報告</h3>
<table width="100%" border="0">
<tr>
	<td width="20%"><?php echo $datePicker->picker('achievement_report_reception_date', array('empty' => true)); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_primary_cost', array('class' => 'autocalc autocalcresult')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_detail_goods_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_detail_travel_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_detail_gratuity_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_detail_other_cost', array('class' => 'autocalc')); ?></td>
</tr>
<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('achievement_remarks', array('rows' => 10, 'cols' => 120)); ?></td>
</tr>
</table>
</div>


<div id="tab_kurikoshi">
<h3>繰越</h3>
<table width="100%" border="0">
<tr>
	<td width="20%"><?php echo $datePicker->picker('achievement_carried_report_reception_date', array('empty' => true)); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_carried_primary_cost', array('class' => 'autocalc autocalcresult')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_carried_detail_goods_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_carried_detail_travel_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_carried_detail_gratuity_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('achievement_carried_detail_other_cost', array('class' => 'autocalc')); ?></td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('carried_titech_assignment_no'); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('balance_carried', array('class' => 'autocalc autocalcresult')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('carried_detail_goods_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('carried_detail_travel_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('carried_detail_gratuity_cost', array('class' => 'autocalc')); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('carried_detail_other_cost', array('class' => 'autocalc')); ?></td>
</tr>
<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_carried', array('rows' => 10, 'cols' => 120)); ?></td>
</tr>
</table>
</div>

<div id="tab_henkan">
<h3>返還・確定</h3>
<table width="100%" border="0">
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('fixed_amount', array('label' => $encourage->output_column_label_alias['fixed_amount'])); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('turnback_amount', array('label' => $encourage->output_column_label_alias['turnback_amount'])); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_balance_fixed_turnback', array('rows' => 10, 'cols' => 120)); ?></td>
</tr>
</table>
</div>

<div id="tab_renraku">
<h3>連絡先</h3>
<table width="100%" border="0">
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('extension', array('label' => $encourage->output_column_label_alias['extension'])); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('fax', array('label' => $encourage->output_column_label_alias['fax'])); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('email', array('label' => $encourage->output_column_label_alias['email'])); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('mobile_phone', array('label' => $encourage->output_column_label_alias['mobile_phone'])); ?></td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('post_no', array('label' => $encourage->output_column_label_alias['post_no'])); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('extension_researcher'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('received_researcher_email', array('label' => $encourage->output_column_label_alias['received_researcher_email'])); ?></td>
	<td width="20%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
</tr>
</table>
</div>

<div id="tab_other">
<h3>システムデータ</h3>
<table width="100%" border="0">
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('open_to_public'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('disabled'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('hidden'); ?></td>
	<td width="40%">&nbsp;</td>
</tr>
</table>
</div>

</div>

<script type="text/javascript">
	$('#tab_parent').tabs();
</script>

<?php echo $this->element("form_tips"); ?>

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
		var rname = $('#EncourageFacilityTeacher').val();
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




