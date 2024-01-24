<?php

namespace App\Providers;

use App\Models\Principal;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('noPrincipal', function () {
            $count = Principal::count();
            return true;
//            return $count == 0;
        });
    }
}
