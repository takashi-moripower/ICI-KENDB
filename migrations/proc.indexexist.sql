DROP PROCEDURE IF EXISTS indexExists;
delimiter //
CREATE PROCEDURE indexExists (
    OUT _exists BOOLEAN,      -- return value
    IN tableName CHAR(255),   -- name of table to look for
    IN indexName CHAR(255),  -- name of index to look for
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
    information_schema.statistics s 
  WHERE 
    s.TABLE_SCHEMA = @_dbName AND 
    s.TABLE_NAME = tableName AND 
    s.INDEX_NAME = indexName;
END IF;
END //
delimiter ;
