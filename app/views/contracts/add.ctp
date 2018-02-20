<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Contracts', true), array('action' => 'index')); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>
<?php echo $javascript->link('contract'); ?>


<div class="contracts form">
    <h2><?php __('Add Contract'); ?></h2>

    <?php echo $this->element('validate_errors'); ?>

    <?php echo $this->KendbForm->create('Contract', array('action' => 'add')); ?>
    <?php echo $this->element('contracts/form'); ?>
    <?php echo $this->KendbForm->end(__('Submit', true)); ?>
</div>
