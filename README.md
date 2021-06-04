# Developer Anatoly's Notes

## Used technologies

### IDE

* [.editorconfig](https://editorconfig.org/)

### PHP
* [Green Zone PHP](https://www.php.net/supported-versions.php)
* [PhpMetrics](https://phpmetrics.org/)
* [Psalm](https://psalm.dev/)
* [PECL](http://pecl.php.net/)
* [Паттерны](https://designpatternsphp.readthedocs.io/ru/latest/README.html)

#### Xdebug
* [Upgrading from Xdebug 2 to 3](https://xdebug.org/docs/upgrade_guide)
* Soldatov: [Example Xdebug in Docker](https://github.com/soldatov/example-xdebug-docker)

#### XHProf
* Soldatov: [Example XHProf in Docker](https://github.com/soldatov/example-xhprof-73)

#### Composer
```
# Быстрая установка без проверки платформы и запуска скриптов.
> docker run --rm -v ${PWD}:/app composer composer install --ignore-platform-reqs --no-scripts
```

#### Symfony
* Symfony: [Validation Constraints](https://symfony.com/doc/current/reference/constraints.html)
* Symfony: [MicroKernelTrait](https://symfony.ru/doc/current/configuration/micro_kernel_trait.html)

#### Laravel
* Laravel: [Facades](https://laravel.com/docs/8.x/facades#facade-class-reference)

#### Swagger
* Github: [Install Swagger UI in Docker](https://github.com/swagger-api/swagger-ui/blob/master/docs/usage/installation.md#docker)
* Symfony: [NelmioApiDocBundle](https://symfony.com/doc/4.x/bundles/NelmioApiDocBundle/index.html)
* [Demo petstore.swagger.io](https://petstore.swagger.io)
* Github: [Demo petstore.swagger.io code](https://github.com/zircote/swagger-php/tree/master/Examples/petstore.swagger.io)
* Github: [OpenAPI-Specification](https://github.com/OAI/OpenAPI-Specification)
* [Standards of schemas CreativeWork](https://schema.org/CreativeWork)
* Soldatov: [Пример генерации клиента для PHP](https://github.com/soldatov/tester) в разделе Swagger codegen.
* Github: [Список сценариев генерации](https://github.com/swagger-api/swagger-codegen/releases) пишется в релизах.

### Docker
* [Commands Docker](https://docs.docker.com/engine/reference/run/)
* Github: [PHP extension installer](https://github.com/mlocati/docker-php-extension-installer)

#### Docer volumes on different OS

```
# If Windows CMD
> docker run -v %cd%:/app app:1
# If Windows PowerShell
> docker run -v ${PWD}:/app app:1
# If Windows Git Bash
> docker run -v /$(pwd):/app app:1
```

#### Docker Compose
* [Commands Docker Compose](https://docs.docker.com/compose/reference/)
* [Specification docker-compose.yml](https://docs.docker.com/compose/compose-file/)

### Nginx
* [Doc Nginx](https://nginx.org/ru/docs/)
* [Алфавитный указатель переменных](http://nginx.org/ru/docs/varindex.html)
* [CORS](https://enable-cors.org) (Server->Nginx)

### Traefik
* [Doc Traefik](https://doc.traefik.io/traefik/)

### Redis
* [Redis Gui rdm.dev](https://rdm.dev/)

### Jenkins
* [Jenkins function list for pipeline](https://www.jenkins.io/doc/pipeline/steps/)
* [Jenkins syntax](https://www.jenkins.io/doc/book/pipeline/syntax/)

### S3
* [Doc Minio](https://docs.minio.io/)
* Github: [Amazon S3 PHP Class](https://github.com/tpyo/amazon-s3-php-class)

## Online tools

* [JSON to PHP class generator](https://json2php.strikebit.io)
* [JSON parser](http://json.parser.online.fr/)
