<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?> </li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="users view">
    <h2><?php __('User'); ?></h2>
    <dl><?php $i = 0;
$class = ' class="altrow"'; ?>
        <dt<?php if ($i % 2 == 0)
    echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Username'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <?php echo $user['User']['username']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Password'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo "*****"; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Displayname'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['displayname']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Department'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['department']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Email'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['email']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Tel'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <?php echo $user['User']['tel']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Role'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['Role']['name']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Dateformat'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['dateformat']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Grid Type'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['grid_type']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Disabled'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['disabled']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Updated'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['updated']; ?>
            &nbsp;
        </dd>
    </dl>
</div>

