<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;

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

        $user = \Auth::user();
        if (!app()->runningInConsole()) {
            $roles = Role::with('permissions')->get();
            //dd($roles);
            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissionArray[$permission->permission][] = $role->id;
                }
            }
             //dd($permissionArray); //return array with permission name as title and role associated with that permission
            foreach ($permissionArray as $permission => $roles) {
                //Defines the gate based on the user role
                Gate::define($permission, function ($user) use ($roles) {
                    // dd($user->role); //return the authenticated user
                    // return count(array_intersect($user->role->pluck('id')->toArray(), $roles));
                    // dd($user->role->id); //returns authenticated user id

                    
                    foreach($roles as $role){
                        if ($user->role->id == $role) {
                            return true;
                        }
                    }

                });
            }
        }
    }
}
