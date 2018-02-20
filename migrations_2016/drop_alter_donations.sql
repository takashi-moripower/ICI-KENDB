DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'donations', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE donations DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'donations', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE donations DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'donations', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE donations DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
