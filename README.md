Yii 2 Dockerized
================

# Getting started

## Build images

1. `cp docker-compose-local-example.yml docker-compose.yml`;
2. Customize docker-compose.yml;
3. `chmod 777 runtime web/assets`;
4. `cd build && docker-compose build base`;
5. `cd ../ && docker-compose up -d`

## Fix codestyle

`docker-compose exec web /var/www/vendor/bin/php-cs-fixer fix`

## Run tests

`docker-compose exec web php /var/www/vendor/bin/phpunit`

## Composer require/update and rebuild images 

```bash
cd build
docker-compose run --rm composer require some/library
docker-compose build base
cd ../
docker-compose build web
docker-compose stop web && docker-compose rm web && docker-compose up -d web
...
PROFIT

```


## Make Composer Packages Available Locally

For some IDEs it's useful to have the composer packages available on your local
host system. To do so you can simply copy them from inside the container:

```
docker-compose exec web cp -rf /var/www/vendor ./
```

[Original readme](https://github.com/codemix/yii2-dockerized/blob/master/README.md)
