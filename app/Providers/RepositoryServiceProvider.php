<?php


namespace App\Providers;


use App\Repositories\Contracts\OrderProductsRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Core\Eloquent\EloquentOrderProductsRepository;
use App\Repositories\Core\Eloquent\EloquentOrderRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            OrderRepositoryInterface::class,
            EloquentOrderRepository::class
        );

        $this->app->bind(
            OrderProductsRepositoryInterface::class,
            EloquentOrderProductsRepository::class
        );
    }

    public function boot()
    {
        //
    }
}
