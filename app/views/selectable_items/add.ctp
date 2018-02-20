<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(__('List', true), array('action' => 'index', $modelname, $listname));?></li>
	</ul>
</div>

<div class="selectableItems form">
<?php echo $this->Form->create('SelectableItem');?>
	<fieldset>
 		<legend><?php e(__($modelname, true));?> <?php e(__(Inflector::humanize($listname), true));?></legend>
	<?php
		echo $this->Form->hidden('category', array('value' => $modelname));
		echo $this->Form->hidden('list_name', array('value' => $listname));
		echo $this->Form->input('name');
		echo $this->Form->input('sort_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
