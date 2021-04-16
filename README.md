<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Cara Instal
Buka terminal, arahkan ke folder root local server (jika menggunakan xampp maka htdocs), setelah masuk di directory C:\xampp\htdocs, kemudian ketikan perintah berikut:

```shell
# clone repository
$ git clone https://github.com/lordfarhan/campus-web-app.git
# install composer-dependency
$ composer install
```

Sebelum kita memulai server web, pastikan kita sudah membuat database, bisa melalui phpmyadmin, kemudian lakukan generate key pada aplikasi, konfigurasikan file `.env` dan lakukan migrasi, perintahnya sebagaimana berikut:

```shell
# create copy of .env
$ copy .env.example .env
# create laravel key
$ php artisan key:generate
# laravel migrate
$ php artisan migrate
# serve
$ php artisan serve
```
