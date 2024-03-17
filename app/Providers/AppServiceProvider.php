<?php

namespace App\Providers;

use App\Models\Dish;
use App\Models\User;
use Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\ServiceProvider;

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
			Paginator::defaultView('pagination::default');

			FacadesGate::define('destroy-dish', function (User $user, Dish $dish) {
				return $user->is_admin OR $dish->time < 30;
			});
    }
}
