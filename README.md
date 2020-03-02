# urbanX - Rent a car

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Projcet

urbanX is a web application for renting a cars. Guests can make an account and pick one role (user or customer).
There are three roles:
- `admin` **email:** admin@admin.com | **password:** password

- `user` **email:** user@user.com | **password:** password

- `customer` **email:** customer@customer.com | **password:** password

## Instalation urbanX

1. Clone the repository from github https://github.com/ValentinGj06/urbanX.
2. Install NPM globally if you haven't installed that already.
3. After installing NPM globally , run `npm install` inside your cloned folder, it will download all the required dependencies.
4. Install composer to your system and run `composer install` inside your cloned folder to install all laravel/php dependencies.
5. Create an `.env` file by running the following command: `cp .env.example .env`. Or alternately you can just copy `.env.example` file to the same folder and re-name it to `.env`.
6. run command: `php artisan key:generate` to generate a unique application key.
7. migrate the database, run `php artisan migrate`.
8. seed the database, run `php artisan db:seed`.

The urbanX web application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
