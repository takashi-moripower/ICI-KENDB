<div id="snavi">
	<ul>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/organizations/output_excel') .$urlparams . "/format:Excel5"; ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/organizations/output_excel') .$urlparams . "/format:Excel2007"; ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/organizations/output_csv') . $urlparams; ?>">CSV形式ダウンロード</a></li>
		<?php endif; ?>
	</ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="organizations index">
	<h2><?php __('Organizations');?></h2>

<?php echo $this->element("table_switcher_head", array("count" => count($researchers))); ?>

	<?php echo $this->element("paginate"); ?>

	<div class="fakeContainer">
	<table id="flexme">
	<thead>
	<tr>
			<th width="60" class="actions"><?php __('Actions');?></th>
			<th width="50"><?php echo $this->Paginator->sort( __('Classifier'), 'classifier');?></th>
			<th width="60"><?php echo $this->Paginator->sort( __('Code'), 'code');?></th>
			<th width="150"><?php echo $this->Paginator->sort( __('Japanese Name'), 'japanese_name');?></th>
			<th width="200"><?php echo $this->Paginator->sort( __('English Name'), 'english_name');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($organizations as $organization):
	?>
	<tr>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('action' => 'view', $organization['Organization']['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $organization['Organization']['id'])); ?>
			</td>
			<td><?php echo h($organization['Organization']['view_classifier']); ?>&nbsp;</td>
			<td><?php echo h($organization['Organization']['code']); ?>&nbsp;</td>
			<td><?php echo h($organization['Organization']['japanese_name']); ?>&nbsp;</td>
			<td><?php echo h($organization['Organization']['english_name']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>
	<?php echo $this->element("paginate"); ?>
<br clear="all" />

<?php echo $this->element("table_switcher_foot"); ?>

<?php echo $this->element("form_tips"); ?>