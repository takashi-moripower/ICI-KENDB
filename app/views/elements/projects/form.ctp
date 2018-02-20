<table border="0">
	<tr>
		<td>
			<?php if ($mode == "add"): ?>
			<?php echo $this->KendbForm->input('project_code', array('type' => 'text')); ?>
			<?php else: ?>
			<div class="input text"><label><?php echo __('Project Code', true); ?></label>
			<?php echo $this->KendbForm->value('project_code'); ?>
			</div>
			<?php endif; ?>
		</td>
	</tr>
</table>
<table border="0">
	<tr>
	<td><?php echo $this->KendbForm->input('long_name'); ?></td>
	<td><?php echo $this->KendbForm->input('short_name'); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_name'); ?></td>
	<td><?php echo $this->KendbForm->input('job_title'); ?></td>
	</tr>
</table>
<table border="0">
	<tr>
	<td><?php echo $this->KendbForm->input('department_no'); ?></td>
	<td><?php echo $this->KendbForm->input('department'); ?></td>
	</tr>
</table>
<table border="0">
	<tr>
		<td><?php echo $this->KendbForm->input('goal'); ?></td>
	</tr>
</table>
<table border="0">
	<tr>
		<td><?php echo $this->KendbForm->input('cooperate_no'); ?></td>
		<td><?php echo $this->KendbForm->input('researcher_no'); ?></td>
	</tr>
</table>

<?php echo $this->element("form_tips"); ?>
