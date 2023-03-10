<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

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
        // Paginator::useBootstrap();
        JsonResource::withoutWrapping(); // vô hiệu hóa gói tài nguyên ngoài cùng
    }
}
