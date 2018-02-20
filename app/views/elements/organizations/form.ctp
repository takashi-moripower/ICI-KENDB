<table border="0">
	<tr>
	<td><?php echo $this->KendbForm->input('classifier', array('type' => 'select', 'options' => array('' => '', 'institute' => '院', 'school' => '系', 'course' => 'コース', 'responsible' => '主副')));?></td>
	<td><?php echo $this->KendbForm->input('code'); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('japanese_name'); ?></td>
	<td><?php echo $this->KendbForm->input('english_name'); ?></td>
	</tr>
</table>

<?php echo $this->element("form_tips"); ?>

