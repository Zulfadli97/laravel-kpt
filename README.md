# Installation

- clone the repository
- run `composer install`
- run `npm install && npm run dev`
- `cp .env.example .env`
- `php artisan key:generate`
- update your .env with your database config
- run `php artisan config:clear`
- run  `php artisan migrate:fresh --seed` . this will delete and migrate back all the database and after completing migrations, it will start to seed the fake data to the system.
