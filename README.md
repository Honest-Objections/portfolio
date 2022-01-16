# Portfolio Website

Basic website built on Laravel and Vue (sadly, just prior to the adoption of Vue 3) for displaying previous work

# Setup 

```shell
composer install
php artisan sail:install

./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan storage:link
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail npm install
./vendor/bin/sail npm run prod
```