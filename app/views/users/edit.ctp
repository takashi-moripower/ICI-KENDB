<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('Home', true), array('action' => 'index')); ?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php __('Edit User'); ?></legend>
        <?php
        echo $this->Form->hidden('id');
        echo $this->Form->input('username_dmy', array('label' => __('Username', true), 'disabled' => true, 'value' => $this->Form->value('username')));
        echo $this->Form->hidden('username');
        echo $this->Form->input('new_password', array('label' => __('New Password', true)));
        echo $this->Form->input('displayname');
        echo $this->Form->input('department', array('label' => '部署名'));
        echo $this->Form->input('email');
        echo $this->Form->input('tel', array('label' => '連絡先電話番号'));
        echo $this->Form->input('grid_type', array('type'=> 'select', 'options' => array('0' => '通常版', '1' => '高機能版')));
        echo $this->Form->input('dateformat', array('type'=> 'select', 'options' => array('0' => '平成YY年MM月DD日', '1' => 'HYY.MM.DD', '2' => 'YYYY-MM-DD')));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>

