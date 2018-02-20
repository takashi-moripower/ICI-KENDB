DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL fieldExists(@_exists, 'summaries', 'personal_no', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `summaries` 
        ADD COLUMN `personal_no` varchar(10) DEFAULT NULL
        AFTER cooperate_no;
    ALTER TABLE `summaries` ALTER COLUMN `personal_no` DROP DEFAULT;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
