UPDATE 
    summaries as A 
    INNER JOIN researchers as R 
    ON A.personal_no = R.personal_no
    -- ON(A.personal_no = R.personal_no COLLATE  utf8_general_ci)
SET 
    A.cooperate_no = R.cooperate_no
WHERE 
    A.cooperate_no = '' and A.personal_no <> '' 
    and R.cooperate_no <> '' and R.cooperate_no is not null;
