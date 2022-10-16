<?php

namespace App\Providers;

use App\Models\Mantenimiento;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
            $event->menu->add([
                'text' => 'Tareas',
                'url'  => '/mantenimientos',
                'icon' => 'fas fa-toolbox',
                'label' => Mantenimiento::where('status', false)->count(),
                'label_color' => Mantenimiento::where('status', false)->count() ? 'danger' : 'success'
            ]);
        });
    }
}
