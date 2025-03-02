<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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

        View::composer('layouts.sidebar', function ($view) {
            // Using a raw query to fetch all active menus
            $menus = DB::table('menus')
                        ->where('status', 1) // Ensure we're getting only active menus
                        ->get();
        
            $view->with('menus', $menus);
        });
    }
}
