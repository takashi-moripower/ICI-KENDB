<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Entrusts', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $javascript->link('entrust'); ?>

<div class="entrusts form">
<h2><?php __('Add Entrust'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Entrust', array('action' => 'add'));?>
<?php echo $this->element("entrusts/form"); ?>

<?php echo $this->Form->end(__('Submit', true));?>
</div>
