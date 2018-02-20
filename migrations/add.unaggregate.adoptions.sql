DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL fieldExists(@_exists, 'adoptions', 'unaggregate', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `adoptions` ADD COLUMN `unaggregate` bool default 0
    AFTER `hidden`;
    UPDATE `adoptions` SET `unaggregate` = 0 WHERE `unaggregate` IS NULL;
    -- ALTER TABLE `adoptions` ALTER COLUMN `unaggregate` DROP DEFAULT;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
