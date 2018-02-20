<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Assessed Contributions', true), array('action' => 'index')); ?> </li>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Assessed Contribution', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_restore): ?>
        <li><?php echo $this->Html->link(__('Restore Assessed Contribution', true), array('action' => 'restore', $assessedContribution['AssessedContribution']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="assessedContributions view">
<h2><?php  __('Assessed Contribution');?> <?php __('Last saved record'); ?></h2>
<?php echo $this->element("assessed_contributions/view"); ?>
</div>



