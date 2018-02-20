	<?php echo $this->KendbForm->create('MhlwResearchGrant', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>

	<?php if ($search_param == 3) { ?>
	<h3>カスタム検索</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->input('assignment_no'); ?></td>
	<td><?php echo $this->KendbForm->input('name'); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('titech_assignment_no'); ?></td>
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
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('grant_initial_appointment_date_f', array('div' => false, 'label' => __('Grant Initial Appointment Date' , true))); ?>〜<?php echo $this->KendbForm->input('grant_initial_appointment_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('grant_initial_decision_date_f', array('div' => false, 'label' => __('Grant Initial Decision Date' , true))); ?>〜<?php echo $this->KendbForm->input('grant_initial_decision_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('payment_date_f', array('div' => false, 'label' => __('Payment Date' , true))); ?>〜<?php echo $this->KendbForm->input('payment_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('this_year_advance_application_date_f', array('div' => false, 'label' => __('This Year Advance Application Date' , true))); ?>〜<?php echo $this->KendbForm->input('this_year_advance_application_date_t', array('div' => false, 'label' => false)); ?></td>
	<tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('moving_history'); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('commission_coi_check'); ?></td>
	<td><?php echo $this->KendbForm->input('business_name'); ?></td>
	<td><?php echo $this->KendbForm->input('titech_assignment_no'); ?></td>
	<td><?php echo $this->KendbForm->input('assignment_no'); ?></td>
	<td><?php echo $this->KendbForm->input('new_or_continuance', array('type' => 'select', 'options' => array('' => '', '新規' => '新規', '継続' => '継続')));?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
	<td><?php echo $this->KendbForm->input('personal_no'); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_no'); ?></td>
	<td><?php echo $this->KendbForm->input('name'); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('represent_researcher'); ?></td>
	<td><?php echo $this->KendbForm->input('notifying_department'); ?></td>
	<td><?php echo $this->KendbForm->input('statistical_department'); ?></td>
	<td><?php echo $this->KendbForm->input('affiliated_major_name'); ?></td>
	<td><?php echo $this->KendbForm->input('statistical_job'); ?></td>
	</tr>
	</table>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->input('institute_code'); ?></td>
	<td><?php echo $this->KendbForm->input('school_code'); ?></td>
	<td><?php echo $this->KendbForm->input('course_code'); ?></td>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('this_year_application_amount_f', array('div' => false, 'label' => __('This Year Application Amount' , true))); ?>〜<?php echo $this->KendbForm->input('this_year_application_amount_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('this_year_total_at_decision_f', array('div' => false, 'label' => __('This Year Total At Decision' , true))); ?>〜<?php echo $this->KendbForm->input('this_year_total_at_decision_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('this_year_direct_at_decision_f', array('div' => false, 'label' => __('This Year Direct At Decision' , true))); ?>〜<?php echo $this->KendbForm->input('this_year_direct_at_decision_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('this_year_indirect_at_decision_f', array('div' => false, 'label' => __('This Year Indirect At Decision' , true))); ?>〜<?php echo $this->KendbForm->input('this_year_indirect_at_decision_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('this_year_application_amount_sum_f', array('div' => false, 'label' => __('This Year Application Amount Sum' , true))); ?>〜<?php echo $this->KendbForm->input('this_year_application_amount_sum_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('this_year_direct_cost_f', array('div' => false, 'label' => __('This Year Direct Cost' , true))); ?>〜<?php echo $this->KendbForm->input('this_year_direct_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('this_year_indirect_cost_f', array('div' => false, 'label' => __('This Year Indirect Cost' , true))); ?>〜<?php echo $this->KendbForm->input('this_year_indirect_cost_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('research_assignment', array('type' => 'text')); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('contribution_count_f', array('div' => false, 'label' => __('Contribution Count' , true))); ?>〜<?php echo $this->KendbForm->input('contribution_count_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('contribution_partition_f', array('div' => false, 'label' => __('Contribution Partition' , true))); ?>〜<?php echo $this->KendbForm->input('contribution_partition_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('contribution_remarks', array('type'=> 'text')); ?></td>
	</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('research_start_date_f', array('div' => false, 'label' => __('Research Start Date' , true))); ?>〜<?php echo $this->KendbForm->input('research_start_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('research_end_date_f', array('div' => false, 'label' => __('Research End Date' , true))); ?>〜<?php echo $this->KendbForm->input('research_end_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('project_start_year_f', array('div' => false, 'label' => __('Project Start Year' , true))); ?>〜<?php echo $this->KendbForm->input('project_start_year_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('project_end_year_f', array('div' => false, 'label' => __('Project End Year' , true))); ?>〜<?php echo $this->KendbForm->input('project_end_year_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('remarks', array('type'=> 'text')); ?></td>
	<td><?php echo $this->KendbForm->input('extension'); ?></td>
	<td><?php echo $this->KendbForm->input('fax'); ?></td>
	<td><?php echo $this->KendbForm->input('post_no'); ?></td>
	<td><?php echo $this->KendbForm->input('email'); ?></td>
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
		var rname = $('#MhlwResearchGrantName').val();
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
		$("#MhlwResearchGrantName").val(researcher.researcher_name);
		$('#r_search_result').dialog('close');
	});
}
</script>
