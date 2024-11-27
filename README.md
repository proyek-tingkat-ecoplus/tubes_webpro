
# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone https://github.com/proyek-tingkat-ecoplus/tubes_webpro.git

Switch to the repo folder

    cd ubes_webpro

Install all the dependencies using composer

    composer install

Install the npm 

    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

Run the npm for vite confifig

    npm run dev


You can now access the server at http://localhost:8000


**TL;DR command list**

    git clone https://github.com/proyek-tingkat-ecoplus/tubes_webpro.git
    cd tubes_webpro
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    npm run dev
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## credit
- [framework laravel](https://laravel.com/)
- [bootstrap](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
- [Datatables](https://yajrabox.com/docs/laravel-datatables/master/installation)
- [Asset bundling Vite](https://laravel.com/docs/11.x/vite)
- [Sweet Alert](https://sweetalert.js.org/guides/)


