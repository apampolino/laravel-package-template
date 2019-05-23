<?php

namespace Vendor\Package;

use Illuminate\Support\ServiceProvider;

use Vendor\Package\Package;

class PackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Vendor\Package', function(){

            return new Package();
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'package');

        $this->mergeConfigFrom(__DIR__ . '/config/package.php', 'package');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/resources/views/' => resource_path('views/vendor/package'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/public/assets/' => public_path('vendor/package'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/config/package.php' => config_path('package.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations')
        ], 'migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Vendor\Package\Commands\PackageCommand::class
            ]);
        }
    }
}