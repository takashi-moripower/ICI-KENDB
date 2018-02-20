DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'assessed_contributions', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE assessed_contributions DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'assessed_contributions', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE assessed_contributions DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'assessed_contributions', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE assessed_contributions DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
