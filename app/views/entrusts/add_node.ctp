<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Entrust', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $javascript->link('entrust'); ?>

<div class="entrusts form">
<?php echo $this->KendbForm->create('Entrust', array('action' => 'add_node'));?>

<h2><?php __('Add Entrust'); ?> <?php echo sprintf(__('Child Node of %d', true), $this->Form->value("entrust_id"));?></h2>
<p><em><?php echo __('This data is child node', true); ?></em></p>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->Form->hidden("entrust_id"); ?>
<?php echo $this->element('entrusts/form'); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

