<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Administrador */
        User::create([
            'name' => 'Mauro Arana',
            'email' => 'mauro@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => User::ADMINISTRADOR,
        ]);

        /* Copropietario/apoderado */
        User::create([
            'name' => 'Usuario Propietario',
            'email' => 'propietario@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => User::PROPIETARIO,
        ]);

        /* Copropietario/apoderado */
        User::create([
            'name' => 'Usuario Propietario 2',
            'email' => 'propietario2@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => User::PROPIETARIO,
        ]);

        /* Empleado */
        User::create([
            'name' => 'Portero trabajador',
            'email' => 'portero@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => User::TRABAJADOR,
        ]);
    }
}
