DROP VIEW IF EXISTS aggregate_result;
CREATE VIEW aggregate_result(
    rank,
    researcher_name,
    personal_no, 
    age,
    year,
    year_count,
    year_amount,
    major_name,
    job_title,
    total_count,
    total_amount,
    sex,
    memo
) AS
SELECT
    Y.rank, 
    R.researcher_name,
    Y.personal_no, 
    R.age,
    Y.year, 
    IFNULL(C.count, 0) as year_count, 
    IFNULL(C.amount, 0) as year_amount,
    R.major_name,
    R.job_title,
    IFNULL(R.count, 0) as total_count, 
    IFNULL(R.amount, 0) as togal_amount,
    R.sex ,
    ''
FROM
    aggregate_years Y 
    LEFT OUTER JOIN aggregate_counts C
        ON 
        Y.personal_no = C.personal_no 
        AND Y.year = C.year
    INNER JOIN aggregate_ranking R
        ON Y.personal_no = R.personal_no
ORDER BY
    Y.rank, Y.personal_no, Y.year ;
