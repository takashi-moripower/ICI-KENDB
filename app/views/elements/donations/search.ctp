
	<?php echo $this->KendbForm->create('Donation', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>

	<?php if ($search_param == 3) { ?>
	<h3>カスタム検索</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->input('project_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('contract_obligation_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_name', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => '受入研究者')); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('variety', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
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
	<td><?php echo $this->KendbForm->input('section_in_charge', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('receipt_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="3"><?php echo $this->KendbForm->input('receipt_send_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Receipt Send Date', true))); ?>〜<?php echo $this->KendbForm->input('receipt_send_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('remarks_receipt', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="3"><?php echo $this->KendbForm->input('payment_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Date', true))); ?>〜<?php echo $this->KendbForm->input('payment_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('contract_resolution_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('income_section_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('income_section_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('contract_obligation', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('contract_obligation_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="3"><?php echo $this->KendbForm->input('planned_income_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Planned Income', true))); ?>〜<?php echo $this->KendbForm->input('planned_income_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>

	<tr>
	<!-- TODO: リストから選択 -->
	<td><?php echo $this->KendbForm->input('foreign_money_type', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="3"><?php echo $this->KendbForm->input('planned_income_foreign_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Planned Income Foreign', true))); ?>〜<?php echo $this->KendbForm->input('planned_income_foreign_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="3"><?php echo $this->KendbForm->input('income_yen_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Income Yen', true))); ?>〜<?php echo $this->KendbForm->input('income_yen_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	</tr>

	<tr>
	<td colspan="2"><?php echo $this->KendbForm->input('subsidy_type', array('type' => 'select', 'div' => false, 'options' => array('' => '', '奨学寄附金' => '奨学寄附金', '研究助成金' => '研究助成金'))); ?></td>
	<td><?php echo $this->KendbForm->input('project_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('project_code_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('vouching_remarks', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>

	<tr>
	<td colspan="3"><?php echo $this->KendbForm->input('payment_due_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Due', true))); ?>〜<?php echo $this->KendbForm->input('payment_due_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td colspan="3"><?php echo $this->KendbForm->input('contraction_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Contraction Date', true))); ?>〜<?php echo $this->KendbForm->input('contraction_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('contract_resolution_detail_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="3"><?php echo $this->KendbForm->input('division_count_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Division Count', true))); ?>〜<?php echo $this->KendbForm->input('division_count_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('detail_remarks', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>

	<tr>
	<td><?php echo $this->KendbForm->input('research_promotion_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('contract_resolution_detail_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="2"><?php echo $this->KendbForm->input('research_promotion_year_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Research Promotion Year', true))); ?>〜<?php echo $this->KendbForm->input('research_promotion_year_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('research_promotion_remarks', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('variety', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('remarks', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>

	<tr>
	<td><?php echo $this->KendbForm->input('obligation_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ob_represent_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ob_job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<!-- TODO リスト？ -->
	<td><?php echo $this->KendbForm->input('common_cost_check', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td colspan="2"><?php echo $this->KendbForm->input('common_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Common Cost', true))); ?>〜<?php echo $this->KendbForm->input('common_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('ob_postal_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ob_address', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ob_section', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('ob_person_in_charge', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>

	<tr valign="top">
	<td><?php echo $this->KendbForm->input('researcher_name', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => '受入研究者')); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('major_name', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => '専攻名（受入研究者）')); ?></td>
	<td><?php echo $this->KendbForm->input('institute_code', array('type' => 'text', 'div' => false, 'size' => 100, 'label' => '院コード')); ?></td>
	<td><?php echo $this->KendbForm->input('school_code', array('type' => 'text', 'div' => false, 'size' => 100, 'label' => '系コード')); ?></td>
	<td><?php echo $this->KendbForm->input('course_code', array('type' => 'text', 'div' => false, 'size' => 100, 'label' => 'コースコード')); ?></td>
	<td><?php echo $this->KendbForm->input('job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('extension', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('email', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('post_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cooperate_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('personal_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 2) { ?>
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

function set_rinfo(id) {
	$.get("/researchers/getJsonById/"+id, function(data) {
		var researcher = jQuery.parseJSON(data);
		$("#DonationResearcherName").val(researcher.researcher_name);
		$('#r_search_result').dialog('close');
	});
}
</script>
