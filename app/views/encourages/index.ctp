<div id="snavi">
	<ul>
		<?php if($can_add): ?>
		<li><?php echo $this->Html->link(__('New Encourage', true), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/encourages/output_excel') . $urlparams . "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/encourages/output_excel') . $urlparams . "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/encourages/output_csv') . $urlparams; ?>">CSV形式ダウンロード</a></li>
		<?php endif; ?>
	</ul>
</div>
<?php echo $this->element("crumbs"); ?>

<script type="text/javascript">
function search_box_change(n) {
	$('#searchbox').html("検索ボックス作成中。しばらくお待ちください...");
	var url = "<?php echo $html->url('/encourages/search_box/'); ?>";
	url = url + "search_param:" + n + "/";
	url = url + "<?php echo $urlparams; ?>";
	$.get(url,
		{},
		function(data) {
			$('#searchbox').html(data);
			$('#searchbox').show();
		}
	);
}
</script>

<?php echo $this->element("table_switcher_head", array("count" => count($encourages))); ?>

<?php $enc = new Encourage(); ?>

<div class="encourages index">
	<h2><?php __('Encourages');?></h2>
	<?php echo $this->element("data_search", array("modelname" => "Encourage")); ?>
	<div id="searchbox_toggle">
	<a href="javascript:void(0);" onclick="javascript:search_box_change('8');return false;">カスタム検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('1');return false;">プロジェクトデータで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('2');return false;">交付申請等データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('3');return false;">実績報告データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('4');return false;">繰越データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('5');return false;">返還・確定データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('6');return false;">連絡先データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('7');return false;">データ件数と範囲を指定</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('0');return false;">全データで検索</a> |
	<input type="button" id="searchbox_button" value="表示切り替え" onclick="$('#searchbox').toggle();" />
	</div>
	<div id="searchbox">
	</div>
	<br clear="all" />

	<?php echo $this->element("paginate"); ?>

	<div class="fakeContainer">
	<table id="flexme">
	<thead>
	<tr>
		<th width="60" class="actions"><?php __('Actions');?></th>
		<th width="65"><?php echo $this->Paginator->sort('updated'); ?></th>
		<th width="40"><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th width="20"><?php echo $this->Paginator->sort('id'); ?></th>
		<th width="20"><?php echo $this->Paginator->sort('year'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('appointment_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('decision_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($enc->output_column_label_alias['moving_history'], 'moving_history'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('domestic_or_not'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('classification'); ?></th>
		<th width="20"><?php echo $this->Paginator->sort('new_or_continuance'); ?></th>
		<th width="20"><?php echo $this->Paginator->sort('sex'); ?></th>
		<th width="20"><?php echo $this->Paginator->sort('recruiting_year'); ?></th>
		<th width="40"><?php echo $this->Paginator->sort('reception_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('assignment_no'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort($enc->output_column_label_alias['this_year_advance_application_date'], 'this_year_advance_application_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('qualification_and_others'); ?></th>
		<th width="120"><?php echo $this->Paginator->sort('ambit'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('represent_researcher_name'); ?></th>
		<th width="120"><?php echo $this->Paginator->sort('department_represent_researcher'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('cooperate_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('personal_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('researcher_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($enc->output_column_label_alias['facility_teacher'],'facility_teacher'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('foreigner_researcher'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('appointment_department'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('appointment_job_title'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('statistical_department'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('institute_code'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('school_code'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('course_code'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort($enc->output_column_label_alias['job_title'], 'job_title'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('major'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('matriculation_number'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('recruit_start_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('recruit_end_date'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('number_of_month'); ?></th>
		<th width="120"><?php echo $this->Paginator->sort('remarks_change'); ?></th>
		<th width="120"><?php echo $this->Paginator->sort('remarks_qualification'); ?></th>
		<th width="120"><?php echo $this->Paginator->sort('remarks'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('research_plan_reception_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('confirmation_statement_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_application_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_distributed_amount_appointment'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('next_year_distributed_amount_appointment'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('next2_year_distributed_amount_appointment'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_distributed_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('next_year_distributed_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('next2_year_distributed_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('titech_assignment_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('research_assignment'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('acceptance_statement'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('acceptance_application_reception_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('issue_application_reception_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('total_primary_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('detail_goods_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('detail_travel_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('detail_gratuity_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('detail_other_cost'); ?></th>
		<th width="120"><?php echo $this->Paginator->sort('issue_application_remarks'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('achievement_report_reception_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_primary_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_detail_goods_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_detail_travel_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_detail_gratuity_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_detail_other_cost'); ?></th>
		<th width="120"><?php echo $this->Paginator->sort('achievement_remarks'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('achievement_carried_report_reception_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_carried_primary_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_carried_detail_goods_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_carried_detail_travel_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_carried_detail_gratuity_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('achievement_carried_detail_other_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('carried_titech_assignment_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('balance_carried'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('carried_detail_goods_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('carried_detail_travel_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('carried_detail_gratuity_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('carried_detail_other_cost'); ?></th>
		<th width="120"><?php echo $this->Paginator->sort('remarks_carried'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($enc->output_column_label_alias['fixed_amount'], 'fixed_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($enc->output_column_label_alias['turnback_amount'], 'turnback_amount'); ?></th>
		<th width="120"><?php echo $this->Paginator->sort('remarks_balance_fixed_turnback'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($enc->output_column_label_alias['extension'], 'extension'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($enc->output_column_label_alias['fax'], 'fax'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($enc->output_column_label_alias['email'], 'email'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($enc->output_column_label_alias['mobile_phone'], 'mobile_phone'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort($enc->output_column_label_alias['post_no'], 'post_no'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('extension_researcher'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($enc->output_column_label_alias['received_researcher_email'], 'received_researcher_email'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($encourages as $encourage):
		$class = "";
		if($encourage["Encourage"]["disabled"]) {
			$class = ' class="disabled"';
		}
		$editing = "";
		if(in_array($encourage["Encourage"]["id"], $current_editing)) {
			$editing = "★";
		}
		$item = $encourage["Encourage"];
	?>
	<tr<?php echo $class;?>>
		<td class="actions">
			<?php if($can_view): ?>
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $encourage['Encourage']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
			<?php endif; ?>
			<?php if($can_edit): ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $encourage['Encourage']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
			<?php endif; ?>
			<?php echo $editing; ?>
		</td>
		<td><?php echo $this->Kendb->print_date($item['updated']); ?>&nbsp;</td>
		<td><?php echo $item['updated_by']; ?>&nbsp;</td>
		<td><?php echo h($item['id']); ?>&nbsp;</td>
		<td><?php echo h($item['year']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['appointment_date']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['decision_date']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['payment_date']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->shorten_string($item['moving_history']); ?>&nbsp;</td>
		<td><?php echo h($item['domestic_or_not']); ?>&nbsp;</td>
		<td><?php echo h($item['classification']); ?>&nbsp;</td>
		<td><?php echo h($item['new_or_continuance']); ?>&nbsp;</td>
		<td><?php echo h($item['sex']); ?>&nbsp;</td>
		<td><?php echo h($item['recruiting_year']); ?>&nbsp;</td>
		<td><?php echo h($item['reception_no']); ?>&nbsp;</td>
		<td><?php echo h($item['assignment_no']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['this_year_advance_application_date']); ?>&nbsp;</td>
		<td><?php echo h($item['qualification_and_others']); ?>&nbsp;</td>
		<td><?php echo h($item['ambit']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->makeResearcherLink($item['represent_researcher_name'], $item['researcher_no']); ?>&nbsp;</td>
		<td><?php echo h($item['department_represent_researcher']); ?>&nbsp;</td>
		<td><?php echo h($item['cooperate_no']); ?>&nbsp;</td>
		<td><?php echo h($item['personal_no']); ?>&nbsp;</td>
		<td><?php echo h($item['researcher_no']); ?>&nbsp;</td>
		<td><?php echo h($item['facility_teacher']); ?>&nbsp;</td>
		<td><?php echo h($item['foreigner_researcher']); ?>&nbsp;</td>
		<td><?php echo h($item['appointment_department']); ?>&nbsp;</td>
		<td><?php echo h($item['appointment_job_title']); ?>&nbsp;</td>
		<td><?php echo h($item['statistical_department']); ?>&nbsp;</td>
		<td><?php echo h($item['institute_code']); ?>&nbsp;</td>
		<td><?php echo h($item['school_code']); ?>&nbsp;</td>
		<td><?php echo h($item['course_code']); ?>&nbsp;</td>
		<td><?php echo h($item['job_title']); ?>&nbsp;</td>
		<td><?php echo h($item['major']); ?>&nbsp;</td>
		<td><?php echo h($item['matriculation_number']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['recruit_start_date']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['recruit_end_date']); ?>&nbsp;</td>
		<td><?php echo h($item['number_of_month']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->shorten_string($item['remarks_change']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->shorten_string($item['remarks_qualification']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->shorten_string($item['remarks']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['research_plan_reception_date']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['confirmation_statement_date']); ?>&nbsp;</td>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'this_year_application_amount', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'this_year_distributed_amount_appointment', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'next_year_distributed_amount_appointment', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'next2_year_distributed_amount_appointment', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'this_year_distributed_amount', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'next_year_distributed_amount', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'next2_year_distributed_amount', null, "num", "number"); ?>
		<td><?php echo h($item['titech_assignment_no']); ?>&nbsp;</td>
		<td><?php echo h($item['research_assignment']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['acceptance_statement']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['acceptance_application_reception_date']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['issue_application_reception_date']); ?>&nbsp;</td>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'total_primary_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'detail_goods_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'detail_travel_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'detail_gratuity_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'detail_other_cost', null, "num", "number"); ?>
		<td><?php echo $this->Kendb->shorten_string($item['issue_application_remarks']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['achievement_report_reception_date']); ?>&nbsp;</td>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_primary_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_detail_goods_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_detail_travel_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_detail_gratuity_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_detail_other_cost', null, "num", "number"); ?>
		<td><?php echo $this->Kendb->shorten_string($item['achievement_remarks']); ?>&nbsp;</td>
		<td><?php echo $this->Kendb->print_date($item['achievement_carried_report_reception_date']); ?>&nbsp;</td>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_primary_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_detail_goods_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_detail_travel_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_detail_gratuity_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'achievement_carried_detail_other_cost', null, "num", "number"); ?>
		<td><?php echo h($item['carried_titech_assignment_no']); ?>&nbsp;</td>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'balance_carried', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'carried_detail_goods_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'carried_detail_travel_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'carried_detail_gratuity_cost', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'carried_detail_other_cost', null, "num", "number"); ?>
		<td><?php echo $this->Kendb->shorten_string($item['remarks_carried']); ?>&nbsp;</td>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'fixed_amount', null, "num", "number"); ?>
		<?php echo $this->Kendb->writeCell($encourage, "Encourage", 'turnback_amount', null, "num", "number"); ?>
		<td><?php echo $this->Kendb->shorten_string($item['remarks_balance_fixed_turnback']); ?>&nbsp;</td>
		<td><?php echo h($item['extension']); ?>&nbsp;</td>
		<td><?php echo h($item['fax']); ?>&nbsp;</td>
		<td><?php echo h($item['email']); ?>&nbsp;</td>
		<td><?php echo h($item['mobile_phone']); ?>&nbsp;</td>
		<td><?php echo h($item['post_no']); ?>&nbsp;</td>
		<td><?php echo h($item['extension_researcher']); ?>&nbsp;</td>
		<td><?php echo h($item['received_researcher_email']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>

<?php echo $this->element("paginate"); ?>

<?php echo $this->element("form_tips"); ?>

<?php echo $this->element("table_switcher_foot"); ?>



</div>
