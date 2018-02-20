
<div id="r_search_result" title="教員の選択" style="display : none;">&nbsp;</div>

<div id="tab_parent">
<ul>
<li><a href="#tab_project">プロジェクトデータ</a></li>
<li><a href="#tab_other">その他データ</a></li>
</ul>

<input type="hidden" name="rtn" value="<?php echo $rtn; ?>">

<div id="tab_project">
<h3>プロジェクトデータ</h3>

<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->KendbForm->nendoPullDown('year'); ?></td>
			<?php
			// 現在の選択肢をプルダウンに追加する
			$section_in_charge[$this->Form->value('section_in_charge')] = $this->Form->value('section_in_charge');
			?>

		<td width="20%"><?php echo $this->KendbForm->input('section_in_charge', array('type' => 'select', 'options' => $section_in_charge)); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('receipt_no'); ?></td>
		<td width="20%"><?php echo $datePicker->picker('receipt_send_date', array('empty'=>true));?></td>
		<td width="20%"></td>
	</tr>
</table>

<table width="100%" border="0">
<tr>
		<td><?php echo $this->KendbForm->input('remarks_receipt', array('rows' => 10, 'cols' => '120')); ?></td>
</tr>
</table>

<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $datePicker->picker('payment_date', array('empty'=>true));?></td>
		<td width="20%"><?php echo $this->KendbForm->input('contract_resolution_no'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('income_section_code'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('income_section_name'); ?></td>
		<td width="20%"></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('contract_obligation'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('contract_obligation_name'); ?></td>
		<td width="20%"></td>
		<td width="20%"></td>
		<td width="20%"></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('planned_income'); ?></td>
		<?php
			// 現在の選択肢をプルダウンに追加する
			$foreign_money_type[$this->Form->value('foreign_money_type')] = $this->Form->value('foreign_money_type');
		?>
		<td width="20%"><?php echo $this->Form->input('foreign_money_type', array('type' => 'select', 'options' => $foreign_money_type));?></td>
		<td width="20%"><?php echo $this->KendbForm->input('planned_income_foreign'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('income_yen'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('subsidy_type', array('type' => 'select', 'options' => array(''=>'','奨学寄附金'=>'奨学寄附金','研究助成金'=>'研究助成金'))); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('project_code'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('project_code_name'); ?></td>
		<td width="20%"></td>
		<td width="20%"></td>
		<td width="20%"></td>
	</tr>
	<tr>
		<td colspan="5"><?php echo $this->KendbForm->input('vouching_remarks', array('rows' => 10, 'cols' => '120')); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $datePicker->picker('payment_due', array('empty'=>true));?></td>
		<td width="20%"><?php echo $datePicker->picker('contraction_date', array('empty'=>true));?></td>
		<td width="20%"><?php echo $this->KendbForm->input('contract_resolution_detail_no'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('division_count'); ?></td>
		<td width="20%"></td>
	</tr>
	<tr>
		<td colspan="5"><?php echo $this->KendbForm->input('detail_remarks', array('rows' => 10, 'cols' => '120')); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('research_promotion_name'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->nendoPullDown('research_promotion_year'); ?></td>
		<td width="20%"></td>
		<td width="20%"></td>
		<td width="20%"></td>
	</tr>
	<tr>
		<td colspan="5"><?php echo $this->KendbForm->input('research_promotion_remarks', array('rows' => 10, 'cols' => '120')); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('variety'); ?></td>
		<td width="20%"></td>
		<td width="20%"></td>
		<td width="20%"></td>
		<td width="20%"></td>
	</tr>
	<tr>
		<td colspan="5"><?php echo $this->KendbForm->input('remarks', array('rows' => 10, 'cols' => '120')); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('obligation_name'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('ob_represent_name'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('ob_job_title'); ?></td>
		<?php
			// 現在の選択肢をプルダウンに追加する
			$common_cost_check[$this->Form->value('common_cost_check')] = $this->Form->value('common_cost_check');
		?>
		<td width="20%"><?php echo $this->Form->input('common_cost_check', array('type' => 'select', 'options' => $common_cost_check));?></td>
		<td width="20%"><?php echo $this->KendbForm->input('common_cost'); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('ob_postal_code'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('ob_address'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('ob_section'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('ob_person_in_charge'); ?></td>
		<td width="20%"></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('institute_code');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('school_code'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('course_code'); ?></td>
		<td width="20%"></td>
		<td width="20%"></td>
	</tr>

	<tr class="old_item_row">
		<td width="20%"><?php echo $this->KendbForm->input('major_name', array('label'=>'専攻名（受入研究者）','class'=>'old_org')); ?></td>
		<td width="20%"></td>
		<td width="20%"></td>
		<td width="20%"></td>
		<td width="20%"></td>
	</tr>

	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('job_title'); ?></td>
				<td width="20%"><?php echo $this->KendbForm->input('extension'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('email'); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('post_no'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('researcher_no'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('personal_no'); ?></td>
		<td width="20%"></td>
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
		var rname = $('#DonationResearcherName').val();
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



