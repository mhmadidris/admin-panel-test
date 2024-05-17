# Admin Panel Website

## Instructions:

#### Install Laravel Project

1.  clone this repository
2.  run `npm install` and `npm run build`
3.  run composer install `composer install`
4.  duplicate the example .env file, and rename the duplicate file to .env
5.  configure DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD in .env file (see configure database in database section)
6.  create database in pgAdmin (if using postgreSQL) / phpMyAdmin (if using MySQL) and create database name "admindb"
7.  run `php artisan migrate`
8.  run `php artisan db:seed`
9.  run `php artisan key:generate`
10. run `php artisan serve`

## Configure Database

#### PosgreSQL

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=admindb
DB_USERNAME=
DB_PASSWORD=
```

#### MySQL

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admindb
DB_USERNAME=
DB_PASSWORD=
```

## Dummy Account

**Admin** <br />
Email: admin@mail.com <br />
Password: admin123
<br />
<br />
**Customer** <br />
Email: customer@mail.com <br />
Password: customer123

## Plugin/Libraries/Template:

-   Laravel
-   CoreUI
-   Laratrust
-   Livewire
-   SweetAlert
