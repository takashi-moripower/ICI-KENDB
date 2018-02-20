DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'nedo_jst_others', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE nedo_jst_others DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'nedo_jst_others', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE nedo_jst_others DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'nedo_jst_others', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE nedo_jst_others DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
