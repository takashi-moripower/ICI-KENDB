<input type="hidden" name="rtn" value="<?php echo $rtn; ?>">

<h3>管理データ</h3>
<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->KendbForm->nendoPullDown('year'); ?></td>
		<td width="20%"><?php echo $this->KendbForm->input('project_code'); ?></td>
		<td width="20%"><?php echo $this->Form->input('project_type', array('type' => 'select', 'options' => array('' => '', '共同' => '共同', '受託' => '受託'))); ?></td>
	<td><?php echo $datePicker->picker('reception_date', array('empty'=>true));?></td>
		<td width="20%"><?php echo $this->KendbForm->input('person_in_charge');?></td>
	</tr>
	<tr>
	<td><?php echo $this->KendbForm->input('resolution_no');?></td>
		<td><?php echo $this->KendbForm->input('branch_no');?></td>
	<td><?php echo $this->KendbForm->input('continuance_no');?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
</table>
<br clear="all" />
<div id="tab_parent">
<ul>
<li><a href="#tab_jinji">人事データ</a></li>
<li><a href="#tab_project">プロジェクトデータ</a></li>
<li><a href="#tab_keiri">経理データ</a></li>
<li><a href="#tab_jigyousho">事業所データ</a></li>
<li><a href="#tab_other">その他データ</a></li>
</ul>
<div style="float:right;margin-bottom:-30px;">
<input type="button" name="recalc" id="recalc" value="再計算" />
</div>

<div id="tab_jinji">
<div id="r_search_result" title="教員の選択" style="display : none;">&nbsp;</div>

<h3>人事データ</h3>
<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('cooperate_no');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('researcher_no');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('researcher_name');?><input type="button" id="r_search" value="検索" /></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('job_title');?></td>
		<td><?php echo $this->KendbForm->input('extension');?></td>
		<td><?php echo $this->KendbForm->input('post_no');?></td>
		<td><?php echo $this->KendbForm->input('email');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('institute_code');?></td>
		<td><?php echo $this->KendbForm->input('school_code');?></td>
		<td><?php echo $this->KendbForm->input('course_code');?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>

	<tr class="old_item_row">
		<td width="20%"><?php echo $this->KendbForm->input('department',array('class'=>'old_org'));?></td>
		<td><?php echo $this->KendbForm->input('major_name',array('class'=>'old_org'));?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>

</table>
</div>

<div id="tab_project">
<h3>プロジェクトデータ</h3>
<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('subject');?></td>
		<td width="20%"><?php echo $datePicker->picker('start_date', array('empty'=>true));?></td>
		<td width="20%"><?php echo $datePicker->picker('end_date', array('empty'=>true));?></td>
		<td width="20%"><?php echo $datePicker->picker('contraction_date', array('empty'=>true));?></td>
		<?php
			// 現在の選択肢をプルダウンに追加する
			$area_of_research[$this->Form->value('area_of_research')] = $this->Form->value('area_of_research');
		?>
		<td width="20%"><?php echo $this->Form->input('area_of_research', array('type' => 'select', 'options' => $area_of_research));?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->Form->input('singular_or_multi', array('type' => 'select', 'options' => array('' => '', '単' => '単', '複' => '複')));?></td>
		<td><?php echo $this->Form->input('new_or_continuance', array('type' => 'select', 'options' => array('' => '', '新規' => '新規', '継続' => '継続')));?></td>
		<td><?php echo $this->KendbForm->input('applicant_name_1');?></td>
		<?php
			// 現在の選択肢をプルダウンに追加する
			$category_of_business[$this->Form->value('category_of_business')] = $this->Form->value('category_of_business');
		?>
		<td><?php echo $this->Form->input('category_of_business', array('type' => 'select', 'options' => $category_of_business));?></td>
		<td><?php echo $this->Form->input('association_type', array('type' => 'select', 'options' => array('' => '', '会' => '会', '外'=>'外', '団' => '団')));?></td>
	</tr>
	<tr>
		<td><?php echo $this->Form->input('applicant_scale', array('type' => 'select', 'options' => array('' => '', '大' => '大', '中小' => '中小', '小規模' => '小規模')));?></td>
		<td><?php echo $this->KendbForm->input('applicant_name_2');?></td>
		<td><?php echo $this->KendbForm->input('business_title');?></td>
		<td><?php echo $this->KendbForm->input('representative');?></td>
		<td><?php echo $this->KendbForm->input('address');?></td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('associate_researcher_name');?></td>
		<td><?php echo $this->KendbForm->input('number_of_researchers');?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
</table>
</div>

