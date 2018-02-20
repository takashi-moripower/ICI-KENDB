
	<?php echo $this->KendbForm->create('Grant', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>
	<?php if ($search_param == 0 || $search_param == 1) { ?>
	<h3>基本情報</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('id', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_f', array('div' => false, 'label' => '年度(From)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('year_t', array('div' => false, 'label' => '年度(To)')); ?></td>
	<td><?php echo $this->KendbForm->nendoPullDown('adoption_year', array('type' => 'text', 'div' => false)); ?></td>
	<td><?php echo $this->KendbForm->input('cooperate_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('project_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('assignment_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('grant_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('grant_project_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('project_assignment_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('grant_initial_start_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Grant Initial Start Date', true))); ?>
〜<?php echo $this->KendbForm->input('grant_initial_start_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('grant_initial_end_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Grant Initial End Date', true))); ?>
〜<?php echo $this->KendbForm->input('grant_initial_end_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('grant_this_year_decision_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Grant This Year Decision Date', true))); ?>
〜<?php echo $this->KendbForm->input('grant_this_year_decision_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('grant_this_year_start_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Grant This Year Start Date', true))); ?>
〜<?php echo $this->KendbForm->input('grant_this_year_start_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('grant_this_year_end_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Grant This Year End Date', true))); ?>
〜<?php echo $this->KendbForm->input('grant_this_year_end_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 2) { ?>
	<h3>事業情報内容</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr valign="top">
	<td><?php echo $this->KendbForm->input('represent_type', array('type' => 'select', 'options' => array('' => '', '代表（単独）' => '代表（単独）', '代表（複数）' => '代表（複数）', '分担/共同等' => '分担/共同等', 'その他'=>'その他'))); ?></td>
	<td><?php echo $this->KendbForm->input('represent_researcher_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?>&nbsp;<input type="button" id="r_search" value="教員検索" style="padding:0px; font-size:8px" /></td>
	<td><?php echo $this->KendbForm->input('job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('department', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('major_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('institute_code', array('type' => 'text', 'div' => false, 'size' => 100)); ?></td>
	<td><?php echo $this->KendbForm->input('school_code', array('type' => 'text', 'div' => false, 'size' => 100)); ?></td>
	<td><?php echo $this->KendbForm->input('course_code', array('type' => 'text', 'div' => false, 'size' => 100)); ?></td>
	<td><?php echo $this->KendbForm->input('grant_funds_institute', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('grant_delivery_institute', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('delegate_1', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('delegate_2', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('delegate_3', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('delegate_4', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->Form->input('singular_or_multi', array('type' => 'select', 'div' => false, 'options' => array('' => '', '単' => '単', '複' => '複'))); ?></td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('balance_carried_forward_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Balance Carried Forward', true))); ?>
〜<?php echo $this->KendbForm->input('balance_carried_forward_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('grant_this_year_decision_money_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Grant This Year Decision Money', true))); ?>
〜<?php echo $this->KendbForm->input('grant_this_year_decision_money_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('grant_this_year_reception_amount_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Grant This Year Reception Amount', true))); ?>
〜<?php echo $this->KendbForm->input('grant_this_year_reception_amount_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('primary_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Primary Cost', true))); ?>
〜<?php echo $this->KendbForm->input('primary_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('indirect_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Indirect Cost', true))); ?>
〜<?php echo $this->KendbForm->input('indirect_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('general_administration_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('General Administration Cost', true))); ?>
〜<?php echo $this->KendbForm->input('general_administration_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('self_contribute_money_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Self Contribute Money', true))); ?>
〜<?php echo $this->KendbForm->input('self_contribute_money_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('other_cost_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Other Cost', true))); ?>
〜<?php echo $this->KendbForm->input('other_cost_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('delegate_1_money_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Delegate 1 Money', true))); ?>
〜<?php echo $this->KendbForm->input('delegate_1_money_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('delegate_2_money_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Delegate 2 Money', true))); ?>
〜<?php echo $this->KendbForm->input('delegate_2_money_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('delegate_3_money_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Delegate 3 Money', true))); ?>
〜<?php echo $this->KendbForm->input('delegate_3_money_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('delegate_4_money_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Delegate 4 Money', true))); ?>
〜<?php echo $this->KendbForm->input('delegate_4_money_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td><?php echo $this->KendbForm->input('billing_type', array('type' => 'select', 'options' => array('' => '', '精算' => '精算', '概算' => '概算'))); ?></td>
	<td>&nbsp;</td>
	</tr>
	</table>
	<?php } ?>


	<?php if ($search_param == 0 || $search_param == 3) { ?>
	<h3>備考</h3>
	<table border="0" cellspacing="4" class="entrust_search_table">
	<tr>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('kaken_system_registration_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Kaken System Registration Date', true))); ?>
〜<?php echo $this->KendbForm->input('kaken_system_registration_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td colspan="2" class="colspan"><?php echo $this->KendbForm->input('reception_status_entry_date_f', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => __('Reception Status Entry Date', true))); ?>
〜<?php echo $this->KendbForm->input('reception_status_entry_date_t', array('type' => 'text', 'div' => false, 'size' => 10, 'label' => false)); ?>
	</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="10"><?php echo $this->KendbForm->input('remarks1', array('type' => 'text', 'div' => false, 'size' => 30)); ?></td>
	</tr>
	<tr>
	<td colspan="10"><?php echo $this->KendbForm->input('remarks2', array('type' => 'text', 'div' => false, 'size' => 30)); ?></td>
	</tr>
	<tr>
	<td colspan="10"><?php echo $this->KendbForm->input('remarks3', array('type' => 'text', 'div' => false, 'size' => 30)); ?></td>
	</tr>
	</table>
	<?php } ?>

	<?php if ($search_param == 0 || $search_param == 4) { ?>
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
		var rname = $('#GrantRepresentResearcherName').val();
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
		$("#GrantRepresentResearcherName").val(researcher.researcher_name);
		$('#r_search_result').dialog('close');
	});
}
</script>
