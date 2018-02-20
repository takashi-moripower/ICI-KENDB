				<td><?php echo $grant["Grant"]['id']; ?>&nbsp;</td>
				<td><?php echo $this->Kendb->print_date($grant["Grant"]['updated']); ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['updated_by']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['year']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['adoption_year']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['cooperate_no']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['researcher_no']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['project_code']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['assignment_no']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['grant_name']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['grant_project_name']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['project_assignment_name']; ?>&nbsp;</td>
				<td><?php echo $this->Kendb->print_date($grant["Grant"]['grant_initial_decision_date']); ?>&nbsp;</td>
				<td><?php echo $this->Kendb->print_date($grant["Grant"]['grant_initial_start_date']); ?>&nbsp;</td>
				<td><?php echo $this->Kendb->print_date($grant["Grant"]['grant_initial_end_date']); ?>&nbsp;</td>
				<td><?php echo $this->Kendb->print_date($grant["Grant"]['grant_this_year_decision_date']); ?>&nbsp;</td>
				<td><?php echo $this->Kendb->print_date($grant["Grant"]['grant_this_year_start_date']); ?>&nbsp;</td>
				<td><?php echo $this->Kendb->print_date($grant["Grant"]['grant_this_year_end_date']); ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['represent_type']; ?>&nbsp;</td>
				<td><?php echo $this->Kendb->makeResearcherLink($grant["Grant"]['represent_researcher_name'], $grant['Grant']['researcher_no']); ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['job_title']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['department']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['major_name']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['institute_code']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['school_code']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['course_code']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['grant_funds_institute']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['grant_delivery_institute']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['delegate_1']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['delegate_2']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['delegate_3']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['delegate_4']; ?>&nbsp;</td>
				<td><?php echo $grant["Grant"]['singular_or_multi']; ?>&nbsp;</td>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "balance_carried_forward", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "grant_this_year_decision_money", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "grant_this_year_reception_amount", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "primary_cost", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "indirect_cost", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "general_administration_cost", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "self_contribute_money", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "other_cost", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "delegate_1_money", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "delegate_2_money", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "delegate_3_money", null, "num", "number"); ?>
				<?php echo $this->Kendb->writeCell($grant, "Grant", "delegate_4_money", null, "num", "number"); ?>
				<td><?php echo $grant["Grant"]['billing_type']; ?>&nbsp;</td>
				<td><?php echo $this->Kendb->print_date($grant["Grant"]['kaken_system_registration_date']); ?>&nbsp;</td>
				<td><?php echo $this->Kendb->print_date($grant["Grant"]['reception_status_entry_date']); ?>&nbsp;</td>
				<td><?php echo $this->Kendb->shorten_string($grant["Grant"]['remarks1']); ?>&nbsp;</td>
				<td><?php echo $this->Kendb->shorten_string($grant["Grant"]['remarks2']); ?>&nbsp;</td>
				<td><?php echo $this->Kendb->shorten_string($grant["Grant"]['remarks3']); ?>&nbsp;</td>
