<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Contract', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $javascript->link('contract'); ?>

<div class="contracts form">
<?php echo $this->KendbForm->create('Contract', array('action' => 'add_node'));?>

<h2><?php __('Add Contract'); ?> <?php echo sprintf(__('Child Node of %d', true), $this->Form->value("contract_id"));?></h2>
<p><em><?php echo __('This data is child node', true); ?></em></p>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->Form->hidden("contract_id"); ?>
<?php echo $this->element('contracts/form'); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

