<div id="snavi">
    <ul>

        <li><?php echo $this->Html->link(__('List Obligations', true), array('action' => 'index')); ?></li>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="obligations form">
<h2><?php __('Add Obligation'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->Form->create('Obligation');?>
<?php echo $this->element("obligations/form", array('mode' => 'add')); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
