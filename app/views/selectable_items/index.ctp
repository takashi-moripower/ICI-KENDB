<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(__('New Selectable Item', true), array('action' => 'add', $modelname, $listname)); ?></li>
	</ul>
</div>


<div class="selectableItems index">
	<h2><?php e(__($modelname, true));?> <?php e(__(Inflector::humanize($listname), true));?></h2>
	<table id="flexme">
    <thead>
	<tr>
			<th width="100" class="actions"><?php __('Actions');?></th>
			<th width="100"><?php echo $this->Paginator->sort('name');?></th>
			<th width="100"><?php echo $this->Paginator->sort('sort_order');?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	$i = 0;
	foreach ($selectableItems as $selectableItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $selectableItem['SelectableItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $selectableItem['SelectableItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $selectableItem['SelectableItem']['id'])); ?>
		</td>
		<td><?php e(h($selectableItem['SelectableItem']['name'])); ?>&nbsp;</td>
		<td><?php e(h($selectableItem['SelectableItem']['sort_order'])); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
    </tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

<?php echo $this->element("table_style"); ?>
