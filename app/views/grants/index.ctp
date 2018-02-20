<div id="snavi">
	<ul>
		<?php if($can_add): ?>
		<li><?php echo $this->Html->link(__('New Grant', true), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/grants/output_excel') . $urlparams . "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/grants/output_excel') . $urlparams . "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/grants/output_csv') . $urlparams; ?>">CSV形式ダウンロード</a></li>
		<?php endif; ?>
	</ul>
</div>
<?php echo $this->element("crumbs"); ?>

<script type="text/javascript">
	function search_box_change(n) {
		$('#searchbox').html("検索ボックス作成中。しばらくお待ちください...");
		var url = "<?php echo $html->url('/grants/search_box/'); ?>";
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

<?php echo $this->element("table_switcher_head", array("count" => count($grants))); ?>

<div class="grants index">
	<h2><?php __('Grants'); ?></h2>
	<?php echo $this->element("data_search", array("modelname" => "Grant")); ?>
	<div id="searchbox_toggle">
		<a href="javascript:void(0);" onclick="javascript:search_box_change('1');return false;">基本情報で検索</a> |
		<a href="javascript:void(0);" onclick="javascript:search_box_change('2');return false;">事業情報内容で検索</a> |
		<a href="javascript:void(0);" onclick="javascript:search_box_change('3');return false;">その他データで検索</a> |
		<a href="javascript:void(0);" onclick="javascript:search_box_change('4');return false;">データ件数と範囲を指定</a> |
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
					<th width="60" class="actions"><?php __('Actions'); ?></th>
					<th width="20"><?php echo $this->Paginator->sort('id'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('updated'); ?></th>
					<th width="40"><?php echo $this->Paginator->sort('updated_by'); ?></th>
					<th width="30"><?php echo $this->Paginator->sort('year'); ?></th>
					<th width="30"><?php echo $this->Paginator->sort('adoption_year'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('cooperate_no'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('researcher_no'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('project_code'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('assignment_no'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('grant_name'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('grant_project_name'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('project_assignment_name'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('grant_initial_decision_date'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('grant_initial_start_date'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('grant_initial_end_date'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('grant_this_year_decision_date'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('grant_this_year_start_date'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('grant_this_year_end_date'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('represent_type'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('represent_researcher_name'); ?></th>
					<th width="30"><?php echo $this->Paginator->sort('job_title'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('department'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('major_name'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('institute_code'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('school_code'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('course_code'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('grant_funds_institute'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('grant_delivery_institute'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('delegate_1'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('delegate_2'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('delegate_3'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('delegate_4'); ?></th>
					<th width="30"><?php echo $this->Paginator->sort('singular_or_multi'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('balance_carried_forward'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('grant_this_year_decision_money'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('grant_this_year_reception_amount'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('primary_cost'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('indirect_cost'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('general_administration_cost'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('self_contribute_money'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('other_cost'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('delegate_1_money'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('delegate_2_money'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('delegate_3_money'); ?></th>
					<th width="60"><?php echo $this->Paginator->sort('delegate_4_money'); ?></th>
					<th width="30"><?php echo $this->Paginator->sort('billing_type'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('kaken_system_registration_date'); ?></th>
					<th width="65"><?php echo $this->Paginator->sort('reception_status_entry_date'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('remarks1'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('remarks2'); ?></th>
					<th width="120"><?php echo $this->Paginator->sort('remarks3'); ?></th>

				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach ($grants as $grant):
					$class = "";
		if($grant["Grant"]["disabled"]) {
			$class = ' class="disabled"';
		} else {
			if(isset($grant["GrantNode"]) && count($grant["GrantNode"]) >= 2) {
				$class = ' class="haschild"';
			}
		}
					$editing = "";
					if (in_array($grant["Grant"]["id"], $current_editing)) {
						$editing = "★";
					}
				?>
				<tr<?php echo $class; ?>>
					<td class="actions">
					<?php if($grant["Grant"]["grant_id"] == null): ?>
					<?php echo $this->Html->link(__('View', true), array('action' => 'view', $grant['Grant']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
					<?php if($can_edit): ?>
					<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $grant['Grant']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
					<?php endif; ?>
					<?php echo $editing; ?>
					<?php else: ?>
					<a href="<?php echo $html->url('/grants/view/'.$grant["Grant"]["grant_id"]); ?>">明細</a>
					<?php endif; ?>
				</td>
			<?php echo $this->element("grants/row", array("grant" => $grant, "child" => false)); ?>
			</tr>
		<?php if(isset($grant["GrantNode"]) && count($grant["GrantNode"]) >= 2): ?>
		<?php foreach($grant["GrantNode"] as $item): ?>
		<tr class="child">
		<td align="right"><?php echo $html->image('badge.png', array('width' => 16, 'height' => 16)); ?></td>
		<?php $item2["Grant"] = $item; ?>
		<?php echo $this->element("grants/row", array("grant" => $item2, "child" => true)); ?>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>

			<?php endforeach; ?>
		</tbody>
		</table>
		</div>

	<?php echo $this->element("paginate"); ?>

	<?php echo $this->element("form_tips"); ?>

	<?php echo $this->element("table_switcher_foot"); ?>


</div>
