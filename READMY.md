# Symfony4
$ bin/console about

$ bin/console server:start 0.0.0.0:8000

$ bin/console debug:router

$ bin/console debug:twig

$ php bin/console doctrine:database:create

$ php bin/console doctrine:fixtures:load --append

$ bin/console fos:user:create --super-admin

$ bin/console doctrine:schema:[create|update]

$ php bin/console debug:translation fr


$ php bin/console make:entity

$ php bin/console doctrine:generate:entities

$ php bin/console doctrine:mapping:import "App\Entity" xml --path=config/doctrine

$ php bin/console make:migration

$ php bin/console make:entity --regenerate App

$ bin/console assets:install