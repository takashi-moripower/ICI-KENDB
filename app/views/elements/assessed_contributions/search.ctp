	<?php echo $this->KendbForm->create('AssessedContribution', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>

	<?php if ($search_param == 7) { ?>
	<h3>カスタム検索</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->input('title_no'); ?></td>
	<td><?php echo $this->KendbForm->input('titech_assignment_no'); ?></td>
	<td><?php echo $this->KendbForm->input('co_researcher_name'); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 1) { ?>
	<h3>プロジェクト</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->input('representative_affiliation'); ?></td>
	<td><?php echo $this->KendbForm->input('representative_department'); ?></td>
	<td><?php echo $this->KendbForm->input('representative_job_type'); ?></td>
	<td><?php echo $this->KendbForm->input('representative_name'); ?></td>
	<td><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
	<td><?php echo $this->KendbForm->input('personal_no'); ?></td>
	<td><?php echo $this->KendbForm->input('co_researcher_no'); ?></td>
	<td><?php echo $this->KendbForm->input('co_researcher_department'); ?></td>
	<td><?php echo $this->KendbForm->input('co_researcher_major_name'); ?></td>
	</tr>

<tr>
	<td><?php echo $this->KendbForm->input('institute_code'); ?></td>
	<td><?php echo $this->KendbForm->input('school_code'); ?></td>
	<td><?php echo $this->KendbForm->input('course_code'); ?></td>
</tr>

	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->input('co_researcher_job_type'); ?></td>
	<td><?php echo $this->KendbForm->input('department_no'); ?></td>
	<td><?php echo $this->KendbForm->input('co_researcher_name'); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('post_no'); ?></td>
	<td><?php echo $this->KendbForm->input('extension'); ?></td>
	<td><?php echo $this->KendbForm->input('fax'); ?></td>
	<td><?php echo $this->KendbForm->input('email'); ?></td>
	<td><?php echo $this->KendbForm->input('moving_history', array('type'=>'text')); ?></td>
	<td><?php echo $this->KendbForm->input('research_type'); ?></td>
	<td><?php echo $this->KendbForm->input('title_no'); ?></td>
	<td><?php echo $this->KendbForm->input('titech_assignment_no'); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('project'); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('primary_cost_f', array('div' => false, 'label' => __('Primary Cost' , true))); ?>〜<?php echo $this->KendbForm->input('primary_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('detail_good_cost_f', array('div' => false, 'label' => __('Detail Good Cost' , true))); ?>〜<?php echo $this->KendbForm->input('detail_good_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('detail_trip_cost_f', array('div' => false, 'label' => __('Detail Trip Cost' , true))); ?>〜<?php echo $this->KendbForm->input('detail_trip_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('detail_reward_cost_f', array('div' => false, 'label' => __('Detail Reward Cost' , true))); ?>〜<?php echo $this->KendbForm->input('detail_reward_cost_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('detail_other_f', array('div' => false, 'label' => __('Detail Other' , true))); ?>〜<?php echo $this->KendbForm->input('detail_other_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('indirect_cost_f', array('div' => false, 'label' => __('Indirect Cost' , true))); ?>〜<?php echo $this->KendbForm->input('indirect_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('remarks', array('type'=>'text')); ?></td>
	<td><?php echo $this->KendbForm->input('is_distributed_amount_change'); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('distributed_amount_change_f', array('div' => false, 'label' => __('Distributed Amount Change' , true))); ?>〜<?php echo $this->KendbForm->input('distributed_amount_change_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('change_detail_good_cost_f', array('div' => false, 'label' => __('Change Detail Good Cost' , true))); ?>〜<?php echo $this->KendbForm->input('change_detail_good_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('change_detail_trip_cost_f', array('div' => false, 'label' => __('Change Detail Trip Cost' , true))); ?>〜<?php echo $this->KendbForm->input('change_detail_trip_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('change_detail_reward_cost_f', array('div' => false, 'label' => __('Change Detail Reward Cost' , true))); ?>〜<?php echo $this->KendbForm->input('change_detail_reward_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('change_detail_other_f', array('div' => false, 'label' => __('Change Detail Other' , true))); ?>〜<?php echo $this->KendbForm->input('change_detail_other_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('change_indirect_cost_f', array('div' => false, 'label' => __('Change Indirect Cost' , true))); ?>〜<?php echo $this->KendbForm->input('change_indirect_cost_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('remarks_distributed_change', array('type'=>'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 2) { ?>
	<h3>受入手続</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('contribution_repartition_official_letter_f', array('div' => false, 'label' => __('Contribution Repartition Official Letter' , true))); ?>〜<?php echo $this->KendbForm->input('contribution_repartition_official_letter_t', array('div' => false, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('detail_cost_check'); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('recept_commission_request_date_f', array('div' => false, 'label' => __('Recept Commission Request Date' , true))); ?>〜<?php echo $this->KendbForm->input('recept_commission_request_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('recept_commission_recept_date_f', array('div' => false, 'label' => __('Recept Commission Recept Date' , true))); ?>〜<?php echo $this->KendbForm->input('recept_commission_recept_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('request_transfer_f', array('div' => false, 'label' => __('Request Transfer' , true))); ?>〜<?php echo $this->KendbForm->input('request_transfer_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('representative_organization_send_f', array('div' => false, 'label' => __('Representative Organization Send' , true))); ?>〜<?php echo $this->KendbForm->input('representative_organization_send_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('payment_date_f', array('div' => false, 'label' => __('Payment Date' , true))); ?>〜<?php echo $this->KendbForm->input('payment_date_t', array('div' => false, 'label' =>false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('recovery_date_f', array('div' => false, 'label' => __('Recovery Date' , true))); ?>〜<?php echo $this->KendbForm->input('recovery_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('payment_confirmed_date_f', array('div' => false, 'label' => __('Payment Confirmed Date' , true))); ?>〜<?php echo $this->KendbForm->input('payment_confirmed_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('research_plan_contact', array('type'=>'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 3) { ?>
	<h3>配分額変更手続</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('contribution_repartition_official_letter_distributed_change_f', array('div' => false, 'label' => __('Contribution Repartition Official Letter Distributed Change' , true))); ?>〜<?php echo $this->KendbForm->input('contribution_repartition_official_letter_distributed_change_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('detail_cost_check_amount_change'); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('recept_commission_request_date_distributed_change_f', array('div' => false, 'label' => __('Recept Commission Request Date Distributed Change' , true))); ?>〜<?php echo $this->KendbForm->input('recept_commission_request_date_distributed_change_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('recept_commission_recept_date_distributed_change_f', array('div' => false, 'label' => __('Recept Commission Recept Date Distributed Change' , true))); ?>〜<?php echo $this->KendbForm->input('recept_commission_recept_date_distributed_change_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('request_transfer_distributed_change_f', array('div' => false, 'label' => __('Request Transfer Distributed Change' , true))); ?>〜<?php echo $this->KendbForm->input('request_transfer_distributed_change_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('representative_organization_send_distributed_change_f', array('div' => false, 'label' => __('Representative Organization Send Distributed Change' , true))); ?>〜<?php echo $this->KendbForm->input('representative_organization_send_distributed_change_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('payment_date_distributed_change_f', array('div' => false, 'label' => __('Payment Date Distributed Change' , true))); ?>〜<?php echo $this->KendbForm->input('payment_date_distributed_change_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('recovery_date_distributed_change_f', array('div' => false, 'label' => __('Recovery Date Distributed Change' , true))); ?>〜<?php echo $this->KendbForm->input('recovery_date_distributed_change_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('payment_confirmed_date_distributed_change_f', array('div' => false, 'label' => __('Payment Confirmed Date Distributed Change' , true))); ?>〜<?php echo $this->KendbForm->input('payment_confirmed_date_distributed_change_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('research_plan_contact_distributed_change_f', array('div' => false, 'label' => __('Research Plan Contact Distributed Change' , true))); ?>〜<?php echo $this->KendbForm->input('research_plan_contact_distributed_change_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('remarks_distributed_change_process', array('type'=>'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 4) { ?>
	<h3>報告手続</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('exhibit_overdue_f', array('div' => false, 'label' => __('Exhibit Overdue' , true))); ?>〜<?php echo $this->KendbForm->input('exhibit_overdue_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('exhibit_induction_date_f', array('div' => false, 'label' => __('Exhibit Induction Date' , true))); ?>〜<?php echo $this->KendbForm->input('exhibit_induction_date_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('real_primary_cost_f', array('div' => false, 'label' => __('Real Primary Cost' , true))); ?>〜<?php echo $this->KendbForm->input('real_primary_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('expense_detail_goods_cost_f', array('div' => false, 'label' => __('Expense Detail Goods Cost' , true))); ?>〜<?php echo $this->KendbForm->input('expense_detail_goods_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('expense_detail_trip_cost_f', array('div' => false, 'label' => __('Expense Detail Trip Cost' , true))); ?>〜<?php echo $this->KendbForm->input('expense_detail_trip_cost_t', array('div' => false, 'label' => false)); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('expense_detail_reward_cost_f', array('div' => false, 'label' => __('Expense Detail Reward Cost' , true))); ?>〜<?php echo $this->KendbForm->input('expense_detail_reward_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('expense_detail_other_f', array('div' => false, 'label' => __('Expense Detail Other' , true))); ?>〜<?php echo $this->KendbForm->input('expense_detail_other_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('real_indirect_cost_f', array('div' => false, 'label' => __('Real Indirect Cost' , true))); ?>〜<?php echo $this->KendbForm->input('real_indirect_cost_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('turnback_payment_amount_f', array('div' => false, 'label' => __('Turnback Payment Amount' , true))); ?>〜<?php echo $this->KendbForm->input('turnback_payment_amount_t', array('div' => false, 'label' => false)); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('turnback_indirect_amount_f', array('div' => false, 'label' => __('Turnback Indirect Amount' , true))); ?>〜<?php echo $this->KendbForm->input('turnback_indirect_amount_t', array('div' => false, 'label' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('remarks_report', array('type'=>'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 5) { ?>
	<h3>担当連絡先等</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('represent_postal_no'); ?></td>
	<td><?php echo $this->KendbForm->input('address'); ?></td>
	<td><?php echo $this->KendbForm->input('research_institute_name'); ?></td>
	<td><?php echo $this->KendbForm->input('office_in_charge'); ?></td>
	<td><?php echo $this->KendbForm->input('person_in_charge'); ?></td>
	<td><?php echo $this->KendbForm->input('tel_in_charge'); ?></td>
	<td><?php echo $this->KendbForm->input('fax_in_charge'); ?></td>
	</tr>
	</table>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<td><?php echo $this->KendbForm->input('email_in_charge'); ?></td>
	<td colspan="2" class="colspan" nowrap><?php echo $this->KendbForm->input('other_contact_in_charge', array('type'=>'text')); ?></td>
	<td><?php echo $this->KendbForm->input('remarks_other', array('type'=>'text')); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 6) { ?>
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

function set_rinfo(id) {
	$.get("/researchers/getJsonById/"+id, function(data) {
		var researcher = jQuery.parseJSON(data);
		$("#AssessedContributionCoResearcherName").val(researcher.researcher_name);
		$('#r_search_result').dialog('close');
	});
}

</script>

