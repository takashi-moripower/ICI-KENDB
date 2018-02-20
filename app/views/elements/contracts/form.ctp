<div id="r_search_result" title="教員の選択" style="display : none;">&nbsp;</div>

<input type="hidden" name="rtn" value="<?php echo $rtn; ?>">

<h3>基本情報</h3>
<table width="100%" border="0">
<tr>
	<td width="20%"><?php echo $this->KendbForm->nendoPullDown('year'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('researcher_no'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('project_code'); ?></td>
	<td width="20%"><?php echo $this->KendbForm->input('assignment_no'); ?></td>
</tr>
<tr>
	<td width="20%"><?php echo $this->KendbForm->input('funds_institute'); ?></td>
	<td colspan="4" width="80%"><?php echo $this->KendbForm->input('project_name', array('style' => 'width:600px;')); ?></td>
</tr>
<tr>
	<td colspan="3" width="60%"><?php echo $this->KendbForm->input('project_assignment_name', array('style'=>'width:600px;')); ?></td>
	<td width="20%"><?php echo $datePicker->picker('project_start_year', array('empty'=>true)); ?></td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td width="20%"><?php echo $datePicker->picker('initial_start_date', array('empty'=>true)); ?></td>
	<td width="20%"><?php echo $datePicker->picker('initial_end_date', array('empty'=>true)); ?></td>
	<td width="20%"><?php echo $datePicker->picker('this_year_start_date', array('empty'=>true)); ?></td>
	<td width="20%"><?php echo $datePicker->picker('this_year_end_date', array('empty'=>true)); ?></td>
	<td width="20%">&nbsp;</td>
</tr>
</table>
<br clear="all" />
<div id="tab_parent">
<ul>
<li><a href="#tab_jigyou">事業情報内容</a></li>
<li><a href="#tab_seikyu">請求・入金情報</a></li>
<li><a href="#tab_other">備考・その他</a></li>
</ul>
<div style="float:right;margin-bottom:-30px;">
<input type="button" name="recalc" id="recalc" value="再計算" />
</div>

<div id="tab_jigyou">
<h3>事業情報内容</h3>
<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('new_or_continuance', array('type' => 'select', 'options' => array('' => '', '新規' => '新規', '継続' => '継続'))); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('represent_researcher_name'); ?><input type="button" id="r_search" value="検索" /></td>
		<td width="20%"><?php echo $this->KendbForm->input('job_title'); ?></td>
		<td width="20%">&nbsp;</td>
		<td width="20%">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('institute_code'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('school_code'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('course_code'); ?></td>
		<td width="20%">&nbsp;</td>
		<td width="20%">&nbsp;</td>
	</tr>

	<tr class="old_item_row">
		<td width="20%"><?php echo $this->KendbForm->input('department', array('class' => 'old_org')); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('major_name', array('class' => 'old_org')); ?></td>
		<td width="20%">&nbsp;</td>
		<td width="20%">&nbsp;</td>
		<td width="20%">&nbsp;</td>
	</tr>

	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('singular_or_multi', array('type' => 'select', 'options' => array('' => '', '単' => '単', '複' => '複'))); ?></td>
		<td width="20%"><?php echo $datePicker->picker('contract_date', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('contract_amount'); ?></td>
		<td width="20%">&nbsp;</td>
		<td width="20%">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('this_year_reception_amount', array('class' => 'autocalc autocalcresult')); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('primary_cost', array('class' => 'autocalc')); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('common_cost', array('class' => 'autocalc')); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('indirect_cost', array('class' => 'autocalc')); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('general_administration_cost', array('class' => 'autocalc')); ?></td>
	</tr>
</table>
</div>

<div id="tab_seikyu">
<h3>請求・入金情報</h3>
<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('billing_type', array('type' => 'select', 'options' => array('' => '', '精算' => '精算', '概算' => '概算'))); ?></td>
		<td width="20%">&nbsp;</td>
		<td width="20%">&nbsp;</td>
		<td width="20%">&nbsp;</td>
		<td width="20%">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><?php echo $datePicker->picker('billing_date_1', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_due_1', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_date_1', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('credit_1'); ?></td>
		<td width="20%">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><?php echo $datePicker->picker('billing_date_2', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_due_2', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_date_2', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('credit_2'); ?></td>
		<td width="20%">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><?php echo $datePicker->picker('billing_date_3', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_due_3', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_date_3', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('credit_3'); ?></td>
		<td width="20%">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><?php echo $datePicker->picker('billing_date_4', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_due_4', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_date_4', array('empty'=>true)); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('credit_4'); ?></td>
		<td width="20%">&nbsp;</td>
	</tr>
</table>
</div>

<div id="tab_other">
<h3>備考</h3>
<table width="100%" border="0">
	<tr>
		<td width="100%"><?php echo $this->KendbForm->input('remarks1', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
	<tr>
		<td width="100%"><?php echo $this->KendbForm->input('remarks2', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
	<tr>
		<td width="100%"><?php echo $this->KendbForm->input('remarks3', array('rows' => 10, 'cols' => 120)); ?></td>
	</tr>
</table>

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
		var rname = $('#ContractRepresentResearcherName').val();
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

