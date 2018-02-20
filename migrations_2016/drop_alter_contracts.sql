DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'contracts', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE contracts DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'contracts', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE contracts DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'contracts', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE contracts DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
