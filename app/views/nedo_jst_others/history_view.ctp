<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Nedo Jst Other', true), array('action' => 'index', $this->Kendb->nendo())); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Nedo Jst Other', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_restore): ?>
        <li><?php echo $this->Html->link(__('Restore Nedo Jst Other', true), array('action' => 'restore', $nedoJstOther['NedoJstOther']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="entrusts view">
    <h2><?php __('Nedo Jst Other'); ?> <?php __('Last saved record'); ?></h2>

    <?php echo $this->element("nedo_jst_others/view"); ?>

</div>

