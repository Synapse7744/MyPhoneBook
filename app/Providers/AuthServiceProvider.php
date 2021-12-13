<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Company;
use App\Models\Collaborateur;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // User::class => UserPolicy::class,
        // Company::class => CompanyPolicy::class,
        // Collaborateur::class => CollaborateurPolicy::class,


    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('getRole', function (User $user) {
            if ($user->role === 'admin')
                return 2;
            else if ($user->role === 'gestion')
                return 1;
            else if ($user->role === 'user')
                return 0;
        });
    }
}
