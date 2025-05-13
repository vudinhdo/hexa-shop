<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        /**
         * *  Đăng ký danh mục cho tất cả các view
         * Sử dụng view composer để chia sẻ dữ liệu với tất cả các view
         */
        view()->composer('*', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
        /**
         * * Sử dụng Bootstrap cho phân trang
         * Sử dụng Bootstrap cho phân trang
         */
        Paginator::useBootstrap();
    }
}
