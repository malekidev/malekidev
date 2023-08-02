<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;


use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {


        if (Schema::hasTable('permissions')) {
            if (!Permission::where('name','access-admin')->exists()){
                Permission::create([
                    "name" => "access-admin",
                    "persian_name" => "دسترسی به پنل ادمین"
                ]);
            }
            if (Schema::hasTable('roles')){
                if (!Role::where('name','admin')->exists()){
                    $adminRole = Role::create([
                        'name' => 'admin',
                        'persian_name' => 'مدیر'
                    ]);
                    $adminRole->givePermissions('access-admin');
                }
            }
            Permission::all()->map(function ($permission) {
                Gate::define($permission->name, function (User $user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            });
        }


    }
}
