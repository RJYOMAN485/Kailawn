## How To Install

Run below code to install kailawn

- clone repository
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan storage:link
- php artisan migrate --seed
