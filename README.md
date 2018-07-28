
<p align="center"># Convert client_id to Uuid in Laravel Passport></p>

<p align="center">
<a href="https://travis-ci.org/diadal/passport"><img src="https://travis-ci.org/diadal/passport.svg?branch=master" alt="Build Status"></a>
<a href="https://packagist.org/packages/diadal/passport"><img src="https://poser.pugx.org/diadal/passport/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/diadal/passport"><img src="https://poser.pugx.org/diadal/passport/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/diadal/passport"><img src="https://poser.pugx.org/diadal/passport/license.svg" alt="License"></a>
</p>



## Introduction

Laravel Passport is an OAuth2 server and API authentication package that is simple and enjoyable to use.
This Package will enable you you convert client id and client_id to Uuid which is more secure and safe for production 

## Installation

```shell
composer require diadal/passport
```

To publish Cilent Uuid migration use this 

```php
php artisan vendor:publish --tag=passport-cilent-migrations
```
or
To publish Default migration use this

```php
php artisan vendor:publish --tag=passport-migrations
```

### Note you can use this both

## Migrate your Database 

```php
php artisan migrate
```

Laravel 5.5 hight auto discover package  you may need to register in your config app.php
```php
Diadal\Passport\PassportServiceProvider::class,
```


## Official Documentation

Documentation for Passport can be found on the [Laravel website](http://laravel.com/docs/master/passport).


