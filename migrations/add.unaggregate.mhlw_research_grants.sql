DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL fieldExists(@_exists, 'mhlw_research_grants', 'unaggregate', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `mhlw_research_grants` ADD COLUMN `unaggregate` bool default 0
    AFTER `hidden`;
    UPDATE `mhlw_research_grants` SET `unaggregate` = 0 WHERE `unaggregate` IS NULL;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
