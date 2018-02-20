DROP TABLE IF EXISTS organizations;

CREATE TABLE organizations
    (
     id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
     classifier varchar(20) NOT NULL,
     code varchar(255) NOT NULL,
     japanese_name varchar(1024) NOT NULL,
     english_name varchar(1024)
    )
COLLATE utf8_unicode_ci;


