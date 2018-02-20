DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL fieldExists(@_exists, 'summaries', 'unaggregate', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `summaries` ADD COLUMN `unaggregate` bool default 0
    AFTER `hidden`;
    UPDATE `summaries` SET `unaggregate` = 0 WHERE `unaggregate` IS NULL;
    -- ALTER TABLE `summaries` ALTER COLUMN `unaggregate` DROP DEFAULT;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;