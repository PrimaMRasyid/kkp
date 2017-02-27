<?php

namespace App\Providers;

use App\Fish;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('isProhibited', function ($attribute, $value, $parameters, $validator) {
            $fish = $parameters[0];

            $isProhibited = Fish::where('name','=',$fish)
                ->where('fish_type','=',2)
                ->first();

            return !$isProhibited;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
