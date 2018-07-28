<?php

namespace Diadal\Passport;

use \Laravel\Passport\Passport as PassportDiadal;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\RouteRegistrar;

class Passport extends PassportDiadal
{

     public static $authCodeModel = '\Diadal\Passport\AuthCode';

    /**
     * The client model class name.
     *
     * @var string
     */
    public static $clientModel = '\Diadal\Passport\Client';

    /**
     * The personal access client model class name.
     *
     * @var string
     */
    public static $personalAccessClientModel = '\Diadal\Passport\PersonalAccessClient';

    /**
     * The token model class name.
     *
     * @var string
     */
    public static $tokenModel = '\Diadal\Passport\Token';

    public static function routes($callback = null, array $options = [])
    {
        $callback = $callback ?: function ($router) {
            $router->all();
        };

        $defaultOptions = [
            'prefix' => 'oauth',
            'namespace' => '\Diadal\Passport\Http\Controllers',
        ];

        $options = array_merge($defaultOptions, $options);

        Route::group($options, function ($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });
    }

   

}
