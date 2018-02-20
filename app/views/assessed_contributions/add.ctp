<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Assessed Contributions', true), array('action' => 'index'));?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>
<?php echo $javascript->link('assessed_contribution'); ?>

<div class="assessedContributions form">
<h2><?php __('Add Assessed Contribution'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('AssessedContribution');?>
<?php echo $this->element("assessed_contributions/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
