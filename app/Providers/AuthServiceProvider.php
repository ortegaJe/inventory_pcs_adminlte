<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
    public function boot(Role $role)
    {
        $this->registerPolicies();

        Gate::before(function ($user, $role) {
            return $user->haveRol()->contains($role);
        });

        /*Gate::define('admin', function (User $user, Role $role) {
            return $user->rol_id == $role->id;
        });*/

        /*$events->listen(BuildingMenu::class, function (BuildingMenu $event) {
                $event->menu->add('MAIN NAVIGATION');
                $event->menu->add([
                    'text'        => 'Users',
                    'url'         => 'technicians',
                    'icon'        => 'users',
                    'label'       => User::count(),
                    'can'         => 'admin',
                    'label_color' => 'success',
                ]);
            });*/
    }
}
