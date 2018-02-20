DROP PROCEDURE IF EXISTS fieldExists;
delimiter //
CREATE PROCEDURE fieldExists (
    OUT _exists BOOLEAN,      -- return value
    IN tableName CHAR(255),   -- name of table to look for
    IN columnName CHAR(255),  -- name of column to look for
    IN dbName CHAR(255)       -- specific db , or current db
) 
BEGIN
/*
    call fieldExists(@_exists, 'summaries', 'personal_no', NULL);
    select @_exists;
*/

SET @_dbName := IF(dbName IS NULL, database(), dbName);

IF CHAR_LENGTH(@_dbName) = 0
THEN
  -- No database, return False
  SELECT FALSE INTO _exists;
ELSE
  SELECT 
    IF(count(*) > 0, TRUE, FALSE) 
  INTO 
    _exists
  FROM 
    information_schema.COLUMNS c
  WHERE 
    c.TABLE_SCHEMA = @_dbName AND 
    c.TABLE_NAME = tableName AND 
    c.COLUMN_NAME = columnName;
END IF;
END //
delimiter ;
