
DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

alter table summaries convert to character set utf8 collate utf8_unicode_ci;
CALL indexExists(@_exists, 'summaries', 'summaries_researcher_no_issue25', NULL);

IF @_exists= 0 THEN
    CREATE INDEX `summaries_researcher_no_issue25` 
    ON `summaries` (`researcher_no`);

END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
