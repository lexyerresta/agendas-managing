<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrap();

        Gate::define('admin', function(User $user) {
            return $user->level_user === 'admin';
        });

        Gate::define('staff', function(User $user) {
            return $user->level_user === 'staff';
        });

        Gate::define('eksternal', function(User $user) {
            return $user->level_user === 'eksternal';
        });
    }
}
