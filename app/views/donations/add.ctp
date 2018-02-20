<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(__('List Donations', true), array('action' => 'index'));?></li>
	</ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="donations form">
<h2><?php __('Add Donation'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Donation');?>
<?php echo $this->element("donations/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>

</div>

<?php echo $javascript->link('donation'); ?>

