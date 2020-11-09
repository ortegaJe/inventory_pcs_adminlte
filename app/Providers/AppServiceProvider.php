<?php

namespace App\Providers;

use App\Machine;
use App\User;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
    public function boot(Dispatcher $events)
    {

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text'        => 'Users',
                'url'         => 'technicians',
                'icon'        => 'users',
                'label'       => User::count(),
                //'can'         => DB::table('machines')->select('rol_id')->where('rol_id', '=', [1])->get(),
                'label_color' => 'success',
            ]);
        });
    }
}
