DROP VIEW IF EXISTS summary_missing_researchers;
CREATE VIEW summary_missing_researchers(
    researcher_name,
    researcher_no,
    personal_no
) AS
SELECT DISTINCT
    S.researcher_name,
    S.researcher_no,
    S.personal_no
FROM
    summaries as S LEFT JOIN
    researchers as R 
ON
    S.researcher_no = R.researcher_no
WHERE
    R.researcher_no is NULL
ORDER BY
    S.researcher_name
    
