<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center">
    <h2 align="center">POS System Using Laravel (WIP)</h2>
</p>

## Demo (WIP)
Watch demo [here](https://drive.google.com/file/d/1GJ2SZ9e7vxbtn0fQZSJy9cjosbYDCh94/view?usp=sharing).

## Installation

Step-by-step process to running the app. on another computer.

### Requirements

For system requirements, [Check Laravel Requirement](https://laravel.com/docs/9.x/deployment#server-requirements)

### Clone the repository from github.

    > git clone http://mis.uic.edu.ph:3000/MIS_ITRC_OJT/uic_pos [YourDirectoryName]

### Install dependencies

Laravel utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.

    > cd YourDirectoryName
    > composer install

### Config file

Configure `.env` file as needed. 

1. Set your database credentials in your `.env` file

- During development, SQLite was used for ease due to problems while using SQL Server. 
- Further testing will be done to implement SQL Server as the database for this project.

### Database

1. Migrate database table `> php artisan migrate`

### Install Node Dependencies

1. `> npm install` to install node dependencies
1. `> npm run dev` for development

### Run Server

1. `> php artisan serve` 
1. Visit `localhost:8000` in your browser.

On the page, **Register** for an account to proceed.

### Initial Repository

http://mis.uic.edu.ph:3000/mlonghas/test-pos