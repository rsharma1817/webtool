<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Illuminate\Contracts\Routing\ResponseFactory::class, function() {
            return new \Laravel\Lumen\Http\ResponseFactory();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($value, $data = '') {
            return response()->json(['status' => 'success', 'msg' => $value, 'data' => $data], 200);
        });

        Response::macro('error', function ($value) {
            return response()->json(['status' => 'error', 'msg' => $value], 200);
        });

        Response::macro('info', function ($status, $value) {
            return response()->json(['status' => 'info', 'type' => $status, 'msg' => '', 'value' => $value], 200);
        });

    }

}
