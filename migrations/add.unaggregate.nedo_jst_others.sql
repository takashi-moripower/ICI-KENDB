DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL fieldExists(@_exists, 'nedo_jst_others', 'unaggregate', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `nedo_jst_others` ADD COLUMN `unaggregate` bool default 0
    AFTER `hidden`;
    UPDATE `nedo_jst_others` SET `unaggregate` = 0 WHERE `unaggregate` IS NULL;
    -- ALTER TABLE `nedo_jst_others` ALTER COLUMN `unaggregate` DROP DEFAULT;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
