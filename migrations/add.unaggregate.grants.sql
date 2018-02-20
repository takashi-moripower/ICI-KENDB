DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL fieldExists(@_exists, 'grants', 'unaggregate', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `grants` ADD COLUMN `unaggregate` bool default 0
    AFTER `hidden`;
    UPDATE `grants` SET `unaggregate` = 0 WHERE `unaggregate` IS NULL;
    -- ALTER TABLE `grants` ALTER COLUMN `unaggregate` DROP DEFAULT;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
