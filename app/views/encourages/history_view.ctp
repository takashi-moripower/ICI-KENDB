<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Encourages', true), array('action' => 'index', $this->Kendb->nendo())); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Encourage', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_restore): ?>
        <li><?php echo $this->Html->link(__('Restore Encourage', true), array('action' => 'restore', $encourage['Encourage']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="encourages view">
<h2><?php  __('Encourage');?> <?php __('Last saved record'); ?></h2>

<?php echo $this->element("encourages/view"); ?>

</div>

