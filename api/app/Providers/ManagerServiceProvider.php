<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Manager\Manager;

class ManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('manager',function(){
            return new Manager();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
