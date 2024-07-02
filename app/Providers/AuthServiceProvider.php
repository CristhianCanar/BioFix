<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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

        /**
         * Otorgar implícitamente todos los permisos a la función "Superadministrador"
         * Esto funciona en la aplicación usando funciones relacionadas con la puerta como auth()->user->can() y @can()
         */
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super administrador') ? true : null;
        });
    }
}
