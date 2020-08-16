
# <p align="center">Convert client_id to Uuid in Laravel Passport</p>

<p align="center">
<a href="https://travis-ci.org/diadal/passport"><img src="https://travis-ci.org/diadal/passport.svg?branch=master" alt="Build Status"></a>
<a href="https://packagist.org/packages/diadal/passport"><img src="https://poser.pugx.org/diadal/passport/d/total.svg" alt="Total Downloads"></a>
<!-- <a href="https://packagist.org/packages/diadal/passport"><img src="https://poser.pugx.org/diadal/passport/v/stable.svg" alt="Latest Stable Version"></a> -->
<a href="https://packagist.org/packages/diadal/passport"><img src="https://poser.pugx.org/diadal/passport/license.svg" alt="License"></a>
</p>



## Introduction

Laravel Passport is an OAuth2 server and API authentication package that is simple and enjoyable to use.
This Package will enable you you convert client id and client_id to Uuid which is more secure and safe for production 

## Installation

```shell
composer require diadal/passport
```

Laravel 5.5 hight auto discover package  you may need to register in your config app.php under `providers`
```php
Diadal\Passport\PassportServiceProvider::class,
```
Next in `app/Providers/AppServiceProvider.php` add `\Laravel\Passport\Passport::ignoreMigrations();` to `register`
```php
public function register()
    {
        //....
        \Laravel\Passport\Passport::ignoreMigrations();
    }
```

Next
```php
php artisan config:clear
```

To publish Cilent Uuid migration use this 

```php
php artisan vendor:publish --tag=passport-cilent-migrations
```

if no file published try 
```php
php artisan config:clear
```
and retry `php artisan vendor:publish --tag=passport-cilent-migrations`

### Note you can use this both

## Migrate your Database 

```php
php artisan migrate
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
        \Laravel\Passport\Passport::useClientModel(\Diadal\Passport\Client::class);
        \Laravel\Passport\Passport::usePersonalAccessClientModel(\Diadal\Passport\PersonalAccessClient::class);

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

```php
php artisan config:clear
```

All default Laravel Passport remain the same  

## Official Documentation

Documentation for Passport can be found on the [Laravel website](http://laravel.com/docs/master/passport).

Any issue <a href="https://github.com/diadal/passport/issues">check here</a> 

also you can buy me a coffee @ [Patreon](https://www.patreon.com/diadal)


