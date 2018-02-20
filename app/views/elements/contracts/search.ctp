
	<?php echo $this->KendbForm->create('Contract', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>
	<?php if ($search_param == 0 || $search_param == 1) { ?>
	<h3>基本情報</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('id', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->input('cooperate_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('project_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('assignment_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('funds_institute', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('project_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('project_assignment_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('project_start_year_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Project Start Year', true))); ?>
〜<?php echo $this->KendbForm->input('project_start_year_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('initial_start_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Initial Start Date', true))); ?>
〜<?php echo $this->KendbForm->input('initial_start_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('initial_end_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Initial End Date', true))); ?>
〜<?php echo $this->KendbForm->input('initial_end_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('this_year_start_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('This Year Start Date', true))); ?>
〜<?php echo $this->KendbForm->input('this_year_start_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('this_year_end_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('This Year End Date', true))); ?>
〜<?php echo $this->KendbForm->input('this_year_end_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 2) { ?>
	<h3>事業情報内容</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->input('new_or_continuance', array('type' => 'select', 'div' => false, 'options' => array('' => '', '新規' => '新規', '継続' => '継続'))); ?></td>
	<td><?php echo $this->KendbForm->input('represent_researcher_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('department', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('major_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('institute_code', array('type' => 'text', 'div' => false, 'size' => 100)); ?></td>
	<td><?php echo $this->KendbForm->input('school_code', array('type' => 'text', 'div' => false, 'size' => 100)); ?></td>
	<td><?php echo $this->KendbForm->input('course_code', array('type' => 'text', 'div' => false, 'size' => 100)); ?></td>
	<td><?php echo $this->Form->input('singular_or_multi', array('type' => 'select', 'div' => false, 'options' => array('' => '', '単' => '単', '複' => '複'))); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contract_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Contract Date', true))); ?>
〜<?php echo $this->KendbForm->input('contract_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('contract_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Contract Amount', true))); ?>
〜<?php echo $this->KendbForm->input('contract_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('this_year_reception_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('This Year Reception Amount', true))); ?>
〜<?php echo $this->KendbForm->input('this_year_reception_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('primary_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Primary Cost', true))); ?>
〜<?php echo $this->KendbForm->input('primary_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('common_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Common Cost', true))); ?>
〜<?php echo $this->KendbForm->input('common_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('indirect_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Indirect Cost', true))); ?>
〜<?php echo $this->KendbForm->input('indirect_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('general_administration_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('General Administration Cost', true))); ?>
〜<?php echo $this->KendbForm->input('general_administration_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 3) { ?>
	<h3>請求・入金情報</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('billing_type', array('type' => 'select', 'options' => array('' => '', '精算' => '精算', '概算' => '概算'))); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('billing_date_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Billing Date 1', true))); ?>
〜<?php echo $this->KendbForm->input('billing_date_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_due_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Due 1', true))); ?>
〜<?php echo $this->KendbForm->input('payment_due_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_date_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Date 1', true))); ?>
〜<?php echo $this->KendbForm->input('payment_date_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('credit_1_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Credit 1', true))); ?>
〜<?php echo $this->KendbForm->input('credit_1_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('billing_date_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Billing Date 2', true))); ?>
〜<?php echo $this->KendbForm->input('billing_date_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_due_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Due 2', true))); ?>
〜<?php echo $this->KendbForm->input('payment_due_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_date_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Date 2', true))); ?>
〜<?php echo $this->KendbForm->input('payment_date_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('credit_2_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Credit 2', true))); ?>
〜<?php echo $this->KendbForm->input('credit_2_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('billing_date_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Billing Date 3', true))); ?>
〜<?php echo $this->KendbForm->input('billing_date_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_due_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Due 3', true))); ?>
〜<?php echo $this->KendbForm->input('payment_due_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_date_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Date 3', true))); ?>
〜<?php echo $this->KendbForm->input('payment_date_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('credit_3_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Credit 3', true))); ?>
〜<?php echo $this->KendbForm->input('credit_3_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('billing_date_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Billing Date 4', true))); ?>
〜<?php echo $this->KendbForm->input('billing_date_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_due_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Due 4', true))); ?>
〜<?php echo $this->KendbForm->input('payment_due_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_date_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Payment Date 4', true))); ?>
〜<?php echo $this->KendbForm->input('payment_date_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('credit_4_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Credit 4', true))); ?>
〜<?php echo $this->KendbForm->input('credit_4_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 4) { ?>
	<h3>備考</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="4"><?php echo $this->KendbForm->input('remarks1', array('type' => 'text', 'div' => false, 'size' => 30)); ?></td>
	</tr>
	<tr>
	<td colspan="4"><?php echo $this->KendbForm->input('remarks2', array('type' => 'text', 'div' => false, 'size' => 30)); ?></td>
	</tr>
	<tr>
	<td colspan="4"><?php echo $this->KendbForm->input('remarks3', array('type' => 'text', 'div' => false, 'size' => 30)); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 5) { ?>
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
function set_rinfo(id) {
	$.get("/researchers/getJsonById/"+id, function(data) {
		var researcher = jQuery.parseJSON(data);
		$("#ContractRepresentResearcherName").val(researcher.researcher_name);
		$('#r_search_result').dialog('close');
	});
}
</script>
