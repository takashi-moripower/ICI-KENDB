<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index')); ?></li>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="projects form">
<h2><?php __('Add Project'); ?></h2>

<?php echo $this->Form->create('Project');?>
<?php echo $this->element("projects/form", array('mode' => 'add')); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
