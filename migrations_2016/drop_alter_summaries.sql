DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'summaries', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE summaries DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'summaries', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE summaries DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'summaries', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE summaries DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
