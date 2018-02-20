<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Mhlw Research Grants', true), array('action' => 'index'));?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="mhlwResearchGrants form">
<h2><?php __('Add Mhlw Research Grant'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('MhlwResearchGrant');?>
<?php echo $this->element("mhlw_research_grants/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
