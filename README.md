# blog-laravel
The project uses PHP 8 + Laravel 9 and Bootstrap 5 CSS framework.
## Installation

```bash
git clone https://github.com/D076/blog-laravel.git blog-laravel
cd blog-laravel
composer install
```
Create and configure .env file and your database before migration.
```bash
php artisan migrate
```

```bash
php artisan serve
```

To access the admin panel register new user and change on "User" table in your db field "role" to "0".
