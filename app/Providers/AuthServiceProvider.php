<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Policies\LearningMaterial;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        LearningMaterial::class => LearningMaterialPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Implicitly grant "Super Admin" role for all permissions
        Gate::before(function ($user, $ability) {
            return $user->hasRole('administrator') ? true : null;
        });

        Gate::define('access-admin-area', function (User $user) {
            return $user->hasRole('administrator');
        });
    }
}
