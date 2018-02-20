
DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure() 
BEGIN

CALL indexExists(@_exists, 'aggregate_ranking', 'personal_no_aggr_rank', NULL);

IF @_exists= 0 THEN
    CREATE INDEX `personal_no_aggr_rank`
    ON `aggregate_ranking` (`personal_no`);

END IF;

CALL indexExists(@_exists, 'aggregate_years', 'personal_no_aggr_year', NULL);

IF @_exists= 0 THEN
    CREATE INDEX `personal_no_aggr_year`
    ON `aggregate_years` (`personal_no`);

END IF;

CALL indexExists(@_exists, 'aggregate_years', 'year_aggr_year', NULL);

IF @_exists= 0 THEN
    CREATE INDEX `year_aggr_year`
    ON `aggregate_years` (`year`);

END IF;


CALL indexExists(@_exists, 'aggregate_counts', 'personal_no_aggr_count', NULL);

IF @_exists= 0 THEN
    CREATE INDEX `personal_no_aggr_count`
    ON `aggregate_counts` (`personal_no`);

END IF;

CALL indexExists(@_exists, 'aggregate_counts', 'year_aggr_count', NULL);

IF @_exists= 0 THEN
    CREATE INDEX `year_aggr_count`
    ON `aggregate_counts` (`year`);

END IF;

END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
