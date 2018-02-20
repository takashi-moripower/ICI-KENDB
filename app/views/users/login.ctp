<div class="users form">
<?php echo $this->Form->create('User', array('action' => 'login'));?>
<h2><?php __('Login'); ?></h2>
<p>ユーザーIDとパスワードを入力してログインしてください。</p>
<table border="0" cellpadding="10" cellspacing="10">
<tr>
<th>ユーザーID</th>
<td><?php echo $this->Form->input('username', array('label' => false)); ?></td>
</tr>
<tr>
<th>パスワード</th>
<td><?php echo $this->Form->input('password', array('label' => false)); ?></td>
</tr>
</table>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
