<div id="snavi">
	<ul>
		<?php if($can_add): ?>
	<li><?php echo $this->Html->link(__('New Nedo Jst Other', true), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<?php if($can_output_excel): ?>
		<li><a href="<?php echo $html->url('/nedo_jst_others/output_excel') .$urlparams . "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
		<li><a href="<?php echo $html->url('/nedo_jst_others/output_excel') .$urlparams . "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
	<?php endif; ?>
		<?php if($can_output_csv): ?>
		<li><a href="<?php echo $html->url('/nedo_jst_others/output_csv') .$urlparams; ?>">CSV形式ダウンロード</a></li>
	<?php endif; ?>
		</ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $this->element("table_switcher_head", array("count" => count($nedoJstOthers))); ?>

<script type="text/javascript">
function search_box_change(n) {
	$('#searchbox').html("検索ボックス作成中。しばらくお待ちください...");
	var url = "<?php echo $html->url('/nedo_jst_others/search_box/'); ?>";
	url = url + "search_param:" + n + "/";
	url = url + "<?php echo $urlparams; ?>";
	$.get(url,
		{},
		function(data) {
			$('#searchbox').html(data);
			$('#searchbox').show();
		}
	);
}
</script>

<?php $nedo = new NedoJstOther(); ?>

<div class="nedoJstOthers index">
	<h2><?php __('Nedo Jst Others');?></h2>
	<?php echo $this->element("data_search", array("modelname" => "NedoJstOther")); ?>
	<div id="searchbox_toggle">
	<a href="javascript:void(0);" onclick="javascript:search_box_change('1');return false;">管理データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('2');return false;">人事データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('3');return false;">プロジェクトデータで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('4');return false;">事業所データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('5');return false;">経理データで検索</a> |
	<!--
	<a href="javascript:void(0);" onclick="javascript:search_box_change('6');return false;">変更データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('7');return false;">契約変更データで検索</a> |
	-->
	<a href="javascript:void(0);" onclick="javascript:search_box_change('8');return false;">その他データで検索</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('9');return false;">データ件数と範囲を指定</a> |
	<a href="javascript:void(0);" onclick="javascript:search_box_change('0');return false;">全データで検索</a> |
	<input type="button" id="searchbox_button" value="表示切り替え" onclick="$('#searchbox').toggle();" />
	</div>
	<div id="searchbox">
	</div>
	<br clear="all" />

	<?php echo $this->element("paginate"); ?>

	<div class="fakeContainer">
	<table id="flexme">
	<thead>
	<tr>
		<th width="60" class="actions"><?php __('Actions'); ?></th>
		<th width="20"><?php echo $this->Paginator->sort('id'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('updated'); ?></th>
		<th width="40"><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th width="20"><?php echo $this->Paginator->sort(__('Parent Id', true), 'nedo_jst_other_id'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('year'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cooperate_no'); ?></th>
		<th width="35"><?php echo $this->Paginator->sort('project_type'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('researcher_no'); ?></th>
		<th width="50"><?php echo $this->Paginator->sort('arrange_no_1'); ?></th>
		<th width="50"><?php echo $this->Paginator->sort('arrange_no_2'); ?></th>
		<th width="50"><?php echo $this->Paginator->sort('arrange_no_3'); ?></th>
		<th width="50"><?php echo $this->Paginator->sort('arrange_no_4'); ?></th>
		<th width="50"><?php echo $this->Paginator->sort('arrange_no_5'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('project_code'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('master_registration'); ?></th>
		<th width="40"><?php echo $this->Paginator->sort('person_in_charge'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('application_reception_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_reception_date_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_reception_date_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_reception_date_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_reception_date_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_reception_date_5'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('titech_reception_no'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cc_titech_reception_no_1'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cc_titech_reception_no_2'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cc_titech_reception_no_3'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cc_titech_reception_no_4'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cc_titech_reception_no_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('notification_drafting_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_drafting_date_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_drafting_date_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_drafting_date_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_drafting_date_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_drafting_date_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('notification_settlement_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_settlement_date_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_settlement_date_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_settlement_date_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_settlement_date_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_settlement_date_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('notification_send_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_send_date_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_send_date_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_send_date_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_send_date_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_notification_send_date_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('contract_send_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_send_date_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_send_date_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_send_date_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_send_date_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_send_date_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('contract_reception_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_reception_date_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_reception_date_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_reception_date_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_reception_date_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('cc_contract_reception_date_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('amount_fixed_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('divide_paying'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('adjust_paying'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('charge_format'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('charge'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('charged_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('claimed_balance'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('charge_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_send_date_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_date_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_due_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_date_1'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('charge_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_send_date_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_date_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_due_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_date_2'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('charge_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_send_date_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_date_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_due_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_date_3'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('charge_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_send_date_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_date_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_due_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_date_4'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('charge_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_send_date_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_date_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_due_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_date_5'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('charge_6'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_send_date_6'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('statement_date_6'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_due_6'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('payment_date_6'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('accounting_report_due'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('accounting_report_format'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('accounting_report_request_day'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('accounting_report_reception_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('accounting_report_drafting_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('accounting_report_settlement_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('accounting_report_send_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('accomplishment_due'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('accomplishment_format'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('accomplishment_send_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('asset_belongingness'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('continuance_forcast'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('new_or_continuance'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('singular_or_multi'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('multi_year_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('competitive_fund'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('area'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('department'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('major_name'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('institute_code'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('school_code'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('course_code'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('job_title'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('researcher_name'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['email'], 'email'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('co_researcher'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('head_of_department'); ?></th>
		<th width="100"><?php echo $this->Paginator->sort('subject'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('ordering_organization_name'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('applicant_job_title'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('applicant_name'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('contractor_job_title'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('contractor_name'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('related_ministries'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('business_name'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('ordering_organization_type'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('government_type'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('area_of_research'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('start_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('end_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('memorandum_start_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('memorandum_end_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('reception_decision_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('contraction_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 1), 'contraction_change_date_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 1), 'contraction_change_outline_1'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 2), 'contraction_change_date_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 2), 'contraction_change_outline_2'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 3), 'contraction_change_date_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 3), 'contraction_change_outline_3'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 4), 'contraction_change_date_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 4), 'contraction_change_outline_4'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 5), 'contraction_change_date_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 5), 'contraction_change_outline_5'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 6), 'contraction_change_date_6'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 6), 'contraction_change_outline_6'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 7), 'contraction_change_date_7'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 7), 'contraction_change_outline_7'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 8), 'contraction_change_date_8'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 8), 'contraction_change_outline_8'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 9), 'contraction_change_date_9'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 9), 'contraction_change_outline_9'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 10), 'contraction_change_date_10'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 10), 'contraction_change_outline_10'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 11), 'contraction_change_date_11'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 11), 'contraction_change_outline_11'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 12), 'contraction_change_date_12'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 12), 'contraction_change_outline_12'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 13), 'contraction_change_date_13'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 13), 'contraction_change_outline_13'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 14), 'contraction_change_date_14'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 14), 'contraction_change_outline_14'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 15), 'contraction_change_date_15'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 15), 'contraction_change_outline_15'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 16), 'contraction_change_date_16'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 16), 'contraction_change_outline_16'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 17), 'contraction_change_date_17'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 17), 'contraction_change_outline_17'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 18), 'contraction_change_date_18'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 18), 'contraction_change_outline_18'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 19), 'contraction_change_date_19'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 19), 'contraction_change_outline_19'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Date %d', true), 20), 'contraction_change_date_20'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort(sprintf(__('Contraction Change Outline %d', true), 20), 'contraction_change_outline_20'); ?></th>
		<th width="50"><?php echo $this->Paginator->sort('cp_post_no'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cp_address'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cp_section'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cp_job_title'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cp_name'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cp_tel'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cp_extension'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort('cp_fax'); ?></th>
		<th width="70"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['cp_email'], 'cp_email'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('total_reception_amount'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_1'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_1'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_2'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_2'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_3'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_3'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_4'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_4'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_5'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_5'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_6'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_6'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_7'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_7'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_8'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_8'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_9'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_9'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('plural_year_10'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('plural_contract_amount_10'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['photothermic_cost'], 'photothermic_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['other_cost'], 'other_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['research_expense'], 'research_expense'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['reconsignment_cost'], 'reconsignment_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['general_administration_cost'], 'general_administration_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['total_primary_cost'], 'total_primary_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['titech_earnings'], 'titech_earnings'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['labo_earnings'], 'labo_earnings'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['indirect_cost'], 'indirect_cost'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['this_year_reception_amount'], 'this_year_reception_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort($nedo->output_column_label_alias['statement_amount'], 'statement_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('income_1'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('income_2'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('income_3'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('income_4'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('income_5'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('income_6'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('former1_project_code'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('former2_project_code'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('former3_project_code'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('functions_manual'); ?></th>
		<th width="30"><?php echo $this->Paginator->sort('implementation_document'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('contract_management_no'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('reported_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('fixed_amount'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('balance'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('turnback_amount'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('advance_confirmation_date'); ?></th>
		<th width="65"><?php echo $this->Paginator->sort('goods_system_registration_date'); ?></th>
		<th width="60"><?php echo $this->Paginator->sort('remarks'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($nedoJstOthers as $nedoJstOther):
		$class = "";
		if($nedoJstOther["NedoJstOther"]["disabled"]) {
			$class = ' class="disabled"';
		} else {
			if(isset($nedoJstOther["NedoJstOtherNode"]) && count($nedoJstOther["NedoJstOtherNode"]) >= 2) {
				$class = ' class="haschild"';
			}
		}
		$editing = "";
		if(in_array($nedoJstOther["NedoJstOther"]["id"], $current_editing)) {
			$editing = "★";
		}
	?>
	<tr<?php echo $class; ?>>
			<td class="actions">
			<?php if($nedoJstOther["NedoJstOther"]["nedo_jst_other_id"] == null): ?>
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $nedoJstOther['NedoJstOther']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?>
			<?php if($can_edit): ?><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $nedoJstOther['NedoJstOther']['id'], '?rtn='.$_SERVER["REQUEST_URI"])); ?><?php endif; ?>
			<?php echo $editing; ?>
			<?php else: ?>
			<a href="<?php echo $html->url('/nedo_jst_others/view/'.$nedoJstOther["NedoJstOther"]["nedo_jst_other_id"]); ?>">明細</a>
			<?php endif; ?>
			</td>
			<?php echo $this->element("nedo_jst_others/row", array("item" => $nedoJstOther, "child" => false)); ?>
	</tr>
		<?php if(isset($nedoJstOther["NedoJstOtherNode"]) && count($nedoJstOther["NedoJstOtherNode"]) >= 2): ?>
		<?php foreach($nedoJstOther["NedoJstOtherNode"] as $item): ?>
		<tr class="child">
		<td align="right"><?php echo $html->image('badge.png', array('width' => 16, 'height' => 16)); ?></td>
		<?php $item2["NedoJstOther"] = $item; ?>
		<?php echo $this->element("nedo_jst_others/row", array("item" => $item2, "child" => true)); ?>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>

	<?php echo $this->element("paginate"); ?>

</div>

<?php echo $this->element("form_tips"); ?>

<?php echo $this->element("table_switcher_foot"); ?>


