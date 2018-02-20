DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'encourages', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE encourages DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'encourages', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE encourages DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'encourages', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE encourages DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
