<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Project.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Project.id'))); ?></li>
	</ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="projects form">
<h2><?php __('Edit Project'); ?></h2>
<?php echo $this->Form->create('Project');?>
<?php echo $this->Form->input('project_code'); ?>
<?php echo $this->element("projects/form", array('mode' => 'edit')); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

