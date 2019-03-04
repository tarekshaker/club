# ![Laravel Example App](https://laravel.com/assets/img/components/logo-laravel.svg)


# Getting started

## Installation


Clone the repository

    git clone git@github.com:tarekshaker/club.git

Switch to the repo folder

    cd club

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://127.0.0.1:8000

**TL;DR command list**

    git clone git@github.com:tarekshaker/club.git
    cd club
    composer install
    cp .env.example .env

    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve


## API Specification



## JSON Objects returned by API:

Make sure the right content type like `Content-Type: application/json; charset=utf-8` is correctly returned.


## Endpoints:

### List all sports the club provide

`GET /api/sports`

### List all sessions sorted by sport 

`GET /api/sessionsSortedBySport`

### Get sessions based on specific sport

`GET /api/sessionsOfSport/{id}`

### Get all sessions having available slots

`GET /api/availableSessions`

### Get sport name which have max no of attendees

`GET /api/sportWithMaxAttendees`

### Book session for a used

`GET /api/bookings/add`

### Get user's sessions sorted by booking time

`GET /api/sessionWithBookingTime`

### Some crud endpoints are also provided

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/Api` - Contains all the api controllers
- `app/Http/Middleware` - Contains the JWT auth middleware
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `routes` - Contains all the api routes defined in api.php file


## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API


Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://127.0.0.1:8000/api
    
    
    
# Use Postman Collection

## Instructions

Download the postman collections file  "API.postman_collection.json" and import it into postman

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|
----------
