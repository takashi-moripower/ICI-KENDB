<div id="snavi">
	<ul>
		<?php if($can_add): ?>
		<li><?php echo $this->Html->link(__('New Donation', true), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/donations/output_excel') . $urlparams . "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/donations/output_excel') . $urlparams . "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/donations/output_csv') . $urlparams; ?>">CSV形式ダウンロード</a></li>
		<?php endif; ?>
	</ul>
</div>
<?php echo $this->element("crumbs"); ?>

<script type="text/javascript">
function search_box_change(n) {
	$('#searchbox').html("検索ボックス作成中。しばらくお待ちください...");
	var url = "<?php echo $html->url('/donations/search_box/'); ?>";
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

<?php echo $this->element("table_switcher_head", array("count" => count($donations))); ?>

<?php $don = new Donation(); ?>

<div class="donations index">
	<h2><?php __('Donations');?></h2>
	<?php echo $this->element("data_search", array("modelname" => "Donation")); ?>
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
			<th width="30"><?php echo $this->Paginator->sort('year'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('section_in_charge'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('receipt_no'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('receipt_send_date'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('remarks_receipt'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('payment_date'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('contract_resolution_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('income_section_code'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('income_section_name'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('contract_obligation'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('contract_obligation_name'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('planned_income'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('foreign_money_type'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('planned_income_foreign'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('income_yen'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('subsidy_type'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('project_code'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('project_code_name'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('vouching_remarks'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('payment_due'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('contraction_date'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('contract_resolution_detail_no'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('division_count'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('detail_remarks'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('research_promotion_name'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('research_promotion_year'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('research_promotion_remarks'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('variety'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('remarks'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('obligation_name'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ob_represent_name'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ob_job_title'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('common_cost_check'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('common_cost'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('ob_postal_code'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('ob_address'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ob_section'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('ob_person_in_charge'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort($don->output_column_label_alias['researcher_name'], 'researcher_name'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort($don->output_column_label_alias['major_name'], 'major_name'); ?></th>

			<th width="120"><?php echo $this->Paginator->sort('institute_code'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('school_code'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('course_code'); ?></th>

			<th width="40"><?php echo $this->Paginator->sort('job_title'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('extension'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('email'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('post_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('cooperate_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('researcher_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('personal_no'); ?></th>
		</tr>
	</thead>
	<tbody>

	<?php
	$i = 0;
	foreach ($donations as $donation):
		$class = "";
		if($donation["Donation"]["disabled"]) {
			$class = ' class="disabled"';
		}
		$editing = "";
		if(in_array($donation["Donation"]["id"], $current_editing)) {
			$editing = "★";
		}
		$item = $donation["Donation"];
	?>
	<tr<?php echo $class;?>>
			<td class="actions">
				<?php if($can_view): ?>
				<?php echo $this->Html->link(__('View', true), array('action' => 'view', $donation['Donation']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
				<?php endif; ?>
				<?php if($can_edit): ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $donation['Donation']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
				<?php endif; ?>
				<?php echo $editing; ?>
			</td>
			<td><?php echo $this->Kendb->print_date($item['updated']); ?>&nbsp;</td>
			<td><?php echo $item['updated_by']; ?>&nbsp;</td>
			<td><?php echo h($item['id']); ?>&nbsp;</td>
			<td><?php echo h($item['year']); ?>&nbsp;</td>
			<td><?php echo h($item['section_in_charge']); ?>&nbsp;</td>
			<td><?php echo h($item['receipt_no']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['receipt_send_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['remarks_receipt']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['payment_date']); ?>&nbsp;</td>
			<td><?php echo h($item['contract_resolution_no']); ?>&nbsp;</td>
			<td><?php echo h($item['income_section_code']); ?>&nbsp;</td>
			<td><?php echo h($item['income_section_name']); ?>&nbsp;</td>
			<td><?php echo h($item['contract_obligation']); ?>&nbsp;</td>
			<td><?php echo h($item['contract_obligation_name']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($donation, "Donation", "planned_income", null, "num", "number"); ?>
			<td><?php echo h($item['foreign_money_type']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($donation, "Donation", "planned_income_foreign", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($donation, "Donation", "income_yen", null, "num", "number"); ?>
			<td><?php echo h($item['subsidy_type']); ?>&nbsp;</td>
			<td><?php echo h($item['project_code']); ?>&nbsp;</td>
			<td><?php echo h($item['project_code_name']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['vouching_remarks']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['payment_due']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($item['contraction_date']); ?>&nbsp;</td>
			<td><?php echo h($item['contract_resolution_detail_no']); ?>&nbsp;</td>
			<td><?php echo h($item['division_count']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['detail_remarks']); ?>&nbsp;</td>
			<td><?php echo h($item['research_promotion_name']); ?>&nbsp;</td>
			<td><?php echo h($item['research_promotion_year']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['research_promotion_remarks']); ?>&nbsp;</td>
			<td><?php echo h($item['variety']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($item['remarks']); ?>&nbsp;</td>
			<td><?php echo h($item['obligation_name']); ?>&nbsp;</td>
			<td><?php echo h($item['ob_represent_name']); ?>&nbsp;</td>
			<td><?php echo h($item['ob_job_title']); ?>&nbsp;</td>
			<td><?php echo h($item['common_cost_check']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($donation, "Donation", "common_cost", null, "num", "number"); ?>
			<td><?php echo h($item['ob_postal_code']); ?>&nbsp;</td>
			<td><?php echo h($item['ob_address']); ?>&nbsp;</td>
			<td><?php echo h($item['ob_section']); ?>&nbsp;</td>
			<td><?php echo h($item['ob_person_in_charge']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->makeResearcherLink($item['researcher_name'], $item['researcher_no']); ?>&nbsp;</td>
			<td><?php echo h($item['major_name']); ?>&nbsp;</td>

			<td><?php echo h($item['institute_code']); ?></td>
			<td><?php echo h($item['school_code']); ?></td>
			<td><?php echo h($item['course_code']); ?></td>

			<td><?php echo h($item['job_title']); ?>&nbsp;</td>
			<td><?php echo h($item['extension']); ?>&nbsp;</td>
			<td><?php echo h($item['email']); ?>&nbsp;</td>
			<td><?php echo h($item['post_no']); ?>&nbsp;</td>
			<td><?php echo h($item['cooperate_no']); ?>&nbsp;</td>
			<td><?php echo h($item['researcher_no']); ?>&nbsp;</td>
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
