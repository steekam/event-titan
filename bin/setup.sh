#!/bin/bash

echo("Installing frontend dependencies")
npm run install

echo("Building frontend assets")
npm run dev

echo("Installing compser dependencies")
composer install

echo("Creating .env file if it does not exist")
php -r "file_exists('.env') || copy('.env.example', '.env');"

echo("Generating APP_KEY")
php artisan key:generate --ansi

echo("Done! \n\n")
echo("Update database ENV variables in .env then run migrations afterwards.")
