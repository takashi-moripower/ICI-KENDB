DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

CALL fieldExists(@_exists, 'other_research_grants', 'institute_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE other_research_grants DROP institute_code ;
END IF;

CALL fieldExists(@_exists, 'other_research_grants', 'school_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE other_research_grants DROP school_code ;
END IF;

CALL fieldExists(@_exists, 'other_research_grants', 'course_code', NULL);
IF @_exists= 1 THEN
    ALTER TABLE other_research_grants DROP course_code ;
END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;
