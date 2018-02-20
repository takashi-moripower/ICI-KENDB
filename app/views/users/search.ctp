<div id="snavi">
</div>

<?php echo $this->element("crumbs"); ?>

<div class="information index">
	<h2><?php __('Search'); ?></h2>
	<?php echo $this->element("cross_search"); ?>
	<h2><?php __('Search Result');?></h2>
	<?php echo $this->element("table_switcher_head", array("count" => count($search_result))); ?>
	<?php if (count($search_result) > 0): ?>
	<p><?php echo count($search_result); ?>件のデータが見つかりました。</p>
	<?php endif; ?>

	<?php echo $this->element("paginate"); ?>

	<div class="fakeContainer">
	<table id="flexme">
	<thead>
	<tr>
	<th width="30"><?php __('Action'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Data Type', true), "model_name"); ?></th>
	<th width="30"><?php echo $this->Paginator->sort('year'); ?></th>
	<th width="20"><?php echo $this->Paginator->sort(__('Id', true), "model_id"); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Research Type', true), 'research_type'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Research Area', true), 'research_area'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Researcher Name', true), 'researcher_name'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Department', true), 'department'); ?></th>
	<th width="40"><?php echo $this->Paginator->sort(__('Common Search Job Title', true), 'job_titile'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Subject', true), 'subject'); ?></th>
	<th width="70"><?php echo $this->Paginator->sort(__('Common Search Start Date', true), 'start_date'); ?></th>
	<th width="70"><?php echo $this->Paginator->sort(__('Common Search End Date', true), 'end_date'); ?></th>
	<th width="65"><?php echo $this->Paginator->sort(__('Common Search Amount', true), 'amount'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Researcher No', true), 'researcher_no'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Cooperate No', true), 'cooperate_no'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort('updated'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($search_result as $res):
			$class = null;
			if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
			}
	?>
	<tr<?php echo $class;?>>
		<td><a href="<?php echo $html->url($res["Summary"]["href"]); ?>"><?php __('View'); ?></a></td>
		<td><?php echo __($res["Summary"]['model_name']); ?></td>
		<td><?php echo $res["Summary"]['year']; ?></td>
		<td><?php echo $res["Summary"]['model_id']; ?></td>
		<td><?php echo $res["Summary"]['research_type']; ?></td>
		<td><?php echo $res["Summary"]['research_area']; ?></td>
		<td><?php echo $this->Kendb->makeResearcherLink($res["Summary"]['researcher_name'], $res["Summary"]["researcher_no"]); ?></td>
		<td><?php echo $res["Summary"]['department']; ?></td>
		<td><?php echo $res["Summary"]['job_title']; ?></td>
		<td><?php echo $res["Summary"]['subject']; ?></td>
		<td><?php echo $this->Kendb->print_date($res["Summary"]['start_date']); ?></td>
		<td><?php echo $this->Kendb->print_date($res["Summary"]['end_date']); ?></td>
		<td align="right"><?php echo number_format($res["Summary"]['amount']); ?></td>
		<td><?php echo $res["Summary"]['researcher_no']; ?></td>
		<td><?php echo $res["Summary"]['cooperate_no']; ?></td>
		<td><?php echo $this->Kendb->print_date($res["Summary"]['updated']); ?></td>
	</tr>
<?php endforeach; ?>
	<?php if (count($search_result) == 0) { ?>
	<tr><td colspan="16"><?php echo __("There is no search result.", true); ?></td></tr>
	<?php } ?>
	</tbody>
	</table>
	</div>

	<?php echo $this->element("paginate"); ?>

<?php echo $this->element("table_switcher_foot"); ?>


</div>

