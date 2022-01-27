# Symfony commands

Книга рецептов для работы с командами Symfony.

## make:migration

[Документация](https://symfony.com/doc/current/doctrine.html#migrations-adding-more-fields).

Создать миграцию из сущности.  
На самом деле, внутри вызывается команда `doctrine:migrations:diff` с предопределенными опциями.

## doctrine:migrations:diff

Создает миграцию, сравнивая текущую базу данных с сущностями (или схемой).

Опции:

* `namespace` (VALUE_REQUIRED) - Пространство имен, используемое для миграции (должно быть в списке настроенных пространств имен).
* `filter-expression` (VALUE_REQUIRED) - Таблицы, отфильтрованные регулярным выражением. Используются только имена таблиц, без имени базы.
* `formatted` (VALUE_NONE) - Sql будет отформатирован.
* `line-length` (VALUE_REQUIRED) - Максимальная длина неформатированных строк. По-умолчанию 120.
* `check-database-platform` (VALUE_OPTIONAL) - Проверить базу данных на сгенерированный код. По умолчанию false.
* `allow-empty-diff` (VALUE_NONE) - Не создавать исключение, если не обнаружено никаких изменений.
* `from-empty-schema` (VALUE_NONE) - Создайте полную миграцию, как если бы текущая база данных была пустой.

Пример:  
Создать миграцию только для определенной таблицы. table_name можно посмотреть в аннотации (или атрибуте) ORM\Table сущности.

```
bin/console doctrine:migrations:diff --filter-expression="/^table_name$/" --formatted
```

## make:entity

Опции:

* `name` - Имя класса сущности для создания или обновления
* `api-resource` - Пометить этот класс как ресурс API Platform (предоставить для него CRUD API).
* `broadcast` - Добавить возможность транслировать обновления сущностей с помощью Symfony UX Turbo.
* `regenerate` - Cгенерирует методы getter/setter для существующих полей.
* `overwrite` - Пересоздаст getter/setter методы.

## doctrine:mapping:import

[Документация](https://symfony.com/doc/current/doctrine/reverse_engineering.html).

Создать сущность из таблицы.  
Создастья сущность только со свойствами. Если вызнать еще раз, стараз сущность сотрется.

```
??? не проверено
php bin/console doctrine:mapping:import "App\Entity\Foo" annotation --path="src/Entity/Foo" --filter="foo"
> writing src/Entity/Foo.php
```

Аргументы:

* `name` - Пакет (bundle) или пространство имен для импорта информации о сопоставлении.
* `mapping-type` - Тип данных (xml, yaml, yml, annotation, php).

Опции:

* `path` - Путь, по которому будут генерироваться файлы (не используется при передаче name bundle).
* `em` - Используемый entity manager. По умолчанию `default`.
* `shard`
* `filter` - Шаблон строки, используемый для сопоставления сущностей, которые должны быть созданы. Можно указывать несколько filter опций.
* `force` - Перезаписать сущности, если они уже есть.
