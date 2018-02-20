<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Nedo Jst Others', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="nedoJstOthers form">
<?php echo $this->KendbForm->create('NedoJstOther', array('action' => 'add_node'));?>

<h2><?php __('Add Nedo Jst Other'); ?> <?php echo sprintf(__('Child Node of %d', true), $this->Form->value("nedo_jst_other_id"));?></h2>
<p><em><?php echo __('This data is child node', true); ?></em></p>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->Form->hidden("nedo_jst_other_id"); ?>
<?php echo $this->element('nedo_jst_others/form'); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

