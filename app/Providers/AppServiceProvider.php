<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //paginator
//        Paginator::useTailwind();
        Paginator::useBootstrap();


        Blade::if('Moderator', function () {
            $user = Auth::user();
            return auth()->user() && $user->role_id == 3;
        });

        Blade::if('SuperAdmin', function () {
            $user = Auth::user();
            return auth()->user() && $user->role_id == 4;
        });
    }
}
