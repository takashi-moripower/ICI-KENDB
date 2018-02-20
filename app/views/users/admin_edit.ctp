<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('User.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?></li>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php __('Edit User'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('username');
        echo $this->Form->input('new_password');
        echo $this->Form->input('displayname');
        echo $this->Form->input('department', array('label' => '部署名'));
        echo $this->Form->input('email');
        echo $this->Form->input('tel', array('label' => '連絡先電話番号'));
        echo $this->Form->input('role_id');
        echo $this->Form->input('grid_type', array('type' => 'select', 'options' => array('0' => '通常版', '1' => '高機能版')));
        echo $this->Form->input('dateformat', array('type' => 'select', 'options' => array('0' => '平成YY年MM月DD日', '1' => 'HYY.MM.DD', '2' => 'YYYY-MM-DD')));
        echo $this->Form->input('disabled');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>

