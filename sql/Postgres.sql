-- Поиск таблицы по колонке.
select table_name, column_name from information_schema.columns where table_schema='public' and column_name like '%test%';
