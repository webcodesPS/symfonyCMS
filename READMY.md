# Symfony4
$ bin/console about

$ bin/console server:start 0.0.0.0:8000

$ bin/console debug:router

$ bin/console debug:twig

$ bin/console doctrine:database:create

$ bin/console doctrine:fixtures:load --append

$ bin/console fos:user:create --super-admin

$ bin/console doctrine:schema:[create|update]

$ bin/console debug:translation fr


$ bin/console make:entity

$ bin/console doctrine:generate:entities

$ bin/console doctrine:mapping:import "App\Entity" xml --path=config/doctrine

$ bin/console make:migration

$ bin/console make:entity --regenerate App

$ bin/console assets:install