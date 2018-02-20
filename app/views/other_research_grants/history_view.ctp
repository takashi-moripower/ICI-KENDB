<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Other Research Grants', true), array('action' => 'index')); ?> </li>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Other Research Grant', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_restore): ?>
        <li><?php echo $this->Html->link(__('Restore Other Research Grant', true), array('action' => 'restore', $otherResearchGrant['OtherResearchGrant']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="otherResearchGrants view">
<h2><?php  __('Other Research Grant');?> <?php __('Last saved record'); ?></h2>

<?php echo $this->element("other_research_grants/view"); ?>
</div>
