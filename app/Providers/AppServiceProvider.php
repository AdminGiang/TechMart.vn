<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Route::middleware('web') // Middleware "web" hoặc "api"
        ->group(base_path('routes/admin.php'));
    }
}
