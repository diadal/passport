<?php

namespace Diadal\Passport;

use Laravel\Passport\PassportServiceProvider as PassportServiceProviderDiadal;

class PassportServiceProvider extends PassportServiceProviderDiadal
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
     public function boot()
    {
        $this->loadViewsFrom(base_path('vendor/laravel/passport/resources/views'), 'passport');

        $this->deleteCookieOnLogout();

        if ($this->app->runningInConsole()) {
            $this->registerMigrations();

            $this->publishes([
                base_path('vendor/laravel/passport/resources/views') => base_path('resources/views/vendor/passport'),
            ], 'passport-views');

            $this->publishes([
                base_path('vendor/laravel/passport/resources/assets/js/components') => base_path('resources/assets/js/components/passport'),
            ], 'passport-components');

            $this->commands([
                \Diadal\Passport\Console\InstallCommand::class,
                \Diadal\Passport\Console\ClientCommand::class,
                \Diadal\Passport\Console\KeysCommand::class,
            ]);
        }
    }

    protected function registerMigrations()
    {
        if (Passport::$runsMigrations) {
            return $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'passport-cilent-migrations');
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
