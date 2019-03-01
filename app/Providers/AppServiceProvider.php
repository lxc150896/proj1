<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        URL::forceScheme('https');
        Schema::defaultStringLength(191);
        $data['categories'] = Category::all()->take(config('constant.six'));
        $all = count(Category::all());
        $data['category'] = Category::skip(config('constant.six'))->take($all - config('constant.three'))->get();
        view()->share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
        \App\Repositories\Post\PostCustomerInterface::class,
        \App\Repositories\Post\PostCustomerRepository::class,
        \App\Repositories\Post\PostRepositoryInterface::class,
        \App\Repositories\Post\PostEloquentRepository::class,

        \App\Repositories\Post\PostCustomersInterface::class,
        \App\Repositories\Post\PostCustomersRepository::class,
        \App\Repositories\Post\PostBillDetailInterface::class,
        \App\Repositories\Post\PostBillDetailRepository::class,

        \App\Repositories\Post\PostBillInterface::class,
        \App\Repositories\Post\PostBillRepository::class,
        \App\Repositories\Post\PostStatusInterface::class,
        \App\Repositories\Post\PostStatusRepository::class,

        \App\Repositories\Post\PostProductInterface::class,
        \App\Repositories\Post\PostProductRepository::class,

        \App\Repositories\Post\DeviceInterface::class,
        \App\Repositories\Post\DeviceRepository::class
    );
    }
}
