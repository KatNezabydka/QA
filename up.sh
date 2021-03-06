#!/usr/bin/env bash

docker run --volume $PWD:/app --volume ~/.composer/:/tmp/ composer install -a

docker-compose up -d

docker-compose exec php php bin/console doctrine:migrations:migrate --no-interaction