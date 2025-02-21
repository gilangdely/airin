<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Validator::extend('username', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Z0-9_]+$/', $value);
        });
    
        Validator::replacer('username', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'Username hanya boleh mengandung huruf, angka, dan underscore.');
        });

        // Menggunakan View Composer secara langsung tanpa membuat class khusus
        View::composer('*', function ($view) {
            // Bagikan data ke semua
            // $view->with('noback', false);
            // $view->with('withError', true);
        });
    }
}
