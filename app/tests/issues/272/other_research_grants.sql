-- other_research_grants
update other_research_grants 
set cooperate_no = ''
where cooperate_no = 'None' or cooperate_no = '0'  or cooperate_no = '-'   ;

update other_research_grants 
set researcher_no = ''
where researcher_no = 'None' or researcher_no = '0'  or researcher_no = '-'   ;

update other_research_grants 
set personal_no = ''
where personal_no = 'None' or personal_no = '0'  or personal_no = '-'   ;


update other_research_grants 
set cooperate_no = lpad(cooperate_no,11,'0') 
where  cooperate_no is not null and length(cooperate_no) <> 11 and cooperate_no <> '' ;

update other_research_grants 
set researcher_no = lpad(researcher_no,8,'0') 
where researcher_no is not null and length(researcher_no) <> 8 and researcher_no <> '';

update other_research_grants 
set personal_no = lpad(personal_no,8,'0') 
where personal_no is not null and length(personal_no) <> 8 and personal_no <> '';

/*-----------------------------------------------------------------
 *
 */
-- cooperate_no
--
select cooperate_no from other_research_grants 
where  cooperate_no is not null and length(cooperate_no) <> 11 and cooperate_no <> '' ;

-- researcher_no
select researcher_no from other_research_grants
where researcher_no is not null and length(researcher_no) <> 8 and researcher_no <> '';

-- personal_no
select personal_no from other_research_grants
where personal_no is not null and length(personal_no) <> 8 and personal_no <> '' ;