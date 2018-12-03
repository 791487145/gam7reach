<?php

namespace App\Modules\Appcenter\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'appcenter');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'appcenter');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'appcenter');
        $this->loadConfigsFrom(__DIR__.'/../config');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}