-- cooperate_no
--
select cooperate_no from contracts 
where  cooperate_no is not null and length(cooperate_no) <> 11 and cooperate_no <> '' ;

-- researcher_no
select researcher_no from contracts
where researcher_no is not null and length(researcher_no) <> 8 and researcher_no <> '';
