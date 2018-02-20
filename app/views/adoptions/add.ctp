<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Adoptions', true), array('action' => 'index'));?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>
<?php echo $javascript->link('adoption'); ?>


<div class="adoptions form">
<h2><?php __('Add Adoption'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Adoption');?>
<?php echo $this->element("adoptions/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
