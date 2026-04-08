<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel as HttpKernelContract;
use App\Http\Kernel as CustomKernel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(HttpKernelContract::class, CustomKernel::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('sarpMutate', function (?string $module = null): bool {
            if ($module === null || $module === '' || ! auth()->check()) {
                return false;
            }

            return auth()->user()->hasMutationAccess($module);
        });
    }
}
