<div id="snavi">
	<ul>
		<?php if($can_add): ?>
		<li><?php echo $this->Html->link(__('New Other Research Grant', true), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/other_research_grants/output_excel') . $urlparams . "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/other_research_grants/output_excel') . $urlparams . "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/other_research_grants/output_csv') . $urlparams; ?>">CSV形式ダウンロード</a></li>
		<?php endif; ?>
	</ul>
</div>
<?php echo $this->element("crumbs"); ?>

<script type="text/javascript">
function search_box_change(n) {
	$('#searchbox').html("検索ボックス作成中。しばらくお待ちください...");
	var url = "<?php echo $html->url('/other_research_grants/search_box/'); ?>";
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

<?php echo $this->element("table_switcher_head", array("count" => count($otherResearchGrants))); ?>

<div class="otherResearchGrants index">
	<h2><?php __('Other Research Grants');?></h2>

<div style="border:4px solid #ccc; padding:4px; width:500px; font-size:14px; font-weight:bold; color:red">
平成24年度以降のデータは、「その他補助金」をご覧下さい。
</div>
<br clear="all" />

	<?php echo $this->element("data_search", array("modelname" => "OtherResearchGrant")); ?>
	<div id="searchbox_toggle">
	<a href="javascript:void(0);" onclick="javascript:search_box_change('3');return false;">カスタム検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('1');return false;">プロジェクトデータで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('2');return false;">データ件数と範囲を指定</a> |
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
		<th width="65"><?php echo $this->Paginator->sort('grant_initial_appointment_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('grant_initial_decision_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('paying_for_day'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('moving_history'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('business_name'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('titech_assignment_no'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('assignment_no'); ?></th>
		<th width="40"><?php echo $this->Paginator->sort('new_or_continuance'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('cooperate_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('personal_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('researcher_no'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('name'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('represent_researcher'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('notifying_department'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('statistical_department'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('affiliated_major_name'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('statistical_job'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('institute_code'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('school_code'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('course_code'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_application_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_total_at_decision'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_direct_at_decision'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_indirect_at_decision'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_application_amount_sum'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_direct_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('this_year_indirect_cost'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('research_assignment'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('contribution_count'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('contribution_partition'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('contribution_remarks'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('research_start_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('research_end_date'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('project_start_year'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('project_end_year'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('remarks'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('extension'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('fax'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('post_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('email'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($otherResearchGrants as $otherResearchGrant):
			$class = null;
			if($otherResearchGrant["OtherResearchGrant"]["disabled"]) {
				$class = ' class="disabled"';
			}
			$item = $otherResearchGrant["OtherResearchGrant"];
			$editing = "";
			if(in_array($item["id"], $current_editing)) {
				$editing = "★";
			}
	?>
	<tr<?php echo $class;?>>
			<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $otherResearchGrant['OtherResearchGrant']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
			<?php if($can_edit): ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $otherResearchGrant['OtherResearchGrant']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
			<?php endif; ?>
			<?php echo $editing; ?>
			</td>
			<td><?php echo $this->Kendb->print_date($item['updated']); ?>&nbsp;</td>
			<td><?php echo h($item['updated_by']); ?>&nbsp;</td>
			<td><?php echo h($item['id']); ?>&nbsp;</td>
			<td><?php echo h($item['year']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['grant_initial_appointment_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['grant_initial_decision_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['payment_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['paying_for_day']); ?>&nbsp;</td>
			<td><?php echo h($item['moving_history']); ?>&nbsp;</td>
			<td><?php echo h($item['business_name']); ?>&nbsp;</td>
			<td><?php echo h($item['titech_assignment_no']); ?>&nbsp;</td>
			<td><?php echo h($item['assignment_no']); ?>&nbsp;</td>
			<td><?php echo h($item['new_or_continuance']); ?>&nbsp;</td>
			<td><?php echo h($item['cooperate_no']); ?>&nbsp;</td>
			<td><?php echo h($item['personal_no']); ?>&nbsp;</td>
			<td><?php echo h($item['researcher_no']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->makeResearcherLink($item['name'], $item['researcher_no']); ?>&nbsp;</td>
			<td><?php echo h($item['represent_researcher']); ?>&nbsp;</td>
			<td><?php echo h($item['notifying_department']); ?>&nbsp;</td>
			<td><?php echo h($item['statistical_department']); ?>&nbsp;</td>
			<td><?php echo h($item['affiliated_major_name']); ?>&nbsp;</td>
			<td><?php echo h($item['statistical_job']); ?>&nbsp;</td>
			<td><?php echo h($item['institute_code']); ?>&nbsp;</td>
			<td><?php echo h($item['school_code']); ?>&nbsp;</td>
			<td><?php echo h($item['course_code']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_application_amount', null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_total_at_decision', null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_direct_at_decision', null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_indirect_at_decision', null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_application_amount_sum', null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_direct_cost', null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'this_year_indirect_cost', null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($item['research_assignment']); ?>&nbsp;</td>
			<td><?php echo h($item['contribution_count']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($otherResearchGrant, "OtherResearchGrant", 'contribution_partition', null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($item['contribution_remarks']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['research_start_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['research_end_date']); ?>&nbsp;</td>
			<td><?php echo h($item['project_start_year']); ?>&nbsp;</td>
			<td><?php echo h($item['project_end_year']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['remarks']); ?>&nbsp;</td>
			<td><?php echo h($item['extension']); ?>&nbsp;</td>
			<td><?php echo h($item['fax']); ?>&nbsp;</td>
			<td><?php echo h($item['post_no']); ?>&nbsp;</td>
			<td><?php echo h($item['email']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>

	<?php echo $this->element("paginate"); ?>

<?php echo $this->element("form_tips"); ?>

<?php echo $this->element("table_switcher_foot"); ?>



</div>
