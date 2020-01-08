# INSTALLATION APP
# Copy content from .env.example to .env and complete with data.
$ composer install
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:create
$ php bin/console doctrine:fixtures:load --append
$ php bin/console fos:user:create --super-admin
$ php bin/console assets
$ php bin/console server:start 0.0.0.0:8001
# And finaly go to link: http://127.0.1.1:8001/admin

# Symfony4 useful commands
$ php bin/console about
$ php bin/console server:run
$ php bin/console server:start 0.0.0.0:8000
$ php bin/console debug:router
$ php bin/console debug:twig
$ php bin/console debug:translation fr
$ php bin/console make:entity
$ php bin/console doctrine:generate:entities
$ php bin/console doctrine:mapping:import "App\Entity" xml --path=config/doctrine
$ php bin/console make:migration
$ php bin/console make:entity --regenerate App
$ php bin/console assets:install
$ php bin/console doctrine:cache:clear-metadat