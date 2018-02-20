<div id="r_search_result" title="教員の選択" style="display : none;">&nbsp;</div>

<input type="hidden" name="rtn" value="<?php echo $rtn; ?>">

<div id="tab_parent">
<ul>
<li><a href="#tab_project">プロジェクト</a></li>
<li><a href="#tab_kouhu">交付申請</a></li>
<li><a href="#tab_jisseki">実績報告</a></li>
<li><a href="#tab_kurikoshi">繰越</a></li>
<li><a href="#tab_kakutei">額の確定・返還</a></li>
<li><a href="#tab_hyoka">自己評価・成果</a></li>
<li><a href="#tab_other">連絡先・その他</a></li>
<li><a href="#tab_system">システム</a></li>
</ul>

<div style="float:right;margin-bottom:-30px;">
<input type="button" name="recalc" id="recalc" value="再計算" />
</div>

<div id="tab_project">
<h3>プロジェクト</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $this->KendbForm->nendoPullDown('year'); ?></td>
	<td><?php echo $this->KendbForm->input('type_no'); ?></td>
	<td><?php echo $this->KendbForm->input('grant_delivery_institute'); ?></td>
	<td><?php echo $datePicker->picker('appointment_date', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('decision_date', array('empty' => true)); ?></td>
	</tr>
	<tr>
	<td><?php echo $datePicker->picker('payment_date', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('advance_application_reception_date', array('empty' => true)); ?></td>
	<td><?php echo $this->KendbForm->input('move_out_in_etc'); ?></td>
	<td><?php echo $this->KendbForm->input('research_type'); ?></td>
	<td><?php echo $this->KendbForm->input('screening'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('end_before_application'); ?></td>
	<td><?php echo $this->KendbForm->input('contribution'); ?></td>
	<td><?php echo $this->KendbForm->input('detail_ambit_no'); ?></td>
	<td><?php echo $this->KendbForm->input('division_a_b'); ?></td>
	<td><?php echo $this->KendbForm->input('research_number_points'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('arrange_no'); ?></td>
	<td><?php echo $this->KendbForm->input('problem_no'); ?></td>
	<td><?php echo $this->KendbForm->input('new_or_continuance', array('type' => 'select', 'options' => array('' => '', '新規' => '新規', '継続' => '継続')));?></td>
	<td><?php echo $this->KendbForm->input('name'); ?><input type="button" id="r_search" value="検索" /></td>
	</tr>

	<tr>
	<td><?php echo $this->KendbForm->input('institute_code'); ?></td>
	<td><?php echo $this->KendbForm->input('school_code'); ?></td>
	<td><?php echo $this->KendbForm->input('course_code'); ?></td>
	<td><?php echo $this->KendbForm->input('application_job'); ?></td>
	<td><?php echo $this->KendbForm->input('current_job_title'); ?></td>
	</tr>

	<tr class="old_item_row">
		<td><?php echo $this->KendbForm->input('notifying_department', array('class' => 'old_org')); ?></td>
		<td><?php echo $this->KendbForm->input('statistical_department', array('class' => 'old_org')); ?></td>
		<td><?php echo $this->KendbForm->input('department', array('class' => 'old_org')); ?></td>
		<td><?php echo $this->KendbForm->input('major_name', array('class' => 'old_org')); ?></td>
		<td>&nbsp;</td>
	</tr>

	<tr>
	<td><?php echo $this->KendbForm->input('statistical_job'); ?></td>
	<td><?php echo $this->KendbForm->input('this_year_application_amount'); ?></td>
	<td><?php echo $this->KendbForm->input('current_payment_sum_appointment', array('class' => 'autocalc autocalcresult')); ?></td>
	<td><?php echo $this->KendbForm->input('current_payment_d_appointment', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('current_payment_i_appointment', array('class' => 'autocalc')); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('next1_payment_d_appointment'); ?></td>
	<td><?php echo $this->KendbForm->input('next2_payment_d_appointment'); ?></td>
	<td><?php echo $this->KendbForm->input('next3_payment_d_appointment'); ?></td>
	<td><?php echo $this->KendbForm->input('next4_payment_d_appointment'); ?></td>
	<td><?php echo $this->KendbForm->input('next5_payment_d_appointment'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('current_payment_sum', array('class' => 'autocalc autocalcresult', 'label' => '本年度合計')); ?></td>
	<td><?php echo $this->KendbForm->input('current_payment_d', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('current_payment_i', array('class' => 'autocalc')); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('next1_payment_d'); ?></td>
	<td><?php echo $this->KendbForm->input('next2_payment_d'); ?></td>
	<td><?php echo $this->KendbForm->input('next3_payment_d'); ?></td>
	<td><?php echo $this->KendbForm->input('next4_payment_d'); ?></td>
	<td><?php echo $this->KendbForm->input('next5_payment_d'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('researcher_no'); ?></td>
	<td colspan="3"><?php echo $this->KendbForm->input('researcher_assignment', array('style' => 'width:600px;')); ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks1', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>
</div>

<div id="tab_kouhu">
<h3>交付申請</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $datePicker->picker('grant_reception_date', array('empty' => true)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('total_primary_cost', array('class' => 'autocalc autocalcresult')); ?></td>
	<td><?php echo $this->KendbForm->input('detail_goods_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('detail_travel_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('detail_gratuity_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('detail_other_cost', array('class' => 'autocalc')); ?></td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_issue_application', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('contribution_count'); ?></td>
	<td><?php echo $this->KendbForm->input('contribution_amount'); ?></td>
	<td><?php echo $this->KendbForm->input('contribution_partition', array('label' => '分配金実配分額')); ?></td>
	<td><?php echo $this->KendbForm->input('adjudicator'); ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('contribution_remarks', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>
</div>

<div id="tab_jisseki">
<h3>実績報告</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $datePicker->picker('achievement_report_reception_date', array('empty'=>true, 'label' => '実績報告書受付日')); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('achievement_primary_cost', array('class' => 'autocalc autocalcresult')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_detail_goods_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_detail_travel_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_detail_gratuity_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_detail_other_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_indirect_cost'); ?></td>
	</tr>
	<tr>
	<td colspan="6"><?php echo $this->KendbForm->input('achievement_remarks', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>
</div>

<div id="tab_kurikoshi">
<h3>繰越</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $datePicker->picker('achievement_carried_report_reception_date', array('empty'=> true)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('achievement_carried_primary_cost', array('class' => 'autocalc autocalcresult')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_carried_detail_goods_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_carried_detail_travel_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_carried_detail_gratuity_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_carried_detail_other_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('achievement_carried_indirect_cost'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('carried_titech_assignment_no'); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('carried_primary_cost', array('class' => 'autocalc autocalcresult')); ?></td>
	<td><?php echo $this->KendbForm->input('carried_detail_goods_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('carried_detail_travel_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('carried_detail_gratuity_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('carried_detail_other_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('carried_indirect_cost'); ?></td>
	</tr>
	<tr>
	<td colspan="6"><?php echo $this->KendbForm->input('process_carried_remarks', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>
</div>

<div id="tab_kakutei">
<h3>額の確定・返還</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $this->KendbForm->input('fixed_amount', array('class' => 'autocalc autocalcresult')); ?></td>
	<td><?php echo $this->KendbForm->input('fixed_amount_primary_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('fixed_amount_indirect_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('turnback_amount', array('class' => 'autocalc autocalcresult')); ?></td>
	<td><?php echo $this->KendbForm->input('turnback_amount_primary_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('turnback_amount_indirect_cost', array('class' => 'autocalc')); ?></td>
	</tr>
	<tr>
	<td colspan="6"><?php echo $this->KendbForm->input('turnback_amount_remarks', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>
</div>

<div id="tab_hyoka">
<h3>自己評価・成果</h3>
<table width="100%" border="0">
	<tr>
		<td><?php echo $this->KendbForm->input('self_assessment_person'); ?></td>
		<td><?php echo $datePicker->picker('self_assessment_date', array('empty'=> true)); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5"><?php echo $this->KendbForm->input('self_assessment_remarks', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('accomplishment_object_person'); ?></td>
		<td><?php echo $datePicker->picker('accomplishment_date', array('empty'=>true)); ?></td>
		<td><?php echo $datePicker->picker('process_date', array('empty'=>true)); ?></td>
		<td><?php echo $datePicker->picker('accomplishment_scheduled_date', array('empty'=>true)); ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5"><?php echo $this->KendbForm->input('accomplishment_remarks', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>
</div>

<div id="tab_other">
<h3>連絡先・その他</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $this->KendbForm->input('extension'); ?></td>
	<td><?php echo $this->KendbForm->input('fax'); ?></td>
	<td><?php echo $this->KendbForm->input('post_no'); ?></td>
	<td><?php echo $this->KendbForm->input('email'); ?></td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('special_mention', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
	<td><?php echo $this->KendbForm->input('personal_no'); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
</table>
</div>


<div id="tab_system">
<h3>システムデータ</h3>
<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->Form->input('open_to_public'); ?></td>
		<td width="20%"><?php echo $this->Form->input('disabled'); ?></td>
		<td width="20%"><?php echo $this->Form->input('hidden'); ?></td>
		<td width="20%"><?php echo $this->Form->input('unaggregate'); ?></td>
		<td width="40%">&nbsp;</td>
	</tr>
</table>
</div>


</div>



<?php echo $this->element("form_tips"); ?>

<script type="text/javascript">
	$('#tab_parent').tabs();
</script>

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

</script>
