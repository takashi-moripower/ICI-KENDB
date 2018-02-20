<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Adoptions', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Adoption', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_restore): ?>
        <li><?php echo $this->Html->link(__('Restore Adoption', true), array('action' => 'restore', $adoption['Adoption']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="adoptions view">
<h2><?php  __('Adoption');?> <?php __('Last saved record'); ?></h2>
<?php echo $this->element("adoptions/view"); ?>
</div>



