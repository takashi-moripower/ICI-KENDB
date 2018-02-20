DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'researchers', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE researchers DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'researchers', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE researchers DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'researchers', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE researchers DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
