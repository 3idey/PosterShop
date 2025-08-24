<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // Simple admin gate to protect admin area
        Gate::define('manage-posters', function ($user) {
            return (bool) ($user->is_admin ?? false);
        });
    }
}
