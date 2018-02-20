DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL fieldExists(@_exists, 'summaries', 'project_code', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `summaries` ADD COLUMN `project_code` varchar(100) NULL
    AFTER `end_date`;

    ALTER TABLE `summaries` ALTER COLUMN `project_code` DROP DEFAULT;

END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
