			<td><?php echo $this->Kendb->print_date($contract["Contract"]['updated']); ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['project_code']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['updated_by']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['id']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['year']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['cooperate_no']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['researcher_no']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['assignment_no']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['funds_institute']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['project_name']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['project_assignment_name']; ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['project_start_year']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['initial_start_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['initial_end_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['this_year_start_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['this_year_end_date']); ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['new_or_continuance']; ?>&nbsp;</td>
			<td><?php echo $this->Kendb->makeResearcherLink($contract["Contract"]['represent_researcher_name'], $contract['Contract']['researcher_no']); ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['job_title']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['department']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['major_name']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['institute_code']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['school_code']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['course_code']; ?>&nbsp;</td>
			<td><?php echo $contract["Contract"]['singular_or_multi']; ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['contract_date']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "contract_amount", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "this_year_reception_amount", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "primary_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "common_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "indirect_cost", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "general_administration_cost", null, "num", "number"); ?>
			<td><?php echo $contract["Contract"]['billing_type']; ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['billing_date_1']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['payment_due_1']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['payment_date_1']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "credit_1", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['billing_date_2']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['payment_due_2']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['payment_date_2']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "credit_2", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['billing_date_3']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['payment_due_3']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['payment_date_3']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "credit_3", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['billing_date_4']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['payment_due_4']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($contract["Contract"]['payment_date_4']); ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($contract, "Contract", "credit_4", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->shorten_string($contract["Contract"]['remarks1']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($contract["Contract"]['remarks2']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($contract["Contract"]['remarks3']); ?>&nbsp;</td>
