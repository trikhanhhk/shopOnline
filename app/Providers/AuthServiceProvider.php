<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.view'));
        });
        Gate::define('manager', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.manager'));
        });
        Gate::define('manager_user', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.manager_user'));
        });


    }
}
