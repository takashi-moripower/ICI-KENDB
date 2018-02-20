<?php echo $this->KendbForm->create('Encourage', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>
<?php $encourage = new Encourage(); ?>
<?php if ($search_param == 8) { ?>
	<h3>カスタム検索</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr valign="top">
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
			<td><?php echo $this->KendbForm->input('represent_researcher_name'); ?></td>
			<td><?php echo $this->KendbForm->input('facility_teacher', array('label' => '受入研究者')); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
			<td><?php echo $this->KendbForm->input('foreigner_researcher'); ?></td>
			<td><?php echo $this->KendbForm->nendoPullDown('recruiting_year'); ?></td>
			<td><?php echo $this->KendbForm->input('reception_no'); ?></td>
			<td><?php echo $this->KendbForm->input('assignment_no'); ?></td>
			<td><?php echo $this->KendbForm->input('domestic_or_not', array('type' => 'select', 'options' => array('' => '', '国' => '国', '外' => '外'))); ?></td>
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
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('appointment_date_f', array('div' => false, 'label' => __('Appointment Date', true))); ?>〜<?php echo $this->KendbForm->input('appointment_date_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('decision_date_f', array('div' => false, 'label' => __('Decision Date', true))); ?>〜<?php echo $this->KendbForm->input('decision_date_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('payment_date_f', array('div' => false, 'label' => __('Payment Date', true))); ?>〜<?php echo $this->KendbForm->input('payment_date_t', array('div' => false, 'label' => false)); ?></td>
			<td>&nbsp;</td>
			<td><?php echo $this->KendbForm->input('moving_history', array('type' => 'text', 'label' => $encourage->output_column_label_alias['moving_history'])); ?></td>
		</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td><?php echo $this->KendbForm->input('domestic_or_not', array('type' => 'select', 'options' => array('' => '', '国' => '国', '外' => '外'))); ?></td>
			<td><?php echo $this->KendbForm->input('classification'); ?></td>
			<td><?php echo $this->KendbForm->input('new_or_continuance', array('type' => 'select', 'options' => array('' => '', '新' => '新', '継' => '継'))); ?></td>
			<td><?php echo $this->KendbForm->input('sex'); ?></td>
			<td><?php echo $this->KendbForm->warekiPullDown('recruiting_year'); ?></td>
			<td><?php echo $this->KendbForm->input('reception_no'); ?></td>
			<td><?php echo $this->KendbForm->input('assignment_no'); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('this_year_advance_application_date_f', array('div' => false, 'label' => $encourage->output_column_label_alias['this_year_advance_application_date'])); ?>〜<?php echo $this->KendbForm->input('this_year_advance_application_date_t', array('div' => false, 'label' => false)); ?></td>
			<td><?php echo $this->KendbForm->input('qualification_and_others', array('type' => 'select', 'options' => array('' => '', 'DC1' => 'DC1', 'DC2' => 'DC2', 'PD' => 'PD', 'SPD' => 'SPD', 'RPD' => 'RPD'))); ?></td>
			<td><?php echo $this->KendbForm->input('ambit'); ?></td>
		</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr valign="top">
			<td><?php echo $this->KendbForm->input('represent_researcher_name'); ?></td>
			<td><?php echo $this->KendbForm->input('department_represent_researcher'); ?></td>
			<td><?php echo $this->KendbForm->input('project_code_name'); ?></td>
			<td><?php echo $this->KendbForm->input('personal_no'); ?></td>
			<td><?php echo $this->KendbForm->input('researcher_no'); ?></td>
			<td><?php echo $this->KendbForm->input('facility_teacher', array('label'=>'受入研究者')); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
			<td><?php echo $this->KendbForm->input('foreigner_researcher'); ?></td>
			<td><?php echo $this->KendbForm->input('appointment_department'); ?></td>
			<td><?php echo $this->KendbForm->input('appointment_job_title'); ?></td>
			<td><?php echo $this->KendbForm->input('statistical_department'); ?></td>
		</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr valign="top">
			<td><?php echo $this->KendbForm->input('institute_code'); ?></td>
			<td><?php echo $this->KendbForm->input('school_code'); ?></td>
			<td><?php echo $this->KendbForm->input('course_code'); ?></td>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td><?php echo $this->KendbForm->input('job_title', array('label' => $encourage->output_column_label_alias['job_title'])); ?></td>
			<td><?php echo $this->KendbForm->input('major'); ?></td>
			<td><?php echo $this->KendbForm->input('matriculation_number'); ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('recruit_start_date_f', array('div' => false, 'label' => __('Recruit Start Date', true))); ?>〜<?php echo $this->KendbForm->input('recruit_start_date_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('recruit_end_date_f', array('div' => false, 'label' => __('Recruit End Date', true))); ?>〜<?php echo $this->KendbForm->input('recruit_end_date_t', array('div' => false, 'label' => false)); ?></td>
			<td><?php echo $this->KendbForm->input('number_of_month'); ?></td>
		</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td><?php echo $this->KendbForm->input('remarks_change', array('type' => 'text')); ?></td>
			<td><?php echo $this->KendbForm->input('remarks_qualification', array('type' => 'text')); ?></td>
			<td><?php echo $this->KendbForm->input('remarks', array('type' => 'text')); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('research_plan_reception_date_f', array('div' => false, 'label' => __('Research Plan Reception Date', true))); ?>〜<?php echo $this->KendbForm->input('research_plan_reception_date_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('confirmation_statement_date_f', array('div' => false, 'label' => __('Confirmation Statement Date', true))); ?>〜<?php echo $this->KendbForm->input('confirmation_statement_date_t', array('div' => false, 'label' => false)); ?></td>
		</tr>
	</table>

	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('this_year_application_amount_f', array('div' => false, 'label' => __('This Year Application Amount', true))); ?>〜<?php echo $this->KendbForm->input('this_year_application_amount_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('this_year_distributed_amount_appointment_f', array('div' => false, 'label' => __('This Year Distributed Amount Appointment', true))); ?>〜<?php echo $this->KendbForm->input('this_year_distributed_amount_appointment_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next_year_distributed_amount_appointment_f', array('div' => false, 'label' => __('Next Year Distributed Amount Appointment', true))); ?>〜<?php echo $this->KendbForm->input('next_year_distributed_amount_appointment_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next2_year_distributed_amount_appointment_f', array('div' => false, 'label' => __('Next2 Year Distributed Amount Appointment', true))); ?>〜<?php echo $this->KendbForm->input('next2_year_distributed_amount_appointment_t', array('div' => false, 'label' => false)); ?></td>
		</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('this_year_distributed_amount_f', array('div' => false, 'label' => __('This Year Distributed Amount', true))); ?>〜<?php echo $this->KendbForm->input('this_year_distributed_amount_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next_year_distributed_amount_f', array('div' => false, 'label' => __('Next Year Distributed Amount', true))); ?>〜<?php echo $this->KendbForm->input('next_year_distributed_amount_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('next2_year_distributed_amount_f', array('div' => false, 'label' => __('Next2 Year Distributed Amount', true))); ?>〜<?php echo $this->KendbForm->input('next2_year_distributed_amount_t', array('div' => false, 'label' => false)); ?></td>
			<td><?php echo $this->KendbForm->input('titech_assignment_no'); ?></td>
			<td><?php echo $this->KendbForm->input('research_assignment'); ?></td>
		</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 2) {
 ?>
	<h3>交付申請等</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('acceptance_statement_f', array('div' => false, 'label' => __('Acceptance Statement', true))); ?>〜<?php echo $this->KendbForm->input('acceptance_statement_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('acceptance_application_reception_date_f', array('div' => false, 'label' => __('Acceptance Application Reception Date', true))); ?>〜<?php echo $this->KendbForm->input('acceptance_application_reception_date_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('issue_application_reception_date_f', array('div' => false, 'label' => __('Issue Application Reception Date', true))); ?>〜<?php echo $this->KendbForm->input('issue_application_reception_date_t', array('div' => false, 'label' => false)); ?></td>
		</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('total_primary_cost_f', array('div' => false, 'label' => __('Total Primary Cost', true))); ?>〜<?php echo $this->KendbForm->input('total_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('detail_goods_cost_f', array('div' => false, 'label' => __('Detail Goods Cost', true))); ?>〜<?php echo $this->KendbForm->input('detail_goods_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('detail_travel_cost_f', array('div' => false, 'label' => __('Detail Travel Cost', true))); ?>〜<?php echo $this->KendbForm->input('detail_travel_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('detail_gratuity_cost_f', array('div' => false, 'label' => __('Detail Gratuity Cost', true))); ?>〜<?php echo $this->KendbForm->input('detail_gratuity_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('detail_other_cost_f', array('div' => false, 'label' => __('Detail Other Cost', true))); ?>〜<?php echo $this->KendbForm->input('detail_other_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td><?php echo $this->KendbForm->input('issue_application_remarks', array('type' => 'text')); ?></td>
		</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 3) { ?>
	<h3>実績報告</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_report_reception_date_f', array('div' => false, 'label' => __('Achievement Report Reception Date', true))); ?>〜<?php echo $this->KendbForm->input('achievement_report_reception_date_t', array('div' => false, 'label' => false)); ?></td>
		</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_primary_cost_f', array('div' => false, 'label' => __('Achievement Primary Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_detail_goods_cost_f', array('div' => false, 'label' => __('Achievement Detail Goods Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_detail_goods_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_detail_travel_cost_f', array('div' => false, 'label' => __('Achievement Detail Travel Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_detail_travel_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_detail_gratuity_cost_f', array('div' => false, 'label' => __('Achievement Detail Gratuity Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_detail_gratuity_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_detail_other_cost_f', array('div' => false, 'label' => __('Achievement Detail Other Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_detail_other_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td><?php echo $this->KendbForm->input('achievement_remarks', array('type' => 'text')); ?></td>
		</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 4) { ?>
	<h3>繰越</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_carried_report_reception_date_f', array('div' => false, 'label' => __('Achievement Carried Report Reception Date', true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_report_reception_date_t', array('div' => false, 'label' => false)); ?></td>
		</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_carried_primary_cost_f', array('div' => false, 'label' => __('Achievement Carried Primary Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_carried_detail_goods_cost_f', array('div' => false, 'label' => __('Achievement Carried Detail Goods Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_detail_goods_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_carried_detail_travel_cost_f', array('div' => false, 'label' => __('Achievement Carried Detail Travel Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_detail_travel_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_carried_detail_gratuity_cost_f', array('div' => false, 'label' => __('Achievement Carried Detail Gratuity Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_detail_gratuity_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('achievement_carried_detail_other_cost_f', array('div' => false, 'label' => __('Achievement Carried Detail Other Cost', true))); ?>〜<?php echo $this->KendbForm->input('achievement_carried_detail_other_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td><?php echo $this->KendbForm->input('carried_titech_assignment_no'); ?></td>
		</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('balance_carried_f', array('div' => false, 'label' => __('Balance Carried', true))); ?>〜<?php echo $this->KendbForm->input('balance_carried_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('carried_detail_goods_cost_f', array('div' => false, 'label' => __('Carried Detail Goods Cost', true))); ?>〜<?php echo $this->KendbForm->input('carried_detail_goods_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('carried_detail_travel_cost_f', array('div' => false, 'label' => __('Carried Detail Travel Cost', true))); ?>〜<?php echo $this->KendbForm->input('carried_detail_travel_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('carried_detail_gratuity_cost_f', array('div' => false, 'label' => __('Carried Detail Gratuity Cost', true))); ?>〜<?php echo $this->KendbForm->input('carried_detail_gratuity_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('carried_detail_other_cost_f', array('div' => false, 'label' => __('Carried Detail Other Cost', true))); ?>〜<?php echo $this->KendbForm->input('carried_detail_other_cost_t', array('div' => false, 'label' => false)); ?></td>
			<td><?php echo $this->KendbForm->input('remarks_carried', array('type' => 'text')); ?></td>
		</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 5) { ?>
	<h3>返還・確定</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('fixed_amount_f', array('div' => false, 'label' => $encourage->output_column_label_alias['fixed_amount'])); ?>〜<?php echo $this->KendbForm->input('fixed_amount_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('turnback_amount_f', array('div' => false, 'label' => $encourage->output_column_label_alias['turnback_amount'])); ?>〜<?php echo $this->KendbForm->input('turnback_amount_t', array('div' => false, 'label' => false)); ?></td>
			<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('remarks_balance_fixed_turnback', array('type' => 'text')); ?></td>
		</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 6) { ?>
	<h3>連絡先</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td><?php echo $this->KendbForm->input('extension', array('label' => $encourage->output_column_label_alias['extension'])); ?></td>
			<td><?php echo $this->KendbForm->input('fax', array('label' => $encourage->output_column_label_alias['fax'])); ?></td>
			<td><?php echo $this->KendbForm->input('email', array('label' => $encourage->output_column_label_alias['email'])); ?></td>
			<td><?php echo $this->KendbForm->input('mobile_phone', array('label' => $encourage->output_column_label_alias['mobile_phone'])); ?></td>
			<td><?php echo $this->KendbForm->input('post_no', array('label' => $encourage->output_column_label_alias['post_no'])); ?></td>
			<td><?php echo $this->KendbForm->input('extension_researcher'); ?></td>
			<td><?php echo $this->KendbForm->input('received_researcher_email', array('label' => $encourage->output_column_label_alias['received_researcher_email'])); ?></td>
		</tr>
	</table>
<?php } ?>

<?php if ($search_param == 0 || $search_param == 7) { ?>
	<h3>データ件数と範囲</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
		<tr>
			<td><?php echo $this->Form->input('limit', array('label' => __('Limit', true), 'type' => 'select', 'div' => false, 'options' => array("20" => "20", "50" => "50", "100" => "100"))); ?></td>
			<!-- 隠している削除データを表示するか -->
			<td colspan="8"><?php echo $this->Form->input('scope', array('label' => __('Scope', true), 'type' => 'select', 'div' => false, 'options' => array('0' => __('Show Valid Data', true), '1' => __('Show Data includes deleted item', true), '2' => __('Show All Data', true)))); ?></td>
		</tr>
	</table>
<?php } ?>

<?php echo $this->Form->submit(__('Search', true)); ?>

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


function set_rinfo(id) {
	$.get("/researchers/getJsonById/"+id, function(data) {
		var researcher = jQuery.parseJSON(data);
		$("#EncourageFacilityTeacher").val(researcher.researcher_name);
		$('#r_search_result').dialog('close');
	});
}

</script>
