<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <?php if($rtn): ?>
        <li><?php echo $this->Html->link(__('List Assessed Contributions', true), $rtn); ?> </li>
        <?php else: ?>
        <li><?php echo $this->Html->link(__('List Assessed Contributions', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Assessed Contribution', true), array('action' => 'edit', $assessedContribution['AssessedContribution']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete Assessed Contribution', true), array('action' => 'delete', $assessedContribution['AssessedContribution']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $assessedContribution['AssessedContribution']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Assessed Contribution', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Assessed Contribution', true), array('action' => 'copy', $assessedContribution['AssessedContribution']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="assessedContributions view">

<?php if($history_exists): ?>
<?php if($can_history_view): ?>
<h2><?php __('History'); ?></h2>
<p><a href="<?php echo $html->url("/assessed_contributions/history_view/" . $assessedContribution["AssessedContribution"]["id"]); ?>"><?php __('View last saved record'); ?></a></p>
<br clear="all" />
<?php endif; ?>
<?php endif; ?>


<h2><?php  __('Assessed Contribution');?></h2>
<?php echo $this->element("assessed_contributions/view"); ?>
</div>
