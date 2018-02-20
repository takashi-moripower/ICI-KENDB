<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Nedo Jst Others', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="nedoJstOthers form">
<h2><?php __('Add Nedo Jst Other'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('NedoJstOther', array('action' => 'add'));?>
<?php echo $this->element('nedo_jst_others/form'); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

