
# <p align="center">Convert client_id to Uuid in Laravel Passport</p>

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

Next In AuthServiceProvider @ `app/Providers/AuthServiceProvider.php` add `use Diadal\Passport\Passport;`

```php
<?php

namespace App\Providers;

use Diadal\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensCan([
            'all' => 'All Function',
            'create-invoice' => 'Create Invoice',
        ]);

        Passport::tokensExpireIn(now()->addDays(15));

        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}

```
Next, you should run the `passport:install` command
```php
php artisan passport:install
```

Final step @ `vendor/laravel/passport/src/Client.php` here add `public $incrementing = false;` and whenever you upgrade Laravel Passport check if `public $incrementing = false;` still present, am looking for a better way to implement this so there won't be a further need to edit in `vendor/laravel/passport/src/Client.php`  

```php
namespace Laravel\Passport;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $incrementing = false;
    // 
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_clients';

```

All default Laravel Passport remain the same  

## Official Documentation

Documentation for Passport can be found on the [Laravel website](http://laravel.com/docs/master/passport).

Subitm any issue <a href="https://github.com/diadal/passport/issues">check here</a> 


