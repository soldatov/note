-- Поиск таблицы.
-- SHOW DATABASES;
SELECT DISTINCT T.TABLE_SCHEMA FROM information_schema.TABLES AS T LIMIT 100;

-- Поиск таблицы.
-- SHOW TABLES [FROM db_name];
SELECT T.TABLE_NAME, T.* FROM information_schema.TABLES AS T WHERE LOWER(T.TABLE_NAME) LIKE '%staff%' LIMIT 100;