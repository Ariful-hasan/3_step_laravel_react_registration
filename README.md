# Three steps registration

This is a trhee step user registration application.
This application has two parts

* Server (Laravel)
* Client (React)

## Server

For the backend here I use, Laravel 9.*.
Steps are rquired to start the server.

## Create .env
```bash 
    *  change .env.example to ".env".
```

## Create DB 
```bash 
    *  create database name "laravel".
```

## CMD to start server 
```bash 
      composer update

      php artisan migrate

      php artisan serve
```

The app is running on 8000 port and url http://127.0.0.1:8000/

### Client

For the frontend here I use, React 18.*.

## CMD to start clien:
```bash
    npm install
    npm start
```
The app is running on 8000 port and url http://127.0.0.1:3000/