<div id="tab_keiri">
<h3>経理データ</h3>
<table width="100%" border="0">
	<tr>
		<td><?php echo $this->KendbForm->input('start_budget_year');?></td>
		<td><?php echo $this->KendbForm->input('credit');?></td>
		<td><?php echo $this->KendbForm->input('payment');?></td>
		<td><?php echo $this->KendbForm->input('division_count');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('former_payment_d', array('class' => 'autocalc'));?></td>
		<td width="20%"><?php echo $this->KendbForm->input('former_payment_r', array('class' => 'autocalc'));?></td>
		<td width="20%"><?php echo $this->KendbForm->input('former_payment_i', array('class' => 'autocalc'));?></td>
		<td width="20%"><?php echo $this->Form->input('former_payment_sum', array('class' => 'autocalc autocalcresult'));?></td>
		<td width="20%">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top">
			<?php echo $this->KendbForm->input('current_payment_dr', array('class' => 'autocalc')); ?>
			<?php echo $this->KendbForm->input('current_payment_u', array('class' => 'autocalc')); ?>
			<?php echo $this->KendbForm->input('current_payment_g', array('class' => 'autocalc')); ?>
			<?php echo $this->Form->input('current_payment_d', array('class' => 'autocalc autocalcresult')); ?>
		</td>
		<td valign="top"><?php echo $this->KendbForm->input('current_payment_r', array('class' => 'autocalc'));?></td>
		<td valign="top"><?php echo $this->KendbForm->input('current_payment_i', array('class' => 'autocalc'));?></td>
		<td valign="top"><?php echo $this->Form->input('current_payment_sum', array('class' => 'autocalc autocalcresult'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2"><?php echo $this->Form->input('formula', array('class' => 'autocalc', 'type' => 'select', 'options' => array('1' => '本年度直(研究室配分)+(本年度研料/401400)*301400', '0' => '')));?></td>
		<td valign="top"><?php echo $this->Form->input('current_payment_alloc', array('class' => 'autocalc autocalcresult'));?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('next1_payment_d', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->KendbForm->input('next1_payment_r', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->KendbForm->input('next1_payment_i', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->Form->input('next1_payment_sum', array('class' => 'autocalc autocalcresult'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('next2_payment_d', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->KendbForm->input('next2_payment_r', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->KendbForm->input('next2_payment_i', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->Form->input('next2_payment_sum', array('class' => 'autocalc autocalcresult'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('next3_payment_d', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->KendbForm->input('next3_payment_r', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->KendbForm->input('next3_payment_i', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->Form->input('next3_payment_sum', array('class' => 'autocalc autocalcresult'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('next4_payment_d', array('class' => 'autocalc')); ?></td>
		<td><?php echo $this->KendbForm->input('next4_payment_r', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->KendbForm->input('next4_payment_i', array('class' => 'autocalc'));?></td>
		<td><?php echo $this->Form->input('next4_payment_sum', array('class' => 'autocalc autocalcresult'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $this->Form->input('d_total', array('class' => 'autocalc autocalcresult'));?></td>
		<td><?php echo $this->Form->input('r_total', array('class' => 'autocalc autocalcresult'));?></td>
		<td><?php echo $this->Form->input('i_total', array('class' => 'autocalc autocalcresult'));?></td>
		<td><?php echo $this->Form->input('total_amount', array('class' => 'autocalc autocalcresult'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><?php echo $datePicker->picker('resolution_date', array('empty'=>true));?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_due', array('empty'=>true));?></td>
		<td width="10%"><?php echo $this->KendbForm->input('payment_month', array('type' => 'select', 'options' => array('' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12')));?></td>
		<td width="20%"><?php echo $datePicker->picker('payment_date', array('empty'=>true));?></td>
		<td width="10%"><?php echo $this->Form->input('advance', array('type' => 'select', 'options' => array('' => '', '×' => '×', '◎' => '◎', '○' => '○', '不' => '不')));?></td>
	</tr>
</table>
</div>

<div id="tab_jigyousho">
<h3>事業所データ</h3>
<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('ow_post_no');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('ow_address');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('ow_company_name');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('ow_section');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('ow_title');?></td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('ow_name');?></td>
		<td><?php echo $this->KendbForm->input('ow_tel');?></td>
		<td><?php echo $this->KendbForm->input('ow_fax');?></td>
		<td><?php echo $this->KendbForm->input('ow_email');?></td>
		<td>&nbsp;</td>
	</tr>
</table>

<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->KendbForm->input('bill_post_no');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('bill_address');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('bill_company_name');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('bill_section');?></td>
		<td width="20%"><?php echo $this->KendbForm->input('bill_title');?></td>
	</tr>
	<tr>
		<td><?php echo $this->KendbForm->input('bill_name');?></td>
		<td><?php echo $this->KendbForm->input('bill_tel');?></td>
		<td><?php echo $this->KendbForm->input('bill_fax');?></td>
		<td><?php echo $this->KendbForm->input('bill_email');?></td>
		<td>&nbsp;</td>
	</tr>
</table>
</div>

<div id="tab_other">
<h3>備考</h3>
<table>
<tr>
<!-- <?php echo __('Entrust Remarks', true); ?> -->
<td><?php echo $this->KendbForm->input('entrust_remarks', array('rows' => 10, 'cols' => 150));?></td>
</tr>
</table>

<h3>システムデータ</h3>
<table width="100%" border="0">
	<tr>
		<td width="20%"><?php echo $this->Form->input('open_to_public'); ?></td>
		<td width="20%"><?php echo $this->Form->input('disabled'); ?></td>
		<td width="20%"><?php echo $this->Form->input('hidden'); ?></td>
		<td width="20%"><?php echo $this->Form->input('unaggregate'); ?></td>
		<td width="40%">&nbsp;</td>
	</tr>
</table>
</div>

</div>

<script type="text/javascript">
	$('#tab_parent').tabs();
</script>

<?php echo $this->element("form_tips"); ?>

<script type="text/javascript">
$(document).ready(function() {
	// ダイアログボックスの初期化
	$('#r_search_result').dialog({
		bgiframe: true,
		autoOpen: false,
		width: 500,
		modal: true,
		buttons: {
			'閉じる': function() {
				$(this).dialog('close');
			}
		}
	});

	$('#r_search').click(function() {
		var rname = $('#EntrustResearcherName').val();
		if(rname == "") {
			alert("名前を一文字以上入力してください");
			return;
		}
		var url = "<?php echo $html->url('/researchers/ajax_search'); ?>";
		$.post(url,
			{ researcher_name: rname},
			function(data) {
				//alert(data);
				$('#r_search_result').html(data);
			}
		);
		$('#r_search_result').dialog('open');
	});
});

</script>


