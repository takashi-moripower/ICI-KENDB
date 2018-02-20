DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'entrusts', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE entrusts DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'entrusts', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE entrusts DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'entrusts', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE entrusts DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
