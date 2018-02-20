<div id="r_search_result" title="教員の選択" style="display : none;">&nbsp;</div>

<input type="hidden" name="rtn" value="<?php echo $rtn; ?>">

<div id="tab_parent">
<ul>
<li><a href="#tab_project">プロジェクト</a></li>
<li><a href="#tab_ukeire">受入手続</a></li>
<li><a href="#tab_haibun">配分額変更手続</a></li>
<li><a href="#tab_houkoku">報告手続</a></li>
<li><a href="#tab_renraku">担当連絡先等</a></li>
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
	<td><?php echo $this->KendbForm->input('representative_affiliation'); ?></td>
	<td><?php echo $this->KendbForm->input('representative_department'); ?></td>
	<td><?php echo $this->KendbForm->input('representative_job_type'); ?></td>
	<td><?php echo $this->KendbForm->input('representative_name'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
	<td><?php echo $this->KendbForm->input('personal_no'); ?></td>
	<td><?php echo $this->KendbForm->input('co_researcher_no'); ?></td>
	</tr>

<tr>
	<td><?php echo $this->KendbForm->input('institute_code'); ?></td>
	<td><?php echo $this->KendbForm->input('school_code'); ?></td>
	<td><?php echo $this->KendbForm->input('course_code'); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<tr class="old_item_row">
	<td><?php echo $this->KendbForm->input('co_researcher_department', array('class' => 'old_org')); ?></td> <!--  -->
	<td><?php echo $this->KendbForm->input('co_researcher_major_name', array('class' => 'old_org')); ?></td> <!--  -->
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

	<tr>
	<td><?php echo $this->KendbForm->input('co_researcher_job_type'); ?></td>
	<td><?php echo $this->KendbForm->input('department_no'); ?></td>
	<td><?php echo $this->KendbForm->input('co_researcher_name'); ?><input type="button" id="r_search" value="検索" /></td>
	<td><?php echo $this->KendbForm->input('post_no'); ?></td>
	<td><?php echo $this->KendbForm->input('extension'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('fax'); ?></td>
	<td><?php echo $this->KendbForm->input('email'); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('moving_history', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('research_type'); ?></td>
	<td><?php echo $this->KendbForm->input('title_no'); ?></td>
	<td><?php echo $this->KendbForm->input('titech_assignment_no'); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('project'); ?></td>
	<td><?php echo $this->KendbForm->input('primary_cost', array('class' => 'autocalc autocalcresult')); ?></td>
	<td><?php echo $this->KendbForm->input('detail_good_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('detail_trip_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('detail_reward_cost', array('class' => 'autocalc')); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('detail_other', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('indirect_cost', array('class' => 'autocalc')); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('is_distributed_amount_change'); ?></td>
	<td><?php echo $this->KendbForm->input('distributed_amount_change', array('class' => 'autocalc autocalcresult')); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('change_detail_good_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('change_detail_trip_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('change_detail_reward_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('change_detail_other', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('change_indirect_cost', array('class' => 'autocalc')); ?></td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_distributed_change', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>
</div>

<div id="tab_ukeire">
<h3>受入手続</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $datePicker->picker('contribution_repartition_official_letter', array('empty' => true)); ?></td>
	<td><?php echo $this->KendbForm->input('detail_cost_check'); ?></td>
	<td><?php echo $datePicker->picker('recept_commission_request_date', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('recept_commission_recept_date', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('request_transfer', array('empty' => true)); ?></td>
	</tr>
	<tr>
	<td><?php echo $datePicker->picker('representative_organization_send', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('payment_date', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('recovery_date', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('payment_confirmed_date', array('empty' => true)); ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $datePicker->picker('research_plan_contact', array('empty' => true)); ?></td>
	</tr>
</table>
</div>

<div id="tab_haibun">
<h3>配分額変更手続</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $datePicker->picker('contribution_repartition_official_letter_distributed_change', array('empty' => true)); ?></td>
	<td><?php echo $this->KendbForm->input('detail_cost_check_amount_change'); ?></td>
	<td><?php echo $datePicker->picker('recept_commission_request_date_distributed_change', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('recept_commission_recept_date_distributed_change', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('request_transfer_distributed_change', array('empty' => true)); ?></td>
	</tr>
	<tr>
	<td><?php echo $datePicker->picker('representative_organization_send_distributed_change', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('payment_date_distributed_change', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('recovery_date_distributed_change', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('payment_confirmed_date_distributed_change', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('research_plan_contact_distributed_change', array('empty' => true)); ?></td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_distributed_change_process', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>
</div>

<div id="tab_houkoku">
<h3>報告手続</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $datePicker->picker('exhibit_overdue', array('empty' => true)); ?></td>
	<td><?php echo $datePicker->picker('exhibit_induction_date', array('empty' => true)); ?></td>
	<td><?php echo $this->KendbForm->input('real_primary_cost', array('class' => 'autocalc autocalcresult')); ?></td>
	<td><?php echo $this->KendbForm->input('expense_detail_goods_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('expense_detail_trip_cost', array('class' => 'autocalc')); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('expense_detail_reward_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('expense_detail_other', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('real_indirect_cost', array('class' => 'autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('turnback_payment_amount', array('class' => 'autocalcresult autocalc')); ?></td>
	<td><?php echo $this->KendbForm->input('turnback_indirect_amount', array('class' => 'autocalcresult autocalc')); ?></td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_report', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>
</div>

<div id="tab_renraku">
<h3>担当連絡先等</h3>
<table width="100%" border="0">
	<tr>
	<td><?php echo $this->KendbForm->input('represent_postal_no'); ?></td>
	<td><?php echo $this->KendbForm->input('address'); ?></td>
	<td><?php echo $this->KendbForm->input('research_institute_name'); ?></td>
	<td><?php echo $this->KendbForm->input('office_in_charge'); ?></td>
	<td><?php echo $this->KendbForm->input('person_in_charge'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('tel_in_charge'); ?></td>
	<td><?php echo $this->KendbForm->input('fax_in_charge'); ?></td>
	<td><?php echo $this->KendbForm->input('email_in_charge'); ?></td>
	<td><?php echo $this->KendbForm->input('other_contact_in_charge'); ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="5"><?php echo $this->KendbForm->input('remarks_other', array('rows' => 10, 'cols' => 120)); ?></td>
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
		var rname = $('#AssessedContributionCoResearcherName').val();
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

