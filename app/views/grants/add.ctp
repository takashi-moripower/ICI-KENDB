<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Grants', true), array('action' => 'index')); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>
<?php echo $javascript->link('grant'); ?>

<div class="grants form">
<h2><?php __('Add Grant'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Grant', array('action' => 'add'));?>
<?php echo $this->element('grants/form'); ?>
<?php echo $this->KendbForm->end(__('Submit', true));?>
</div>
