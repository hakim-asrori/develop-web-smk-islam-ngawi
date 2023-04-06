<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define("admin", function (User $user) {
            if ($user->role == $user::ADMIN) {
                return true;
            }

            return false;
        });

        Gate::define("guru", function (User $user) {
            if ($user->role == $user::GURU) {
                return true;
            }

            return false;
        });

        Gate::define("murid", function (User $user) {
            if ($user->role == $user::MURID) {
                return true;
            }

            return false;
        });
    }
}
