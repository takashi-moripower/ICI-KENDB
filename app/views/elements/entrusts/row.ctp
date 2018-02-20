			<td><?php echo $this->Kendb->print_date($entrust['Entrust']['updated']); ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['updated_by']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['id']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['year']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['project_code']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['project_type']; ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($entrust['Entrust']['reception_date']); ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['person_in_charge']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['resolution_no']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['branch_no']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['continuance_no']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['cooperate_no']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['researcher_no']; ?>&nbsp;</td>
			<td><?php echo $this->Kendb->makeResearcherLink($entrust['Entrust']['researcher_name'], $entrust['Entrust']['researcher_no']); ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['department']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['major_name']; ?>&nbsp;</td>

			<td><?php echo $entrust['Entrust']['institute_code']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['school_code']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['course_code']; ?>&nbsp;</td>

			<td><?php echo $entrust['Entrust']['job_title']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['extension']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['post_no']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['email']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['subject']; ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($entrust['Entrust']['start_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($entrust['Entrust']['end_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($entrust['Entrust']['contraction_date']); ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['area_of_research']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['singular_or_multi']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['new_or_continuance']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['applicant_name_1']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['category_of_business']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['association_type']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['applicant_scale']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['applicant_name_2']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['business_title']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['representative']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['address']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['associate_researcher_name']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['number_of_researchers']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['start_budget_year']; ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "credit", null, "num", "number"); ?>
			<td><?php echo $entrust['Entrust']['payment']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['division_count']; ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "former_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "former_payment_r", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "former_payment_i", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "former_payment_sum", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_dr", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_u", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_g", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_r", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_i", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_sum", null, "num", "number"); ?>
			<td><?php echo $entrust['Entrust']['formula']; ?>&nbsp;</td>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "current_payment_alloc", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next1_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next1_payment_r", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next1_payment_i", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next1_payment_sum", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next2_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next2_payment_r", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next2_payment_i", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next2_payment_sum", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next3_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next3_payment_r", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next3_payment_i", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next3_payment_sum", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next4_payment_d", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next4_payment_r", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next4_payment_i", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "next4_payment_sum", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "d_total", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "r_total", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "i_total", null, "num", "number"); ?>
			<?php echo $this->Kendb->writeCell($entrust, "Entrust", "total_amount", null, "num", "number"); ?>
			<td><?php echo $this->Kendb->print_date($entrust['Entrust']['resolution_date']); ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($entrust['Entrust']['payment_due']); ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['payment_month']; ?>&nbsp;</td>
			<td><?php echo $this->Kendb->print_date($entrust['Entrust']['payment_date']); ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['advance']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['ow_post_no']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['ow_address']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['ow_company_name']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['ow_section']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['ow_title']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['ow_name']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['ow_tel']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['ow_fax']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['ow_email']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['bill_post_no']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['bill_address']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['bill_company_name']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['bill_section']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['bill_title']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['bill_name']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['bill_tel']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['bill_fax']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['bill_email']; ?>&nbsp;</td>
			<td><?php echo $this->Kendb->shorten_string($entrust['Entrust']['entrust_remarks']); ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['open_to_public']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['disabled']; ?>&nbsp;</td>
			<td><?php echo $entrust['Entrust']['hidden']; ?>&nbsp;</td>
