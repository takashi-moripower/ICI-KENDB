<div id="snavi">
    <ul>
        <?php if($rtn): ?>
        <li><?php echo $this->Html->link(__('List Donations', true), $rtn); ?> </li>
        <?php else: ?>
        <li><?php echo $this->Html->link(__('List Donations', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Donation', true), array('action' => 'edit', $donation['Donation']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete Donation', true), array('action' => 'delete', $donation['Donation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $donation['Donation']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Donation', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Donation', true), array('action' => 'copy', $donation['Donation']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>


<?php echo $this->element("crumbs"); ?>

<div class="donations view">
<?php if($history_exists): ?>
<?php if($can_history_view): ?>
<h2><?php __('History'); ?></h2>
<p><a href="<?php echo $html->url("/donations/history_view/" . $donation["Donation"]["id"]); ?>"><?php __('View last saved record'); ?></a></p>
<br clear="all" />
<?php endif; ?>
<?php endif; ?>


<h2><?php  __('Donation');?></h2>
<?php echo $this->element("donations/view"); ?>
</div>
