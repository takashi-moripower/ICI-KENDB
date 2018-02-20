DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL fieldExists(@_exists, 'assessed_contributions', 'unaggregate', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `assessed_contributions` ADD COLUMN `unaggregate` bool default 0
    AFTER `hidden`;
    UPDATE `assessed_contributions` SET `unaggregate` = 0 WHERE `unaggregate` IS NULL;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
