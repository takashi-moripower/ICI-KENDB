<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('Edit Information', true), array('action' => 'edit', $information['Information']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Information', true), array('action' => 'delete', $information['Information']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $information['Information']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Information', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Information', true), array('action' => 'add')); ?> </li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="information view">
<h2><?php  __('Information');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $information['Information']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $information['Information']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br(h($information['Information']['description'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Disabled'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $information['Information']['disabled']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Startdate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $information['Information']['startdate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Enddate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $information['Information']['enddate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $information['Information']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $information['Information']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
