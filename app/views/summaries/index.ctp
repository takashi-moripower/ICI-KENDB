<div id="snavi">
	<?php if(isset($urlparams)): ?>
	<ul>
		<li><a href="<?php echo $html->url('/summaries/index') . $urlparams . "/format:Excel5"; ?>">Excel(.xls)形式ダウンロード</a></li>
		<li><a href="<?php echo $html->url('/summaries/index') . $urlparams . "/format:Excel2007"; ?>">Excel2007(.xlsx)形式ダウンロード</a></li>
		<li><a href="<?php echo $html->url('/summaries/index') . $urlparams . "/format:CSV"; ?>">CSV(.csv)形式ダウンロード</a></li>
	</ul>
	<?php endif; ?>
</div>

<?php echo $this->element("crumbs"); ?>

<?php echo $this->element("table_switcher_head", array("count" => count($summaries))); ?>

<div class="summaries index">

	<h2><?php __('Search'); ?></h2>

	<?php echo $this->element("cross_search"); ?> <!-- app/views/elements/cross_search.ctp 横断検索フォーム -->

	<?php if($this->Paginator->counter(array('format' => '%count%'))): ?>
		<div style="width:300px; padding: 4px; border:1px solid red; font-size:14px; font-weight:bold;">
		<?php echo $this->Paginator->counter(array('format' => '%count%')); ?>件のデータが見つかりました。
		</div>
	<?php endif; ?>
    <!-- PAGINATE BEGIN -->
	<?php echo $this->element("paginate"); ?>
    <!-- PAGINATE END -->
	<div class="fakeContainer">
	<table id="flexme">
	<thead>
    <!-- http://book.cakephp.org/1.3/ja/The-Manual/Common-Tasks-With-CakePHP/Pagination.html#id2 -->
	<tr>
	<th width="30"><?php __('Action'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Department', true), 'department'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Major Name', true), 'major_name'); ?></th>       <!-- #270 -->
	<th width="100"><?php echo $this->Paginator->sort(__('Institute Code', true), 'institute_code'); ?></th>       <!-- #270 -->
	<th width="100"><?php echo $this->Paginator->sort(__('School Code', true), 'school_code'); ?></th>       <!-- #270 -->
	<th width="100"><?php echo $this->Paginator->sort(__('Course Code', true), 'course_code'); ?></th>       <!-- #270 -->
	<th width="100"><?php echo $this->Paginator->sort(__('Personal No', true), 'personal_no'); ?></th>       <!-- ICI#19 -->
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Researcher Name', true), 'researcher_name'); ?></th>
	<th width="40"><?php echo $this->Paginator->sort(__('Common Search Job Title', true), 'job_title'); ?></th>
	<th width="40"><?php echo $this->Paginator->sort(__('Sex', true), 'sex'); ?></th>
	<th width="20"><?php echo $this->Paginator->sort(__('CurrentAge', true), 'birthdayYMD'); ?></th>
	<th width="65"><?php echo $this->Paginator->sort(__('Project Code or Number', true), 'project_code'); ?></th>
	<th width="65"><?php echo $this->Paginator->sort(__('Common Search Amount', true), 'amount'); ?></th>
	<th width="65"><?php echo $this->Paginator->sort(__('Common Search Direct Cost', true), 'direct_cost'); ?></th>
	<th width="65"><?php echo $this->Paginator->sort(__('Common Search Indirect Cost', true), 'indirect_cost'); ?></th>
	<th width="30"><?php echo $this->Paginator->sort('year'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Data Type', true), "model_name"); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Research Type', true), 'research_type'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Subject', true), 'subject'); ?></th>
	<th width="100"><?php echo $this->Paginator->sort(__('Common Search Fund Owner', true), 'fund_owner'); ?></th>
	<th width="70"><?php echo $this->Paginator->sort(__('Common Search Start Date', true), 'start_date'); ?></th>
	<th width="70"><?php echo $this->Paginator->sort(__('Common Search End Date', true), 'end_date'); ?></th>
<?php if(0): //2017.09.25 ?>
	<th width="40"><?php echo $this->Paginator->sort(__('BirthdayYMD', true), 'birthdayYMD'); ?></th>
<?php endif; ?>
	<th width="70"><?php echo $this->Paginator->sort(__('Common Search Memo', true), 'memo'); ?></th>
	<th width="70"><?php echo $this->Paginator->sort(__('Unaggregate', true), 'unaggregate'); ?></th>
	</tr>
	</thead>
	<tbody>

	<?php
	$i = 0;
	foreach ($summaries as $res):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>

	<?php
	$birthday = $res["Summary"]["birthdayYMD"];
	if($birthday != '') {
        // ICI#29 年齢計算基準日(age_based_at)をコントローラからセットすること
        $age = floor(($age_based_at - $birthday)/10000);
	} else {
		$age = "";
	}
	?>
	<tr<?php echo $class;?>>
		<td><a href="<?php echo $html->url($res["Summary"]["href"]); ?>"><?php __('View'); ?></a></td>
		<td><?php echo $res["Summary"]['department']; ?></td>
		<td><?php echo $res["Summary"]['major_name']; ?></td> <!-- #270 -->
		<td><?php echo $res["Summary"]['institute_code']; ?></td> <!-- #270 -->
		<td><?php echo $res["Summary"]['school_code']; ?></td> <!-- #270 -->
		<td><?php echo $res["Summary"]['course_code']; ?></td> <!-- #270 -->
		<td><?php echo $res["Summary"]['personal_no']; ?></td> <!-- ICI#19 -->
		<td><?php echo $this->Kendb->makeResearcherLink($res["Summary"]['researcher_name'], $res["Summary"]["researcher_no"]); ?></td>
		<td><?php echo $res["Summary"]['job_title']; ?></td>
		<td><?php echo $res["Summary"]['sex']; ?></td>
		<td><?php echo $age; ?></td>
		<td><?php echo $res["Summary"]['project_code']; ?></td>
		<td align="right"><?php echo number_format($res["Summary"]['amount']); ?></td>
		<td align="right"><?php echo number_format($res["Summary"]['direct_cost']); ?></td>
		<td align="right"><?php echo number_format($res["Summary"]['indirect_cost']); ?></td>
		<td><?php echo $res["Summary"]['year']; ?></td>
		<td><?php echo __($res["Summary"]['model_name']); ?></td>
		<td><?php echo $res["Summary"]['research_type']; ?></td>
		<td><?php echo $res["Summary"]['subject']; ?></td>
		<td><?php echo $res["Summary"]['fund_owner']; ?></td>
		<td><?php echo $this->Kendb->print_date($res["Summary"]['start_date']); ?></td>
		<td><?php echo $this->Kendb->print_date($res["Summary"]['end_date']); ?></td>
<?php if(0): //2017.09.23 ?>
		<td><?php echo $res["Summary"]['birthdayYMD']; ?></td>
<?php endif; ?>
		<td><?php echo $res["Summary"]['memo']; ?></td>
		<td><?php echo $res["Summary"]['unaggregate']; ?></td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
<!-- PAGINATE -->
<?php echo $this->element("paginate"); ?>
</div>

<?php echo $this->element("table_switcher_foot"); ?>
