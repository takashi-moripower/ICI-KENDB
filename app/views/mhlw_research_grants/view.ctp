<div id="snavi">
    <ul>
        <?php if($rtn): ?>
        <li><?php echo $this->Html->link(__('List Mhlw Research Grants', true), $rtn); ?> </li>
        <?php else: ?>
        <li><?php echo $this->Html->link(__('List Mhlw Research Grants', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Mhlw Research Grant', true), array('action' => 'edit', $mhlwResearchGrant['MhlwResearchGrant']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete Mhlw Research Grant', true), array('action' => 'delete', $mhlwResearchGrant['MhlwResearchGrant']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mhlwResearchGrant['MhlwResearchGrant']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Mhlw Research Grant', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Mhlw Research Grant', true), array('action' => 'copy', $mhlwResearchGrant['MhlwResearchGrant']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="mhlwResearchGrants view">
<?php if($history_exists): ?>
<?php if($can_history_view): ?>
<h2><?php __('History'); ?></h2>
<p><a href="<?php echo $html->url("/mhlw_research_grants/history_view/" . $mhlwResearchGrant["MhlwResearchGrant"]["id"]); ?>"><?php __('View last saved record'); ?></a></p>
<br clear="all" />
<?php endif; ?>
<?php endif; ?>


<h2><?php  __('Mhlw Research Grant');?></h2>
<?php echo $this->element("mhlw_research_grants/view"); ?>
</div>
