#!/usr/bin/env bash
echo "---------------"
echo "| Instalation |"
echo "---------------"

bin/console cache:clear

bin/console doctrine:schema:create

bin/console doctrine:fixtures:load --append

bin/console fos:user:create --super-admin