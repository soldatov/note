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

-- Поиск процедуры или функции по названию
-- Поле ROUTINE_TYPE может быть PROCEDURE или FUNCTION.
SELECT * FROM information_schema.ROUTINES WHERE SPECIFIC_NAME like '%proc_name%'

-- 

-- Описание таблицы с полями
select
concat(t.TABLE_SCHEMA, '.', t.`TABLE_NAME`, '
', t.TABLE_COMMENT, '
', (
SELECT
group_concat(concat(c.`COLUMN_NAME`, if(trim(c.COLUMN_COMMENT) = '', '', concat(' - ', c.COLUMN_COMMENT))) separator '
')
FROM
  INFORMATION_SCHEMA.COLUMNS as c
WHERE c.TABLE_SCHEMA = t.TABLE_SCHEMA and c.`TABLE_NAME` = t.`TABLE_NAME`
), '
')
from information_schema.`TABLES` as t
where t.TABLE_SCHEMA in ('database') AND t.`TABLE_NAME` in ('table')
order by t.TABLE_SCHEMA, t.`TABLE_NAME`
