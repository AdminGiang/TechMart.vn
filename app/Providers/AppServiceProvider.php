<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Products;
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

    public function boot()
{
    // Các logic boot khác của bạn có thể ở đây

    Gate::define('delete-product', function (User $user, Products $product = null) {
        // Kiểm tra nếu trường 'role' của người dùng là 'admin'
        return $user->role === 'admin';
    });
}
}
