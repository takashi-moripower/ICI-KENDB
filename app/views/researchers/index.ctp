<div id="snavi">
	<ul>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/researchers/output_excel') .$urlparams . "/format:Excel5"; ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/researchers/output_excel') .$urlparams . "/format:Excel2007"; ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
		<?php endif; ?>
	</ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="researchers index">
	<h2><?php __('Researchers');?></h2>

	<input type="button" onclick="$('#searchbox').toggle();" value="検索ボックス切り替え" />
	<div id="searchbox">
	<?php echo $this->Form->create('Researcher', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>
	<table border="0" cellspacing="4" class="researcher_search_table">
	<tr>
	<td><?php echo $this->KendbForm->input('id', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('cooperate_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('personal_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('researcher_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('department', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('major_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('institute_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('school_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('course_code', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('kana', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('sex', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('birth_year', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('birth_month', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('birth_day', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('degree', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('sex_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('degree_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('affiliation_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('job_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('notifying_department', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('statistical_department', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('counting_department', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('statistical_job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('formal_job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('extension', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('fax', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('email', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('post_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('qualification', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('applicant_qualification', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('detail_no', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('group_name', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('discipline', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('branch', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('detail', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('comments', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('transfer_date', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('erad_change_date', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('moving_history', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('old_job_title', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('changes', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td><?php echo $this->KendbForm->input('remarks', array('type' => 'text', 'div' => false, 'size' => 10)); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td colspan="9"><?php echo $this->Form->input('limit', array('label' => __('Limit', true), 'type' => 'select', 'div' => false, 'options' => array("20" => "20", "50" => "50", "100" => "100"))); ?></td>
	</tr>
	<tr>
		<td colspan="9"><?php echo $this->Form->submit(__('Search',true)); ?></td>
	</tr>
	</table>
	<?php echo $this->Form->end(); ?>
	</div>

	<br clear="all" />

<?php echo $this->element("table_switcher_head", array("count" => count($researchers))); ?>

	<?php echo $this->element("paginate"); ?>

	<div class="fakeContainer">
	<table id="flexme">
	<thead>
	<tr>
			<th width="60" class="actions"><?php __('Actions');?></th>
			<!--
			<th width="10"><?php echo $this->Paginator->sort('id');?></th>
			-->
			<th width="70"><?php echo $this->Paginator->sort('cooperate_no');?></th>
			<th width="60"><?php echo $this->Paginator->sort('personal_no');?></th>
			<th width="60"><?php echo $this->Paginator->sort('researcher_no');?></th>
			<th width="90"><?php echo $this->Paginator->sort('researcher_name');?></th>
			<th width="110"><?php echo $this->Paginator->sort('kana');?></th>
			<th width="30"><?php echo $this->Paginator->sort('sex');?></th>
			<th width="20"><?php echo $this->Paginator->sort('birth_year');?></th>
			<th width="10"><?php echo $this->Paginator->sort('birth_month');?></th>
			<th width="10"><?php echo $this->Paginator->sort('birth_day');?></th>
			<th width="30"><?php echo $this->Paginator->sort('degree');?></th>
			<th width="60"><?php echo $this->Paginator->sort('department');?></th>
			<th width="30"><?php echo $this->Paginator->sort('job_title');?></th>
			<th width="15"><?php echo $this->Paginator->sort('sex_no');?></th>
			<th width="15"><?php echo $this->Paginator->sort('degree_no');?></th>
			<th width="15"><?php echo $this->Paginator->sort('affiliation_no');?></th>
			<th width="15"><?php echo $this->Paginator->sort('job_no');?></th>
			<th width="60"><?php echo $this->Paginator->sort('notifying_department');?></th>
			<th width="60"><?php echo $this->Paginator->sort('statistical_department');?></th>
			<th width="60"><?php echo $this->Paginator->sort('counting_department');?></th>
			<th width="60"><?php echo $this->Paginator->sort('major_name');?></th>
			<th width="60"><?php echo $this->Paginator->sort('institute_code');?></th>
			<th width="60"><?php echo $this->Paginator->sort('school_code');?></th>
			<th width="60"><?php echo $this->Paginator->sort('course_code');?></th>
			<th width="60"><?php echo $this->Paginator->sort('statistical_job_title');?></th>
			<th width="60"><?php echo $this->Paginator->sort('formal_job_title');?></th>
			<th width="30"><?php echo $this->Paginator->sort('extension');?></th>
			<th width="30"><?php echo $this->Paginator->sort('fax');?></th>
			<th width="60"><?php echo $this->Paginator->sort('email');?></th>
			<th width="40"><?php echo $this->Paginator->sort('post_no');?></th>
			<th width="30"><?php echo $this->Paginator->sort('qualification');?></th>
			<th width="70"><?php echo $this->Paginator->sort('applicant_qualification');?></th>
			<th width="30"><?php echo $this->Paginator->sort('detail_no');?></th>
			<th width="60"><?php echo $this->Paginator->sort('group_name');?></th>
			<th width="60"><?php echo $this->Paginator->sort('discipline');?></th>
			<th width="60"><?php echo $this->Paginator->sort('branch');?></th>
			<th width="60"><?php echo $this->Paginator->sort('detail');?></th>
			<th width="60"><?php echo $this->Paginator->sort('comments');?></th>
			<th width="70"><?php echo $this->Paginator->sort('transfer_date');?></th>
			<th width="70"><?php echo $this->Paginator->sort('erad_change_date');?></th>
			<th width="60"><?php echo $this->Paginator->sort('moving_history');?></th>
			<th width="60"><?php echo $this->Paginator->sort('old_job_title');?></th>
			<th width="60"><?php echo $this->Paginator->sort('changes');?></th>
			<th width="60"><?php echo $this->Paginator->sort('remarks');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($researchers as $researcher):
	?>
	<tr>
			<td class="actions">
				<?php if($can_view): ?>
				<?php echo $this->Html->link(__('View', true), array('action' => 'view', $researcher['Researcher']['id'])); ?>
				<?php endif; ?>
			</td>
			<!--
			<td><?php echo h($researcher['Researcher']['id']); ?>&nbsp;</td>
			-->
			<td><?php echo h($researcher['Researcher']['cooperate_no']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['personal_no']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['researcher_no']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->makeResearcherLink($researcher['Researcher']['researcher_name'], $researcher['Researcher']['researcher_no']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['kana']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['sex']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['birth_year']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['birth_month']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['birth_day']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['degree']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['department']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['job_title']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['sex_no']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['degree_no']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['affiliation_no']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['job_no']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['notifying_department']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['statistical_department']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['counting_department']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['major_name']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['institute_code']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['school_code']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['course_code']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['statistical_job_title']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['formal_job_title']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['extension']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['fax']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['email']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['post_no']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['qualification']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['applicant_qualification']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['detail_no']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['group_name']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['discipline']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['branch']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['detail']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['comments']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['transfer_date']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['erad_change_date']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['moving_history']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['old_job_title']); ?>&nbsp;</td>
			<td><?php echo h($researcher['Researcher']['changes']); ?>&nbsp;</td>
			<td><?php echo nl2br(h($researcher['Researcher']['remarks'])); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>
	<?php echo $this->element("paginate"); ?>

<?php echo $this->element("table_switcher_foot"); ?>

<?php echo $this->element("form_tips"); ?>


</div>
