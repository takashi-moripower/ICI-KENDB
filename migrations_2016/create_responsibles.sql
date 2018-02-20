DROP TABLE IF EXISTS responsibles;

CREATE TABLE responsibles
    (
     id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
     researcher_id integer,
     personal_no varchar(20) NOT NULL,
     organization varchar(32) NOT NULL,
     responsible_code varchar(255) NOT NULL,
     institute_code varchar(255) NOT NULL,
     school_code varchar(255) NOT NULL,
     course_code varchar(255) NOT NULL
    )
COLLATE utf8_unicode_ci;


