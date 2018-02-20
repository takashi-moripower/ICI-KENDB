<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Grant', true), array('action' => 'index', $this->Kendb->nendo())); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Grant', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_restore): ?>
        <li><?php echo $this->Html->link(__('Restore Grant', true), array('action' => 'restore', $grant['Grant']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="entrusts view">
<h2><?php  __('Grant');?> <?php __('Last saved record'); ?></h2>

<?php echo $this->element("grants/view"); ?>

</div>

