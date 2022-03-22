<?php

namespace App\Providers;

use Hamcrest\Arrays\IsArray;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('moreThan2',function($attribute, $value, $parameters, $validator) {
            if(is_array($value) && count($value) >= 2) return true;
            return false;
        });
    }
}
