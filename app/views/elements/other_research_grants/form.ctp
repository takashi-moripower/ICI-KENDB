<input type="hidden" name="rtn" value="<?php echo $rtn; ?>">

<div id="tab_parent">
<ul>
<li><a href="#tab_project">プロジェクトデータ</a></li>
<li><a href="#tab_other">その他データ</a></li>
</ul>

<div style="float:right;margin-bottom:-30px;">
<input type="button" name="recalc" id="recalc" value="再計算" />
</div>

<div id="tab_project">
<div id="r_search_result" title="教員の選択" style="display : none;">&nbsp;</div>

<h3>プロジェクトデータ</h3>
<table width="100%" border="0">
<tr>
<td><?php echo $this->KendbForm->nendoPullDown('year'); ?></td>
<td><?php echo $datePicker->picker('grant_initial_appointment_date', array('empty'=>true)); ?></td>
<td><?php echo $datePicker->picker('grant_initial_decision_date', array('empty'=>true)); ?></td>
<td><?php echo $datePicker->picker('payment_date', array('empty'=>true)); ?></td>
<td><?php echo $datePicker->picker('paying_for_day', array('empty'=>true)); ?></td>
</tr>
<tr>
<td><?php echo $this->KendbForm->input('moving_history'); ?></td>
<td><?php echo $this->KendbForm->input('business_name'); ?></td>
<td><?php echo $this->KendbForm->input('titech_assignment_no'); ?></td>
<td><?php echo $this->KendbForm->input('assignment_no'); ?></td>
<td><?php echo $this->KendbForm->input('new_or_continuance', array('type' => 'select', 'options' => array('' => '', '新規' => '新規', '継続' => '継続')));?></td>
</tr>
<tr>
<td><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
<td><?php echo $this->KendbForm->input('personal_no'); ?></td>
<td><?php echo $this->KendbForm->input('researcher_no'); ?></td>
<td><?php echo $this->KendbForm->input('name'); ?><input type="button" id="r_search" value="検索" /></td>
<td><?php echo $this->KendbForm->input('represent_researcher'); ?></td>
</tr>
<tr>
<td><?php echo $this->KendbForm->input('institute_code'); ?></td>
<td><?php echo $this->KendbForm->input('school_code'); ?></td>
<td><?php echo $this->KendbForm->input('course_code'); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td><?php echo $this->KendbForm->input('statistical_job'); ?></td>
<td><?php echo $this->KendbForm->input('notifying_department', array('class' => 'old_org')); ?></td>
<td><?php echo $this->KendbForm->input('statistical_department', array('class' => 'old_org')); ?></td>
<td><?php echo $this->KendbForm->input('affiliated_major_name', array('class' => 'old_org')); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><?php echo $this->KendbForm->input('this_year_application_amount'); ?></td>
<td><?php echo $this->KendbForm->input('this_year_total_at_decision'); ?></td>
<td><?php echo $this->KendbForm->input('this_year_direct_at_decision'); ?></td>
<td><?php echo $this->KendbForm->input('this_year_indirect_at_decision'); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><?php echo $this->KendbForm->input('this_year_application_amount_sum', array('class' => 'autocalc autocalcresult')); ?></td>
<td><?php echo $this->KendbForm->input('this_year_direct_cost', array('class' => 'autocalc')); ?></td>
<td><?php echo $this->KendbForm->input('this_year_indirect_cost', array('class' => 'autocalc')); ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><?php echo $this->KendbForm->input('research_assignment'); ?></td>
<td><?php echo $this->KendbForm->input('contribution_count'); ?></td>
<td><?php echo $this->KendbForm->input('contribution_partition'); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="5"><?php echo $this->KendbForm->input('contribution_remarks', array('rows' => 10, 'cols' => 120)); ?></td>
</tr>
<tr>
<td><?php echo $datePicker->picker('research_start_date', array('empty'=>true)); ?></td>
<td><?php echo $datePicker->picker('research_end_date', array('empty'=>true)); ?></td>
<td><?php echo $this->KendbForm->nendoPullDown('project_start_year'); ?></td>
<td><?php echo $this->KendbForm->nendoPullDown('project_end_year'); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="5"><?php echo $this->KendbForm->input('remarks', array('rows' => 10, 'cols' => 120)); ?></td>
</tr>
<tr>
<td><?php echo $this->KendbForm->input('extension'); ?></td>
<td><?php echo $this->KendbForm->input('fax'); ?></td>
<td><?php echo $this->KendbForm->input('post_no'); ?></td>
<td><?php echo $this->KendbForm->input('email'); ?></td>
<td>&nbsp;</td>
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
		<td width="20%"><?php echo $this->KendbForm->input('unaggregate'); ?></td>
		<td width="40%">&nbsp;</td>
	</tr>
</table>
</div>
</div>

<script type="text/javascript">
	$('#tab_parent').tabs();
</script>

<?php echo $this->element("form_tips"); ?>

<?php echo $javascript->link('other_research_grant'); ?>


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
		var rname = $('#OtherResearchGrantName').val();
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


