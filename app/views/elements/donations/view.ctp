<h3>プロジェクト</h3>
<table class="recordview">
<tr>
	<th><?php __('Id'); ?></th><td><?php echo $donation['Donation']['id']; ?></td>
</tr>
</table>
<br clear="all" />

<table class="recordview">
<tr>
	<th><?php __('Year'); ?></th>
	<th><?php __('Section In Charge'); ?></th>
	<th><?php __('Receipt No'); ?></th>
	<th><?php __('Receipt Send Date'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "year", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "section_in_charge", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "receipt_no", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "receipt_send_date", $compare_donation, null, "date"); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks Receipt'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "remarks_receipt", $compare_donation, "memo"); ?>
</tr>
<tr>
	<th><?php __('Payment Date'); ?></th>
	<th><?php __('Contract Resolution No'); ?></th>
	<th><?php __('Income Section Code'); ?></th>
	<th><?php __('Income Section Name'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "payment_date", $compare_donation, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "contract_resolution_no", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "income_section_code", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "income_section_name", $compare_donation); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Contract Obligation'); ?></th>
	<th><?php __('Contract Obligation Name'); ?></th>
	<th><?php __('Planned Income'); ?></th>
	<th><?php __('Foreign Money Type'); ?></th>
	<th><?php __('Planned Income Foreign'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "contract_obligation", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "contract_obligation_name", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "planned_income", $compare_donation, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "foreign_money_type", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "planned_income_foreign", $compare_donation, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Income Yen'); ?></th>
	<th><?php __('Subsidy Type'); ?></th>
	<th><?php __('Project Code'); ?></th>
	<th><?php __('Project Code Name'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "income_yen", $compare_donation, "num", "number"); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "subsidy_type", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "project_code", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "project_code_name", $compare_donation); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th colspan="5"><?php __('Vouching Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "vouching_remarks", $compare_donation, "memo"); ?>
</tr>
<tr>
	<th><?php __('Payment Due'); ?></th>
	<th><?php __('Contraction Date'); ?></th>
	<th><?php __('Contract Resolution Detail No'); ?></th>
	<th><?php __('Division Count'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "payment_due", $compare_donation, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "contraction_date", $compare_donation, null, "date"); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "contract_resolution_detail_no", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "division_count", $compare_donation); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th colspan="5"><?php __('Detail Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "detail_remarks", $compare_donation, "memo"); ?>
</tr>
<tr>
	<th><?php __('Research Promotion Name'); ?></th>
	<th><?php __('Research Promotion Year'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "research_promotion_name", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "research_promotion_year", $compare_donation); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th colspan="5"><?php __('Research Promotion Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "research_promotion_remarks", $compare_donation, "memo"); ?>
</tr>
<tr>
	<th><?php __('Variety'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "variety", $compare_donation); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th colspan="5"><?php __('Remarks'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "remarks", $compare_donation, "memo"); ?>
</tr>
<tr>
	<th><?php __('Obligation Name'); ?></th>
	<th><?php __('Ob Represent Name'); ?></th>
	<th><?php __('Ob Job Title'); ?></th>
	<th><?php __('Common Cost Check'); ?></th>
	<th><?php __('Common Cost'); ?></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "obligation_name", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "ob_represent_name", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "ob_job_title", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "common_cost_check", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "common_cost", $compare_donation, "num", "number"); ?>
</tr>
<tr>
	<th><?php __('Ob Postal Code'); ?></th>
	<th><?php __('Ob Address'); ?></th>
	<th><?php __('Ob Section'); ?></th>
	<th><?php __('Ob Person In Charge'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "ob_postal_code", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "ob_address", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "ob_section", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "ob_person_in_charge", $compare_donation); ?>
	<td>&nbsp;</td>
</tr>
<tr>
	<th>受入研究者<?php //__('Researcher Name'); ?></th>
	<th><?php __('Institute Code'); ?></th>
	<th><?php __('School Code'); ?></th>
	<th><?php __('Course Code'); ?></th>
	<th class="old_org borderR borderB"><?php __('Major Name'); ?>（受入研究者）</th>
</tr>

<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "researcher_name", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "institute_code", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "school_code", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "course_code", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "major_name", $compare_donation, 'old_org borderR'); ?>
</tr>

<tr>
	<th><?php __('Job Title'); ?></th>
	<th><?php __('Extension'); ?></th>
	<th><?php __('Email'); ?></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>

<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "job_title", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "extension", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "email", $compare_donation); ?>
	<td></td>
	<td></td>
</tr>

<tr>
	<th><?php __('Post No'); ?></th>
	<th><?php __('Cooperate No'); ?></th>
	<th><?php __('Researcher No'); ?></th>
	<th><?php __('Personal No'); ?></th>
	<th>&nbsp;</th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "post_no", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "cooperate_no", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "researcher_no", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "personal_no", $compare_donation); ?>
	<td>&nbsp;</td>
</tr>
</table>

<h3>システムデータ</h3>
<table class="recordview">
<tr>
	<th><?php __('Open To Public'); ?></th>
	<th><?php __('Disabled'); ?></th>
	<th><?php __('Hidden'); ?></th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "open_to_public", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "disabled", $compare_donation); ?>
	<?php echo $this->Kendb->writeCell($donation, "Donation", "hidden", $compare_donation); ?>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<th><?php __('Created'); ?></th>
	<th><?php __('Created By'); ?></th>
	<th><?php __('Updated'); ?></th>
	<th><?php __('Updated By'); ?></th>
	<th></th>
</tr>
<tr>
	<td><?php echo $this->Kendb->print_date($donation['Donation']['created']); ?>&nbsp;</td>
	<td><?php echo $donation['Donation']['created_by']; ?>&nbsp;</td>
	<td><?php echo $this->Kendb->print_date($donation['Donation']['updated']); ?>&nbsp;</td>
	<td><?php echo $donation['Donation']['updated_by']; ?>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>

