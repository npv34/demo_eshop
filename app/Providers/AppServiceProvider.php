<?php

namespace App\Providers;

use App\Http\Controllers\Admin\RoleConstant;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('change-password', function ($user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->id == RoleConstant::ROLE_USER ) {
                    return true;
                }
            }
            return false;
        });
    }
}
