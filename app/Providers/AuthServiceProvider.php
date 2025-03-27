<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\Dish;
use App\Models\User;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Pagination\Paginator;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void 
    {
        $this->registerPolicies();
        Paginator::defaultView('pagination::bootstrap-4');

        Gate::define('destroy-dish', function (User $user, Dish $dish) {
            return
             $user->is_admin OR 
             $dish->time < 10;
        });

        Gate::define('create-dish', function (User $user) {
            return true;
        });
    }
}
