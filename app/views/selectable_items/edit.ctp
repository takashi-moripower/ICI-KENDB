<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SelectableItem.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SelectableItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List', true), array('action' => 'index', $this->Form->value('SelectableItem.category'), $this->Form->value('SelectableItem.list_name')));?></li>
	</ul>
</div>

<div class="selectableItems form">
<?php echo $this->Form->create('SelectableItem');?>
	<fieldset>
 		<legend><?php __('Edit Selectable Item'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->hidden('category');
		echo $this->Form->hidden('list_name');
		echo $this->Form->input('name');
		echo $this->Form->input('sort_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
