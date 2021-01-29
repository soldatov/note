# Notes dev

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
* https://nginx.org/ru/docs/

## Jenkins

* [Jenkins function list for pipeline](https://www.jenkins.io/doc/pipeline/steps/)
