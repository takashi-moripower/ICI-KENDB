<div id="snavi">
	<ul>
		<?php if($can_add): ?>
		<li><?php echo $this->Html->link(__('New Entrust', true), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/entrusts/output_excel') . $urlparams . "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/entrusts/output_excel') . $urlparams . "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/entrusts/output_csv') . $urlparams; ?>">CSV形式ダウンロード</a></li>
		<?php endif; ?>
	</ul>
</div>
<?php echo $this->element("crumbs"); ?>

<script type="text/javascript">
function search_box_change(n) {
	$('#searchbox').html("検索ボックス作成中。しばらくお待ちください...");
	var url = "<?php echo $html->url('/entrusts/search_box/'); ?>";
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

<?php echo $this->element("table_switcher_head", array("count" => count($entrusts))); ?>

<div class="entrusts index">
	<h2><?php __('Entrusts'); ?></h2>
	<?php echo $this->element("data_search", array("modelname" => "Entrust")); ?>
	<div id="searchbox_toggle">
	<a href="javascript:void(0);" onclick="javascript:search_box_change('1');return false;">管理データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('2');return false;">人事データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('3');return false;">プロジェクトデータで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('4');return false;">経理データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('5');return false;">事業所データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('6');return false;">備考データで検索</a> |
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
			<th width="60" class="actions"><?php __('Actions'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('updated'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th width="20"><?php echo $this->Paginator->sort('id'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('year'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('project_code'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('project_type'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('reception_date'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('person_in_charge'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('resolution_no'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('branch_no'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('continuance_no'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('cooperate_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('researcher_no'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('researcher_name'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('department'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('major_name'); ?></th>

			<th width="80"><?php echo $this->Paginator->sort('institute_code'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('school_code'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('course_code'); ?></th>

			<th width="40"><?php echo $this->Paginator->sort('job_title'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('extension'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('post_no'); ?></th>
			<th width="120"><?php echo $this->Paginator->sort('email'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('subject'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('contraction_date'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('area_of_research'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('singular_or_multi'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('new_or_continuance'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('applicant_name_1'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('category_of_business'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('association_type'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('applicant_scale'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('applicant_name_2'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('business_title'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('representative'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('address'); ?></th>
			<th width="80"><?php echo $this->Paginator->sort('associate_researcher_name'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('number_of_researchers'); ?></th>

			<th width="60"><?php echo $this->Paginator->sort('start_budget_year'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('credit'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('payment'); ?></th>
			<th width="50"><?php echo $this->Paginator->sort('division_count'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('former_payment_d'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('former_payment_r'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('former_payment_i'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('former_payment_sum'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('current_payment_dr'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('current_payment_u'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('current_payment_g'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('current_payment_d'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('current_payment_r'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('current_payment_i'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('current_payment_sum'); ?></th>
			<th width="40"><?php echo $this->Paginator->sort('formula'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('current_payment_alloc'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next1_payment_d'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next1_payment_r'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next1_payment_i'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next1_payment_sum'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next2_payment_d'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next2_payment_r'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next2_payment_i'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next2_payment_sum'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next3_payment_d'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next3_payment_r'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next3_payment_i'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next3_payment_sum'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next4_payment_d'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next4_payment_r'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next4_payment_i'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('next4_payment_sum'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('d_total'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('r_total'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('i_total'); ?></th>
			<th width="70"><?php echo $this->Paginator->sort('total_amount'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('resolution_date'); ?></th>
			<th width="65"><?php echo $this->Paginator->sort('payment_due'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('payment_month'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('payment_date'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('advance'); ?></th>

			<th width="60"><?php echo $this->Paginator->sort('ow_post_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ow_address'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ow_company_name'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ow_section'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ow_title'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ow_name'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ow_tel'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ow_fax'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('ow_email'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('bill_post_no'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('bill_address'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('bill_company_name'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('bill_section'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('bill_title'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('bill_name'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('bill_tel'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('bill_fax'); ?></th>
			<th width="60"><?php echo $this->Paginator->sort('bill_email'); ?></th>

			<th width="30"><?php echo $this->Paginator->sort('entrust_remarks'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('open_to_public'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('disabled'); ?></th>
			<th width="30"><?php echo $this->Paginator->sort('hidden'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($entrusts as $entrust):
		$class = "";
		if($entrust["Entrust"]["disabled"]) {
			$class = ' class="disabled"';
		} else {
			if(isset($entrust["EntrustNode"]) && count($entrust["EntrustNode"]) >= 2) {
				$class = ' class="haschild"';
			}
		}
		$editing = "";
		if(in_array($entrust["Entrust"]["id"], $current_editing)) {
			$editing = "★";
		}
	?>
	<tr<?php echo $class; ?>>
			<td class="actions">
				<?php if($entrust["Entrust"]["entrust_id"] == null): ?>
				<?php if($can_view): ?>
				<?php echo $this->Html->link(__('View', true), array('action' => 'view', $entrust['Entrust']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
				<?php endif; ?>
				<?php if($can_edit): ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $entrust['Entrust']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
				<?php endif; ?>
				<?php echo $editing; ?>
				<?php else: ?>
				<a href="<?php echo $html->url('/entrusts/view/'.$entrust["Entrust"]["entrust_id"]); ?>">明細</a>
				<?php endif; ?>
			</td>
			<?php echo $this->element("entrusts/row", array("entrust" => $entrust, "child" => false)); ?>
	</tr>
	<?php if(isset($entrust["EntrustNode"]) && count($entrust["EntrustNode"]) >= 2): ?>
	<?php foreach($entrust["EntrustNode"] as $item): ?>
	<tr class="child">
	<td align="right"><?php echo $html->image('badge.png', array('width' => 16, 'height' => 16)); ?></td>
	<?php $item2["Entrust"] = $item; ?>
	<?php echo $this->element("entrusts/row", array("entrust" => $item2, "child" => true)); ?>
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
