<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(__('New Project', true), array('action' => 'add')); ?></li>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/projects/output_excel'). "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/projects/output_excel'). "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_upload): ?>
		<li><a href="<?php echo $html->url('/projects/upload'); ?>">一括アップロード</a></li>
		<?php endif; ?>
	</ul>
</div>

<?php echo $this->element("crumbs"); ?>

<?php echo $this->element("table_switcher_head", array("count" => count($projects))); ?>


<div class="projects index">
	<h2><?php __('Projects'); ?></h2>

	<?php echo $this->element("paginate"); ?>

	<div class="fakeContainer">
	<table id="flexme">
	<thead>
	<tr>
			<th width="90" class="actions"><?php __('Actions');?></th>
			<th width="60"><?php echo $this->Paginator->sort('project_code');?></th>
			<th width="90"><?php echo $this->Paginator->sort('long_name');?></th>
			<th width="60"><?php echo $this->Paginator->sort('short_name');?></th>
			<th width="90"><?php echo $this->Paginator->sort('researcher_name');?></th>
			<th width="50"><?php echo $this->Paginator->sort('job_title');?></th>
			<th width="50"><?php echo $this->Paginator->sort('department_no');?></th>
			<th width="120"><?php echo $this->Paginator->sort('department');?></th>
			<th width="150"><?php echo $this->Paginator->sort('goal');?></th>
			<th width="60"><?php echo $this->Paginator->sort('cooperate_no');?></th>
			<th width="60"><?php echo $this->Paginator->sort('researcher_no');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $project['Project']['project_code'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $project['Project']['project_code'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $project['Project']['project_code']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['project_code'])); ?>
		</td>
		<td><?php echo $project['Project']['project_code']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['long_name']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['short_name']; ?>&nbsp;</td>
		<td><?php echo $this->Kendb->makeResearcherLink($project['Project']['researcher_name'], $project['Project']['researcher_no']); ?>&nbsp;</td>
		<td><?php echo $project['Project']['job_title']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['department_no']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['department']; ?>&nbsp;</td>
		<td><?php echo nl2br(h($project['Project']['goal'])); ?>&nbsp;</td>
		<td><?php echo $project['Project']['cooperate_no']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['researcher_no']; ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>

<?php echo $this->element("paginate"); ?>

<?php echo $this->element("table_switcher_foot"); ?>

</div>
