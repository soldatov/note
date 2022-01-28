# Rector

Пример перевода аннотаций в атрибуты.  
Применяется для аннотаций сущностей Symfony.

## Инструкция 

Редактируем Dockerfile под нужную версию PHP.
```
docker-compose build
docker-compose up -d
```

Заходим в терминал контейнера. Выполняем.
```
composer require rector/rector
vendor/bin/rector init
```

В корне появится файл rector.php. Редактируем, добавляя нужные настройки. 
```php
$containerConfigurator->import(DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES);
$containerConfigurator->import(SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES);
$containerConfigurator->import(NetteSetList::ANNOTATIONS_TO_ATTRIBUTES);
$containerConfigurator->import(SensiolabsSetList::FRAMEWORK_EXTRA_61);
```

В src кладен нужный файл. Выполняем.
```
vendor/bin/rector process src
```