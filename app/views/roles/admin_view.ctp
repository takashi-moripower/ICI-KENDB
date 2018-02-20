<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('Edit Role', true), array('action' => 'edit', $role['Role']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Role', true), array('action' => 'delete', $role['Role']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $role['Role']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Roles', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Role', true), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="roles view">
<h2><?php  __('Role');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php __('Related Users');?></h3>
	<?php if (!empty($role['User'])):?>
	<table id="flexme">
        <thead>
	<tr>
		<th width="100" class="actions"><?php __('Actions');?></th>
		<th width="20"><?php __('Id'); ?></th>
		<th width="80"><?php __('Username'); ?></th>
		<th width="120"><?php __('Displayname'); ?></th>
                <th width="120"><?php __('Department'); ?></th>
		<th width="140"><?php __('Email'); ?></th>
                <th width="120"><?php __('Tel'); ?></th>
		<th width="60"><?php __('Grid Type'); ?></th>
		<th width="60"><?php __('Role Id'); ?></th>
		<th width="30"><?php __('Disabled'); ?></th>
		<th width="140"><?php __('Created'); ?></th>
		<th width="140"><?php __('Updated'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php
		$i = 0;
		foreach ($role['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'users', 'action' => 'delete', $user['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['id'])); ?>
			</td>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['displayname'];?></td>
                        <td><?php echo $user['department'];?></td>
			<td><?php echo $user['email'];?></td>
                        <td><?php echo $user['tel'];?></td>
			<td><?php echo $user['grid_type'];?></td>
			<td><?php echo $user['role_id'];?></td>
			<td><?php echo $user['disabled'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['updated'];?></td>
		</tr>
	<?php endforeach; ?>
        </tbody>
	</table>
<?php endif; ?>

</div>

<script type="text/javascript">
    $('#flexme').flexigrid({height:'auto',striped:true});
    $('#flexme').show();
</script>

