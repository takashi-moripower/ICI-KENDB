-- cooperate_no
--
-- researcher_no

update adoptions
set researcher_no = ''
where researcher_no = '0';

update adoptions
set personal_no = ''
where personal_no = '0';

update adoptions
set personal_no = ''
where personal_no = '-';

update adoptions
set personal_no = lpad(personal_no,8,'0') 
where personal_no is not null and length(personal_no) <> 8 and personal_no <> '' ;

----
select cooperate_no from adoptions 
where  cooperate_no is not null and length(cooperate_no) <> 11 and cooperate_no <> '' ;

select researcher_no from adoptions
where researcher_no is not null and length(researcher_no) <> 8 and researcher_no <> '';

select personal_no from adoptions
where personal_no is not null and length(personal_no) <> 8 and personal_no <> '' ;
