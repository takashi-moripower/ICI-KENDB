<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Encourages', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $javascript->link('encourage'); ?>

<div class="entrusts form">
<h2><?php __('Add Encourage'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Encourage');?>
<?php echo $this->element("encourages/form"); ?>

<?php echo $this->Form->end(__('Submit', true));?>
</div>
