DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL fieldExists(@_exists, 'summaries', 'sex', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `summaries` 
        ADD COLUMN `sex` varchar(4) DEFAULT NULL
        AFTER cooperate_no;
    ALTER TABLE `summaries` ALTER COLUMN `sex` DROP DEFAULT;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
