<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    protected array $facadeBindings = [
        \App\Services\FlashService::class,
        \App\Services\IconService::class,
        \App\Services\MetaService::class,
        // insertion
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->facadeBindings as $binding) {
            $this->app->singleton($binding, fn () => new $binding);
        }
    }
}
