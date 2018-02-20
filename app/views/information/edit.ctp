<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Information.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Information.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Information', true), array('action' => 'index'));?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="information form">
<h2><?php __('Edit Information'); ?></h2>
<?php echo $this->Form->create('Information');?>
<?php
    echo $this->Form->input('id');
    echo $this->Form->input('name', array('size' => 30));
    echo $this->Form->input('description', array('rows' => 15, 'cols' => 100));
    echo $this->Form->input('disabled');
    echo $datePicker->picker('startdate');
    echo $datePicker->picker('enddate');
?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
