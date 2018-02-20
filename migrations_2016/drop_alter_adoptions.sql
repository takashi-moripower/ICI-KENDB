DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'adoptions', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE adoptions DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'adoptions', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE adoptions DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'adoptions', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE adoptions DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
