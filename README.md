# Developer Anatoly's Notes

## PHP
* [Green Zone PHP](https://www.php.net/supported-versions.php)
* [JSON to PHP class generator](https://json2php.strikebit.io)

### Xdebug
* [Upgrading from Xdebug 2 to 3](https://xdebug.org/docs/upgrade_guide)
* Soldatov: [Example Xdebug in Docker](https://github.com/soldatov/example-xdebug-docker)

## Swagger
* Symfony: [NelmioApiDocBundle](https://symfony.com/doc/4.x/bundles/NelmioApiDocBundle/index.html)
* [Demo petstore.swagger.io](https://petstore.swagger.io)
* Github: [Demo petstore.swagger.io code](https://github.com/zircote/swagger-php/tree/master/Examples/petstore.swagger.io)
* Github: [OpenAPI-Specification](https://github.com/OAI/OpenAPI-Specification)
* [Standards of schemas CreativeWork](https://schema.org/CreativeWork)

## Docker
* [Commands Docker](https://docs.docker.com/engine/reference/run/)

### Docer volumes on different OS

```
# If Windows CMD
> docker run -v %cd%:/app app:1
# If Windows PowerShell
> docker run -v ${PWD}:/app app:1
# If Windows Git Bash
> docker run -v /$(pwd):/app app:1
```

## Docker Compose
* [Commands Docker Compose](https://docs.docker.com/compose/reference/)
* [Specification docker-compose.yml](https://docs.docker.com/compose/compose-file/)

## Nginx
* [Doc Nginx](https://nginx.org/ru/docs/)

## Traefik
* [Doc Traefik](https://doc.traefik.io/traefik/)

## Jenkins
* [Jenkins function list for pipeline](https://www.jenkins.io/doc/pipeline/steps/)

## Minio
* [Doc Minio](https://docs.minio.io/)
* Github: [Amazon S3 PHP Class](https://github.com/tpyo/amazon-s3-php-class)
