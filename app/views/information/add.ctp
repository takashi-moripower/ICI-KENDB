<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Information', true), array('action' => 'index'));?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="information form">
<h2><?php __('Add Information'); ?></h2>
<?php echo $this->Form->create('Information');?>
<?php
    echo $this->Form->input('name', array('size' => 30));
    echo $this->Form->input('description', array('rows' => 15, 'cols' => 100));
    echo $this->Form->input('disabled');
    echo $datePicker->picker('startdate');
    echo $datePicker->picker('enddate', array('default' => date('Y-m-d', strtotime('+1 month'))));
?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
