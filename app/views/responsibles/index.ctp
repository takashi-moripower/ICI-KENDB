<div id="snavi">
	<ul>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/responsibles/output_excel') .$urlparams . "/format:Excel5"; ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/responsibles/output_excel') .$urlparams . "/format:Excel2007"; ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/responsibles/output_csv') . $urlparams; ?>">CSV形式ダウンロード</a></li>
		<?php endif; ?>
	</ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="responsibles index">
	<h2><?php __('Responsible');?></h2>

<?php echo $this->element("table_switcher_head", array("count" => count($researchers))); ?>

	<?php echo $this->element("paginate"); ?>

	<div class="fakeContainer">
	<table id="flexme">
	<thead>
	<tr>
			<th width="60" class="actions"><?php __('Actions');?></th>
			<th width="70"><?php __('Cooperate No') ?></th>
			<th width="60"><?php echo $this->Paginator->sort( __('Personal No'), 'personal_no');?></th>
			<th width="80"><?php __('Researcher Name') ?></th>
			<th width="45"><?php echo $this->Paginator->sort( __('Organization'), 'organization');?></th>
			<th width="60"><?php echo $this->Paginator->sort( __('Responsible Code'), 'responsible_code');?></th>
			<th width="60"><?php echo $this->Paginator->sort( __('Institute Code'), 'institute_code');?></th>
			<th width="60"><?php echo $this->Paginator->sort( __('School Code'), 'school_code');?></th>
			<th width="60"><?php echo $this->Paginator->sort( __('Course Code'), 'course_code');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($responsibles as $responsible):
	?>
	<tr>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('action' => 'view', $responsible['Responsible']['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $responsible['Responsible']['id'])); ?>
			</td>
			<td><?php echo h($responsible['Researcher']['cooperate_no']); ?>&nbsp;</td>
			<td><?php echo h($responsible['Responsible']['personal_no']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->makeResearcherLink($responsible['Researcher']['researcher_name'], $responsible['Researcher']['researcher_no']); ?>&nbsp;</td>
			<td><?php echo h($responsible['Responsible']['organization']); ?>&nbsp;</td>
			<td><?php echo h($responsible['Responsible']['responsible_code']); ?>&nbsp;</td>
			<td><?php echo h($responsible['Responsible']['institute_code']); ?>&nbsp;</td>
			<td><?php echo h($responsible['Responsible']['school_code']); ?>&nbsp;</td>
			<td><?php echo h($responsible['Responsible']['course_code']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>
	<?php echo $this->element("paginate"); ?>
<br clear="all" />

<?php echo $this->element("table_switcher_foot"); ?>

<?php echo $this->element("form_tips"); ?>