<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Obligation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Obligation.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Obligations', true), array('action' => 'index')); ?></li>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="obligations form">
<h2><?php __('Edit Obligation'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->Form->create('Obligation');?>
<?php echo $this->Form->input('obligation_code'); ?>
<?php echo $this->element("obligations/form", array('mode' => 'edit')); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
