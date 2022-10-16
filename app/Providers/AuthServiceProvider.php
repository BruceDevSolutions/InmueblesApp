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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('ver_dashboard', function($user){
            return $user->user_type === '1' || $user->user_type === '2';
        });

        Gate::define('agregar_tareas', function($user){
            return $user->user_type === '1' || $user->user_type === '3';
        });

        Gate::define('manipular_tareas', function($user){
            return $user->user_type === '1';
        });

        Gate::define('ver_ingresos', function($user){
            return $user->user_type === '1' || $user->user_type === '2';
        });

        Gate::define('manipular_ingresos', function($user){
            return $user->user_type === '1';
        });

        Gate::define('ver_egresos', function($user){
            return $user->user_type === '1' || $user->user_type === '2';
        });

        Gate::define('manipular_egresos', function($user){
            return $user->user_type === '1';
        });

        Gate::define('crear_usuarios', function($user){
            return $user->user_type === '1';
        });

        Gate::define('consultar_inmuebles', function($user){
            return $user->user_type === '1' || $user->user_type === '2';
        });

        Gate::define('actualizar_inmuebles', function($user){
            return $user->user_type === '1';
        });
    }
}
