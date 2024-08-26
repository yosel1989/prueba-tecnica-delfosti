<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    private array $bindingInterfaces = [
        \Src\Product\Domain\ProductRepostioryInterface::class =>
        \Src\Product\Infrastructure\ProductRepositoryEloquent::class,

        \Src\User\Domain\UserRepositoryInterface::class =>
            \Src\User\Infrastructure\UserRepositoryEloquent::class,

        \Src\Order\Domain\OrderRepositoryInterface::class =>
            \Src\Order\Infrastructure\OrderRepositoryEloquent::class,

        \Src\OrderProduct\Domain\OrderProductRepositoryInterface::class =>
            \Src\OrderProduct\Infrastructure\OrderProductRepositoryEloquent::class,
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ( $this->bindingInterfaces as $interface => $implementation ){
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
