DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'grants', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE grants DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'grants', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE grants DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'grants', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE grants DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
