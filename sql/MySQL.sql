-- Поиск таблицы.
-- SHOW DATABASES;
SELECT DISTINCT T.TABLE_SCHEMA FROM information_schema.TABLES AS T LIMIT 100;

-- Поиск таблицы.
-- SHOW TABLES [FROM db_name];
SELECT T.TABLE_NAME, T.* FROM information_schema.TABLES AS T WHERE LOWER(T.TABLE_NAME) LIKE '%staff%' LIMIT 100;

-- Поиск колонки
SELECT T.COLUMN_NAME, T.TABLE_NAME, T.TABLE_SCHEMA, T.*
FROM information_schema.COLUMNS AS T
WHERE LOWER(T.COLUMN_NAME) LIKE '%staff%'
ORDER BY T.TABLE_SCHEMA, T.TABLE_NAME, T.COLUMN_NAME
LIMIT 100;

-- Поиск процедуры или функции
-- Поле ROUTINE_TYPE может быть PROCEDURE или FUNCTION.
SELECT * FROM information_schema.ROUTINES WHERE SPECIFIC_NAME like '%proc_name%'
