<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Other Research Grants', true), array('action' => 'index'));?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="otherResearchGrants form">
<h2><?php __('Add Other Research Grant'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('OtherResearchGrant');?>
<?php echo $this->element("other_research_grants/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
