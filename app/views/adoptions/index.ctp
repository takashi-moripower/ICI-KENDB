<div id="snavi">
	<ul>
		<?php if($can_add): ?>
		<li><?php echo $this->Html->link(__('New Adoption', true), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/adoptions/output_excel') . $urlparams . "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/adoptions/output_excel') . $urlparams . "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/adoptions/output_csv') . $urlparams; ?>">CSV形式ダウンロード</a></li>
		<?php endif; ?>
	</ul>
</div>
<?php echo $this->element("crumbs"); ?>

<script type="text/javascript">
function search_box_change(n) {
	$('#searchbox').html("検索ボックス作成中。しばらくお待ちください...");
	var url = "<?php echo $html->url('/adoptions/search_box/'); ?>";
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

<?php echo $this->element("table_switcher_head", array("count" => count($adoptions))); ?>

<div class="adoptions index">
	<h2><?php __('Adoptions');?></h2>
	<?php echo $this->element("data_search", array("modelname" => "Adoption")); ?>
	<div id="searchbox_toggle">
	<a href="javascript:void(0);" onclick="javascript:search_box_change('9');return false;">カスタム検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('1');return false;">プロジェクトデータで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('2');return false;">交付申請データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('3');return false;">実績報告データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('4');return false;">繰越データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('5');return false;">額の返還・確定データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('6');return false;">自己評価・成果データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('7');return false;">連絡先・その他データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('8');return false;">データ件数と範囲を指定</a> |
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
			<th width="30"><?php echo $this->Paginator->sort('year'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('type_no'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('grant_delivery_institute'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('appointment_date'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('decision_date'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('payment_date'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('advance_application_reception_date'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('move_out_in_etc'); ?></th>
			<th width="100"><?php echo $this->Paginator->sort('research_type'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('screening'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('end_before_application'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('contribution'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('detail_ambit_no'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('division_a_b'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('research_number_points'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('arrange_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('problem_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('new_or_continuance'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('name'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('department'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('notifying_department'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('statistical_department'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('major_name'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('institute_code'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('school_code'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('course_code'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('application_job'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('current_job_title'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('statistical_job'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('this_year_application_amount'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('current_payment_sum_appointment'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('current_payment_d_appointment'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('current_payment_i_appointment'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next1_payment_d_appointment'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next2_payment_d_appointment'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next3_payment_d_appointment'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next4_payment_d_appointment'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next5_payment_d_appointment'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('本年度合計', 'current_payment_sum'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('current_payment_d'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('current_payment_i'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next1_payment_d'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next2_payment_d'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next3_payment_d'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next4_payment_d'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('next5_payment_d'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('researcher_no'); ?></th>
			<th width="100"><?php echo $this->Paginator->sort('researcher_assignment'); ?></th>
			<th width="100"><?php echo $this->Paginator->sort('remarks1'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('grant_reception_date'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('total_primary_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('detail_goods_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('detail_travel_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('detail_gratuity_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('detail_other_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('remarks_issue_application'); ?></th>
			<th width="20"><?php echo $this->Paginator->sort('contribution_count'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('contribution_amount'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('分配金実配分額', 'contribution_partition'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('adjudicator'); ?></th>
			<th width="100"><?php echo $this->Paginator->sort('contribution_remarks'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('実績報告書受付日', 'achievement_report_reception_date'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_primary_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_detail_goods_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_detail_travel_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_detail_gratuity_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_detail_other_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_indirect_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_remarks'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('achievement_carried_report_reception_date'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_carried_primary_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_carried_detail_goods_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_carried_detail_travel_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_carried_detail_gratuity_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_carried_detail_other_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('achievement_carried_indirect_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('carried_titech_assignment_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('carried_primary_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('carried_detail_goods_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('carried_detail_travel_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('carried_detail_gratuity_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('carried_detail_other_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('carried_indirect_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('process_carried_remarks'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('fixed_amount'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('fixed_amount_primary_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('fixed_amount_indirect_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('turnback_amount'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('turnback_amount_primary_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('turnback_amount_indirect_cost'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('turnback_amount_remarks'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('self_assessment_person'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('self_assessment_date'); ?></th>
			<th width="100"><?php echo $this->Paginator->sort('self_assessment_remarks'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('accomplishment_object_person'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('accomplishment_date'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('process_date'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('accomplishment_scheduled_date'); ?></th>
			<th width="100"><?php echo $this->Paginator->sort('accomplishment_remarks'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('extension'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('fax'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('post_no'); ?></th>
			<th width="100"><?php echo $this->Paginator->sort('email'); ?></th>
			<th width="100"><?php echo $this->Paginator->sort('special_mention'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('cooperate_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('personal_no'); ?></th>
	</tr>
		</thead>
		<tbody>
	<?php
	$i = 0;
	foreach ($adoptions as $adoption):
			$class = null;
			if($adoption["Adoption"]["disabled"]) {
				$class = ' class="disabled"';
			}
			$item = $adoption["Adoption"];
			$editing = "";
			if(in_array($adoption["Adoption"]["id"], $current_editing)) {
				$editing = "★";
			}
	?>
	<tr<?php echo $class;?>>
			<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $adoption['Adoption']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
			<?php if($can_edit): ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $adoption['Adoption']['id'], '?rtn='.$_SERVER["REQUEST_URI"] )); ?>
			<?php endif; ?>
			<?php echo $editing; ?>
			</td>
			<td><?php echo $this->Kendb->print_date($item['updated']); ?>&nbsp;</td>
			<td><?php echo h($item['updated_by']); ?>&nbsp;</td>
			<td><?php echo h($item['id']); ?>&nbsp;</td>
			<td><?php echo h($item['year']); ?>&nbsp;</td>
			<td><?php echo h($item['type_no']); ?>&nbsp;</td>
			<td><?php echo h($item['grant_delivery_institute']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['appointment_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['decision_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['payment_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['advance_application_reception_date']); ?>&nbsp;</td>
			<td><?php echo h($item['move_out_in_etc']); ?>&nbsp;</td>
			<td><?php echo h($item['research_type']); ?>&nbsp;</td>
			<td><?php echo h($item['screening']); ?>&nbsp;</td>
			<td><?php echo h($item['end_before_application']); ?>&nbsp;</td>
			<td><?php echo h($item['contribution']); ?>&nbsp;</td>
			<td><?php echo h($item['detail_ambit_no']); ?>&nbsp;</td>
			<td><?php echo h($item['division_a_b']); ?>&nbsp;</td>
			<td><?php echo h($item['research_number_points']); ?>&nbsp;</td>
			<td><?php echo h($item['arrange_no']); ?>&nbsp;</td>
			<td><?php echo h($item['problem_no']); ?>&nbsp;</td>
			<td><?php echo h($item['new_or_continuance']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->makeResearcherLink($item['name'], $item['researcher_no']); ?>&nbsp;</td>
			<td><?php echo h($item['department']); ?>&nbsp;</td>
			<td><?php echo h($item['notifying_department']); ?>&nbsp;</td>
			<td><?php echo h($item['statistical_department']); ?>&nbsp;</td>
			<td><?php echo h($item['major_name']); ?>&nbsp;</td>
			<td><?php echo h($item['institute_code']); ?>&nbsp;</td>
			<td><?php echo h($item['school_code']); ?>&nbsp;</td>
			<td><?php echo h($item['course_code']); ?>&nbsp;</td>
			<td><?php echo h($item['application_job']); ?>&nbsp;</td>
			<td><?php echo h($item['current_job_title']); ?>&nbsp;</td>
			<td><?php echo h($item['statistical_job']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "this_year_application_amount", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "current_payment_sum_appointment", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "current_payment_d_appointment", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "current_payment_i_appointment", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next1_payment_d_appointment", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next2_payment_d_appointment", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next3_payment_d_appointment", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next4_payment_d_appointment", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next5_payment_d_appointment", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "current_payment_sum", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "current_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "current_payment_i", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next1_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next2_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next3_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next4_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "next5_payment_d", null, "num", "number"); ?>
			<td><?php echo h($item['researcher_no']); ?>&nbsp;</td>
			<td><?php echo h($item['researcher_assignment']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['remarks1']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['grant_reception_date']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "total_primary_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "detail_goods_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "detail_travel_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "detail_gratuity_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "detail_other_cost", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($item['remarks_issue_application']); ?>&nbsp;</td>
			<td><?php echo h($item['contribution_count']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "contribution_amount", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "contribution_partition", null, "num", "number"); ?>
			<td><?php echo h($item['adjudicator']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['contribution_remarks']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['achievement_report_reception_date']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_primary_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_detail_goods_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_detail_travel_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_detail_gratuity_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_detail_other_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_indirect_cost", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($item['achievement_remarks']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['achievement_carried_report_reception_date']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_carried_primary_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_carried_detail_goods_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_carried_detail_travel_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_carried_detail_gratuity_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_carried_detail_other_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "achievement_carried_indirect_cost", null, "num", "number"); ?>
			<td><?php echo h($item['carried_titech_assignment_no']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "carried_primary_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "carried_detail_goods_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "carried_detail_travel_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "carried_detail_gratuity_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "carried_detail_other_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "carried_indirect_cost", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($item['process_carried_remarks']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "fixed_amount", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "fixed_amount_primary_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "fixed_amount_indirect_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "turnback_amount", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "turnback_amount_primary_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($adoption, "Adoption", "turnback_amount_indirect_cost", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($item['turnback_amount_remarks']); ?>&nbsp;</td>
			<td><?php echo h($item['self_assessment_person']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['self_assessment_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['self_assessment_remarks']); ?>&nbsp;</td>
			<td><?php echo h($item['accomplishment_object_person']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['accomplishment_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['process_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['accomplishment_scheduled_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['accomplishment_remarks']); ?>&nbsp;</td>
			<td><?php echo h($item['extension']); ?>&nbsp;</td>
			<td><?php echo h($item['fax']); ?>&nbsp;</td>
			<td><?php echo h($item['post_no']); ?>&nbsp;</td>
			<td><?php echo h($item['email']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['special_mention']); ?>&nbsp;</td>
			<td><?php echo h($item['cooperate_no']); ?>&nbsp;</td>
			<td><?php echo h($item['personal_no']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>

<?php echo $this->element("paginate"); ?>

<?php echo $this->element("form_tips"); ?>

<?php echo $this->element("table_switcher_foot"); ?>



</div>

