<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user-list', function ($admin) {
            return $admin->Check_Permissions('user-list');
        });
        Gate::define('user-edit', function ($admin) {
        return $admin->Check_Permissions('user-edit');
        });
        Gate::define('user-delete', function ($admin) {
            return $admin->Check_Permissions('user-delete');
        });
        Gate::define('user-add', function ($admin) {
            return $admin->Check_Permissions('user-add');
        });
    }

}
