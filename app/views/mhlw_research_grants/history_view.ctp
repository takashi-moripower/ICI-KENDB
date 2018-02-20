<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Mhlw Research Grants', true), array('action' => 'index')); ?> </li>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Mhlw Research Grant', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_restore): ?>
        <li><?php echo $this->Html->link(__('Restore Mhlw Research Grant', true), array('action' => 'restore', $mhlwResearchGrant['MhlwResearchGrant']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="mhlwResearchGrants view">
<h2><?php  __('Mhlw Research Grant');?></h2>
<?php echo $this->element("mhlw_research_grants/view"); ?>
</div>
