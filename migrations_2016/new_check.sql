SELECT
    TABLE_NAME
    , COLUMN_NAME
FROM
    information_schema.COLUMNS
WHERE
    (
        TABLE_SCHEMA =  'kendb'
    )
    AND (
        COLUMN_NAME =  'institute_code'
        OR COLUMN_NAME =  'school_code'
        OR COLUMN_NAME =  'course_code'
    );