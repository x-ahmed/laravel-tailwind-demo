<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class BackendViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerCachedBackendSidebarTree();
    }

    /**
     * Register cached backend sidebar tree links.
     *
     * composer dump-autoload
     * php artisan view:clear
     * php artisan route:clear
     * php artisan cache:clear
     *
     * @return void
     */
    private function registerCachedBackendSidebarTree(): void
    {
        if (Str::contains(request()->path(), 'admin')) {
            view()->composer('*', function ($view) {
                if (!Cache::has('backendSidebarTree')) {
                    Cache::forever('backendSidebarTree', Permission::tree());
                }

                $view->with([
                    'backendSidebarTree' => Cache::get('backendSidebarTree'),
                ]);
            });
        }
    }
}
