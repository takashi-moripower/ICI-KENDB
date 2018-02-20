<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Donations', true), array('action' => 'index', $this->Kendb->nendo())); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Donation', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_restore): ?>
        <li><?php echo $this->Html->link(__('Restore Donation', true), array('action' => 'restore', $donation['Donation']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="donations view">
<h2><?php  __('Donation');?> <?php __('Last saved record'); ?></h2>

<?php echo $this->element("donations/view"); ?>

</div>

