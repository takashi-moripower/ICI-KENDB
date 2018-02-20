<div id="snavi">
    <ul>
        <?php if($rtn): ?>
        <li><?php echo $this->Html->link(__('List Other Research Grants', true), $rtn); ?> </li>
        <?php else: ?>
        <li><?php echo $this->Html->link(__('List Other Research Grants', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Other Research Grant', true), array('action' => 'edit', $otherResearchGrant['OtherResearchGrant']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete Other Research Grant', true), array('action' => 'delete', $otherResearchGrant['OtherResearchGrant']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $otherResearchGrant['OtherResearchGrant']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Other Research Grant', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Other Research Grant', true), array('action' => 'copy', $otherResearchGrant['OtherResearchGrant']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="otherResearchGrants view">
<?php if($history_exists): ?>
<?php if($can_history_view): ?>
<h2><?php __('History'); ?></h2>
<p><a href="<?php echo $html->url("/other_research_grants/history_view/" . $otherResearchGrant["OtherResearchGrant"]["id"]); ?>"><?php __('View last saved record'); ?></a></p>
<br clear="all" />
<?php endif; ?>
<?php endif; ?>

<h2><?php  __('Other Research Grant');?></h2>
<?php echo $this->element("other_research_grants/view"); ?>
</div>
