# Installation

- clone the repository
- run `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- update your .env with your database config
```DB_DATABASE=kaddebit```
- run `php artisan config:clear`
- run `php artisan serve`
