## Laravel Passport scaffold

This is template for authentication server based on Laravel <a href="https://laravel.com/docs/master/passport">Passport</a> (like Jetstream for Sanctum) with configured backend and frontend. Under the hood this scaffold also have <a href="https://github.com/laravel/fortify">Fortify</a> and UI auth components from <a href="https://github.com/laravel/ui">Laravel UI</a>. Rigth now project based on <a href="https://laravel.com/docs/8.x">Laravel 8</a>

## Installation

Install application

```bash
composer install
```

After installing, you may need to configure some permissions. Directories within the `storage` and the `bootstrap/cache` directories should be writable by your web server.

Install UI components

```bash
npm install
npm run prod
```

Copy `.env.example` to `.env` and fill `.env` with your environment data (like DB config etc).

Generate laravel key for your application

```bash
php artisan key:generate
```

Migrate database

```bash
php artisan migrate
```

Generate passport private/public files (will be generated at `storage` directory)

```bash
php artisan passport:keys
```

Register the first user via `http(s)://your-app.domain/register`. If you want the user to be able to manage clients and tokens - change `isAdmin` field for him to `1` in the `users` table.

If you want to be able to issue personal access tokens, you need to create personal client

```bash
php artisan passport:client --personal
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
