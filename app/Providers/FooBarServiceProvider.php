<?php

namespace App\Providers;

use App\Data\Bar;
use App\Data\Foo;
use App\Service\HelloService;
use App\Service\HelloServiceIndonesia;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        Foo::class => Foo::class,
        Bar::class => Bar::class,
        HelloService::class => HelloServiceIndonesia::class
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
//        $this->app->singleton(Foo::class, function($app){
//            return new Foo();
//        });
//        $this->app->singleton(Bar::class, function($app){
//            return new Bar($app->make(Foo::class));
//        });
        $this->app->singleton(HelloService::class, function($app){
            return new HelloServiceIndonesia();
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function provides(): array
    {
        return [
            Foo::class,
            Bar::class,
            HelloService::class
        ];
    }
}