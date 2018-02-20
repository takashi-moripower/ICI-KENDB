
update entrusts 
set cooperate_no = ''
where cooperate_no = 'None' or cooperate_no = '0'  or cooperate_no = '-'   ;

update entrusts 
set researcher_no = ''
where researcher_no = 'None' or researcher_no = '0'  or researcher_no = '-'   ;


update entrusts 
set cooperate_no = lpad(cooperate_no,11,'0') 
where  cooperate_no is not null and length(cooperate_no) <> 11 and cooperate_no <> '' ;

update entrusts 
set researcher_no = lpad(researcher_no,8,'0') 
where researcher_no is not null and length(researcher_no) <> 8 and researcher_no <> '';



/*-----------------------------------------------------------------
 *
 */
-- cooperate_no
--
select cooperate_no from entrusts 
where  cooperate_no is not null and length(cooperate_no) <> 11 and cooperate_no <> '' ;

-- researcher_no
select researcher_no from entrusts
where researcher_no is not null and length(researcher_no) <> 8 and researcher_no <> '';
