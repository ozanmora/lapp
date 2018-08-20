# LAPP
![Mode: Develop](https://img.shields.io/badge/Mode-Develop-red.svg)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

#### LAPP is Base for New Laravel Projects.

**NOTE:**
> This project on Development Mode. You may encounter many errors while using it.

## About

## Features
#### A [Laravel](http://laravel.com/) 5.6.x with [AdminLTE](https://adminlte.io) 2.4.x project.

| Feature Details  |
| :------------ |
|Built on [Laravel](http://laravel.com/) 5.6.x|
|Built on [AdminLTE](https://adminlte.io) 2.4.x|
|Uses [PHP](https://php.net) 7.2.x|
|Uses [MySQL](https://github.com/mysql) 5.6.x Database|
|CRUD (Create, Read, Update, Delete) User Management|
|Soft Deleted Users Management System|
|Permanently Delete Soft Deleted Users|
|Restore Soft Deleted Users|
|View Soft Deleted Users|
|User Roles/ACL Implementation - Used [jeremykenedy/laravel-roles](https://github.com/jeremykenedy/laravel-roles)|
|CRUD (Create, Read, Update, Delete) Role Management|
|CRUD (Create, Read, Update, Delete) Permision Management|
|Breadcrumb - Used [davejamesmiller/laravel-breadcrumbs:5.x](https://github.com/davejamesmiller/laravel-breadcrumbs)|
|Menu - Used [lavary/laravel-menu](https://github.com/lavary/laravel-menu)|

## Installation Instructions
1. First of all go to the folder where you will create the project.
2. Clone this git repository as `your-project-name`;
```console
foo@bar:~$ git clone https://github.com/ozanmora/lapp.git your-project-name
```
2. Create a MySQL database for the project
3. Enter the project root folder
```console
foo@bar:~$ cd your-project-name
```
4. Copy `.env.example` file to `.env` in the project root folder
```console
foo@bar:~$ cp .env.example .env
```
5. Configure your `.env` file
6. Now run the following codes in the project root folder
```console
foo@bar:~$ composer update
```
```console
foo@bar:~$ php artisan key:generate
```
```console
foo@bar:~$ php artisan migrate
```
```console
foo@bar:~$ composer dump-autoload
```
```console
foo@bar:~$ php artisan db:seed
```
```console
foo@bar:~$ npm install
```
```console
foo@bar:~$ npm run dev
```
If you have not received any errors during this process, the progeny will work smoothly.

### [ChangeLog](https://github.com/ozanmora/lapp/blob/master/README.md)
### [License](https://github.com/ozanmora/lapp/blob/master/LICENSE)

