<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use carbon\carbon;
use Illuminate\Support\Facades\Gate;
use app\Models\User;

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
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');

        Gate::define('admin', function(User $user){
            return $user->level === 2;
        });
        Gate::define('user', function(User $user){
            return $user->level === 1;
        });
    }
}
