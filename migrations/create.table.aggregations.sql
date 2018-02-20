DROP TABLE IF EXISTS aggregate_ranking;

CREATE TABLE aggregate_ranking
    (
     id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
     rank integer NOT NULL,
     year integer NOT NULL,
     amount bigint NULL DEFAULT 0,
     count bigint NULL DEFAULT 0,
     personal_no varchar(20) NOT NULL,
     researcher_name varchar(100) NOT NULL,
     major_name varchar(255) NOT NULL,
     job_title varchar(255) NOT NULL,
     birthdayYMD integer NOT NULL, 
     age_based_at integer NOT NULL, 
     age integer NOT NULL,
     sex varchar(4) NULL
    )
COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS aggregate_counts;
CREATE TABLE aggregate_counts
    (
     id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
     rank integer NOT NULL,
     year integer NOT NULL,
     amount bigint NULL DEFAULT 0,
     count bigint NULL DEFAULT 0,
     personal_no varchar(20) NOT NULL,
     researcher_name varchar(100) NOT NULL,
     major_name varchar(255) NOT NULL,
     job_title varchar(255) NOT NULL,
     birthdayYMD integer NOT NULL, 
     age_based_at  integer NOT NULL,
     age integer NOT NULL,
     sex varchar(4) NULL
    )
COLLATE utf8_unicode_ci;
   
DROP TABLE IF EXISTS aggregate_years;
CREATE TABLE aggregate_years
    (
     id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
     rank integer NOT NULL,
     personal_no varchar(20) NOT NULL,
     year integer NOT NULL
    )
COLLATE utf8_unicode_ci;
