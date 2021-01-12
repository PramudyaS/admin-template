<?php

namespace Larape\Admin_template;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Larape\Admin_template\config\MenuViewComposer;
use Larape\Admin_template\config\TemplateViewComposer;

class AdminTemplateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Larape\Admin_template\Http\Controllers\TemplateSettingController');
        $this->loadViewsFrom(__DIR__.'/views','larape');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        View::composer('larape::master.master',TemplateViewComposer::class);
        View::composer('larape::master.master',MenuViewComposer::class);

        $this->publishes([
            __DIR__.'/views/components'   => resource_path('views/vendor/admin-template')
        ]);
    }
}
