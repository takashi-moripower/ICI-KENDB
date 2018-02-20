<table border="0">
	<tr>
	<td><?php echo $this->KendbForm->value('cooperate_no'); ?></td>
	<td><?php echo $this->KendbForm->input('personal_no'); ?></td>
	</tr>
</table>
<table border="0">
	<tr>
	<td><?php echo $this->KendbForm->input('organization'); ?></td>
	<td><?php echo $this->KendbForm->input('responsible_code'); ?></td>
	<td><?php echo $this->KendbForm->input('institute_code'); ?></td>
	<td><?php echo $this->KendbForm->input('school_code'); ?></td>
	<td><?php echo $this->KendbForm->input('course_code'); ?></td>
	</tr>
</table>

<?php echo $this->element("form_tips"); ?>
