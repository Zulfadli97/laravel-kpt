# Installation

- clone the repository
- run `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- update your .env with your database config

```DB_DATABASE=kaddebit```

- run `php artisan config:clear`
- run `php artisan serve`

## For Sending Email 

    register at mailtrap.io and update your .env
        
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
```

and set 

```
MAIL_FROM_ADDRESS=tarmizi@mizi.my

```

### For running Job

    php artisan queue:listen
"# laravel-new" 
