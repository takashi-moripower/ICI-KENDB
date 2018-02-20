DROP PROCEDURE IF EXISTS  migrate_procedure;

delimiter //
CREATE PROCEDURE migrate_procedure()
BEGIN

/*
 3カラムのうち一つだけが追加されている可能性はゼロなので、
 一つあれば全部あると判断し、なければ追加されていないと判断する
*/

CALL fieldExists(@_exists, 'grants', 'institute_code', NULL);

IF @_exists= 0 THEN
    ALTER TABLE `grants`
        ADD COLUMN `institute_code` VARCHAR( 100 ) NULL COMMENT '院コード',
        ADD COLUMN `school_code` VARCHAR( 100 ) NULL COMMENT '系コード',
        ADD COLUMN `course_code` VARCHAR( 100 ) NULL COMMENT 'コースコード';

    ALTER TABLE `grants` ALTER COLUMN `institute_code` DROP DEFAULT;
    ALTER TABLE `grants` ALTER COLUMN `school_code` DROP DEFAULT;
    ALTER TABLE `grants` ALTER COLUMN `course_code` DROP DEFAULT;

END IF;
END //
delimiter ;

CALL migrate_procedure();

DROP PROCEDURE migrate_procedure;