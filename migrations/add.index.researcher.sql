
DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

-- 照合順序
alter table researchers convert to character set utf8 collate utf8_unicode_ci;

CALL indexExists(@_exists, 'researchers', 'researchers_researcher_no_issue25', NULL);

IF @_exists= 0 THEN
    CREATE INDEX `researchers_researcher_no_issue25` 
    ON `researchers` (`researcher_no`);

END IF;

CALL indexExists(@_exists, 'researchers', 'researchers_researcher_name_issue28', NULL);
IF @_exists= 0 THEN
    CREATE INDEX `researchers_researcher_name_issue28` 
    ON `researchers` (`researcher_name`);

END IF;


END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
