<div id="snavi">
	<ul>
		<?php if($can_add): ?>
		<li><?php echo $this->Html->link(__('New Assessed Contribution', true), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/assessed_contributions/output_excel') . $urlparams . "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/assessed_contributions/output_excel') . $urlparams . "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/assessed_contributions/output_csv') . $urlparams; ?>">CSV形式ダウンロード</a></li>
		<?php endif; ?>
	</ul>
</div>
<?php echo $this->element("crumbs"); ?>

<script type="text/javascript">
function search_box_change(n) {
	$('#searchbox').html("検索ボックス作成中。しばらくお待ちください...");
	var url = "<?php echo $html->url('/assessed_contributions/search_box/'); ?>";
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


<?php echo $this->element("table_switcher_head", array("count" => count($assessedContributions))); ?>

<div class="assessedContributions index">
	<h2><?php __('Assessed Contributions');?></h2>
	<?php echo $this->element("data_search", array("modelname" => "AssessedContribution")); ?>
	<div id="searchbox_toggle">
	<a href="javascript:void(0);" onclick="javascript:search_box_change('7');return false;">カスタム検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('1');return false;">プロジェクトデータで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('2');return false;">受入手続データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('3');return false;">配分額変更手続データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('4');return false;">報告手続データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('5');return false;">担当連絡先等データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('6');return false;">データ件数と範囲を指定</a> |
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
				<th width="40"><?php echo $this->Paginator->sort('year'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('representative_affiliation'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('representative_department'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('representative_job_type'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('representative_name'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('cooperate_no'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('personal_no'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('co_researcher_no'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('co_researcher_department'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('co_researcher_major_name'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('institute_code'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('school_code'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('course_code'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('co_researcher_job_type'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('department_no'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('co_researcher_name'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('post_no'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('extension'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('fax'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('email'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('moving_history'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('research_type'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('title_no'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('titech_assignment_no'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('project'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('primary_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('detail_good_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('detail_trip_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('detail_reward_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('detail_other'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('indirect_cost'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('remarks'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('is_distributed_amount_change'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('distributed_amount_change'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('change_detail_good_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('change_detail_trip_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('change_detail_reward_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('change_detail_other'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('change_indirect_cost'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('remarks_distributed_change'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('contribution_repartition_official_letter'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('detail_cost_check'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('recept_commission_request_date'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('recept_commission_recept_date'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('request_transfer'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('representative_organization_send'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('payment_date'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('recovery_date'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('payment_confirmed_date'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('research_plan_contact'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('contribution_repartition_official_letter_distributed_change'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('detail_cost_check_amount_change'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('recept_commission_request_date_distributed_change'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('recept_commission_recept_date_distributed_change'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('request_transfer_distributed_change'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('representative_organization_send_distributed_change'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('payment_date_distributed_change'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('recovery_date_distributed_change'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('payment_confirmed_date_distributed_change'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('research_plan_contact_distributed_change'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('remarks_distributed_change_process'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('exhibit_overdue'); ?></th>
				<th width="65"><?php echo $this->Paginator->sort('exhibit_induction_date'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('real_primary_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('expense_detail_goods_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('expense_detail_trip_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('expense_detail_reward_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('expense_detail_other'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('real_indirect_cost'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('turnback_payment_amount'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('turnback_indirect_amount'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('remarks'); ?></th>
				<th width="60"><?php echo $this->Paginator->sort('represent_postal_no'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('address'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('research_institute_name'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('office_in_charge'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('person_in_charge'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('tel_in_charge'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('fax_in_charge'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('email_in_charge'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('other_contact_in_charge'); ?></th>
				<th width="100"><?php echo $this->Paginator->sort('remarks_other'); ?></th>
			</tr>
		</thead>
		<tbody>
	<?php
	$i = 0;
	foreach ($assessedContributions as $assessedContribution):
			$class = null;
			if($assessedContribution["AssessedContribution"]["disabled"]) {
				$class = ' class="disabled"';
			}
			$item = $assessedContribution["AssessedContribution"];
						$editing = "";
			if(in_array($item["id"], $current_editing)) {
				$editing = "★";
			}
	?>
	<tr<?php echo $class;?>>
			<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $assessedContribution['AssessedContribution']['id'], '?rtn='. $_SERVER["REQUEST_URI"])); ?>
			<?php if($can_edit): ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $assessedContribution['AssessedContribution']['id'], '?rtn='. $_SERVER["REQUEST_URI"])); ?>
			<?php endif; ?>
			<?php echo $editing; ?>
			</td>
			<td><?php echo $this->Kendb->print_date($item['updated']); ?>&nbsp;</td>
			<td><?php echo h($item['updated_by']); ?>&nbsp;</td>
			<td><?php echo h($item['id']); ?>&nbsp;</td>
			<td><?php echo h($item['year']); ?>&nbsp;</td>
			<td><?php echo h($item['representative_affiliation']); ?>&nbsp;</td>
			<td><?php echo h($item['representative_department']); ?>&nbsp;</td>
			<td><?php echo h($item['representative_job_type']); ?>&nbsp;</td>
			<td><?php echo h($item['representative_name']); ?>&nbsp;</td>
			<td><?php echo h($item['cooperate_no']); ?>&nbsp;</td>
			<td><?php echo h($item['personal_no']); ?>&nbsp;</td>
			<td><?php echo h($item['co_researcher_no']); ?>&nbsp;</td>
			<td><?php echo h($item['co_researcher_department']); ?>&nbsp;</td>
			<td><?php echo h($item['co_researcher_major_name']); ?>&nbsp;</td>
			<td><?php echo h($item['institute_code']); ?>&nbsp;</td>
			<td><?php echo h($item['school_code']); ?>&nbsp;</td>
			<td><?php echo h($item['course_code']); ?>&nbsp;</td>
			<td><?php echo h($item['co_researcher_job_type']); ?>&nbsp;</td>
			<td><?php echo h($item['department_no']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->makeResearcherLink($item['co_researcher_name'], $item["co_researcher_no"]); ?>&nbsp;</td>
			<td><?php echo h($item['post_no']); ?>&nbsp;</td>
			<td><?php echo h($item['extension']); ?>&nbsp;</td>
			<td><?php echo h($item['fax']); ?>&nbsp;</td>
			<td><?php echo h($item['email']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['moving_history']); ?>&nbsp;</td>
			<td><?php echo h($item['research_type']); ?>&nbsp;</td>
			<td><?php echo h($item['title_no']); ?>&nbsp;</td>
			<td><?php echo h($item['titech_assignment_no']); ?>&nbsp;</td>
			<td><?php echo h($item['project']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "primary_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_good_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_trip_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_reward_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "detail_other", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "indirect_cost", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($item['remarks']); ?>&nbsp;</td>
			<td><?php echo h($item['is_distributed_amount_change']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "distributed_amount_change", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_detail_good_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_detail_trip_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_detail_reward_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_detail_other", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "change_indirect_cost", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($item['remarks_distributed_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['contribution_repartition_official_letter']); ?>&nbsp;</td>
			<td><?php echo h($item['detail_cost_check']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['recept_commission_request_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['recept_commission_recept_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['request_transfer']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['representative_organization_send']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['payment_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['recovery_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['payment_confirmed_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['research_plan_contact']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['contribution_repartition_official_letter_distributed_change']); ?>&nbsp;</td>
			<td><?php echo h($item['detail_cost_check_amount_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['recept_commission_request_date_distributed_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['recept_commission_recept_date_distributed_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['request_transfer_distributed_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['representative_organization_send_distributed_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['payment_date_distributed_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['recovery_date_distributed_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['payment_confirmed_date_distributed_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['research_plan_contact_distributed_change']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['remarks_distributed_change_process']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['exhibit_overdue']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['exhibit_induction_date']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "real_primary_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "expense_detail_goods_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "expense_detail_trip_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "expense_detail_reward_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "expense_detail_other", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "real_indirect_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "turnback_payment_amount", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($assessedContribution, "AssessedContribution", "turnback_indirect_amount", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($item['remarks']); ?>&nbsp;</td>
			<td><?php echo h($item['represent_postal_no']); ?>&nbsp;</td>
			<td><?php echo h($item['address']); ?>&nbsp;</td>
			<td><?php echo h($item['research_institute_name']); ?>&nbsp;</td>
			<td><?php echo h($item['office_in_charge']); ?>&nbsp;</td>
			<td><?php echo h($item['person_in_charge']); ?>&nbsp;</td>
			<td><?php echo h($item['tel_in_charge']); ?>&nbsp;</td>
			<td><?php echo h($item['fax_in_charge']); ?>&nbsp;</td>
			<td><?php echo h($item['email_in_charge']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['other_contact_in_charge']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['remarks_other']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>

<?php echo $this->element("paginate"); ?>

<?php echo $this->element("form_tips"); ?>

<?php echo $this->element("table_switcher_foot"); ?>



</div>
