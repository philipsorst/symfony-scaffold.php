#!/bin/bash
(export SYMFONY_ENV="prod" && git pull && composer install --no-dev && bin/console assetic:dump)
