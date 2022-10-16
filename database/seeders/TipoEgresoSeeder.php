<?php

namespace Database\Seeders;

use App\Models\TipoEgreso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoEgresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEgreso::create([
            'tipo' => 'Pago de agua',
        ]);

        TipoEgreso::create([
            'tipo' => 'Pago de electricidad de áreas comunes',
        ]);

        TipoEgreso::create([
            'tipo' => 'Pago personal',
        ]);

        TipoEgreso::create([
            'tipo' => 'Mantenimiento',
        ]);

        TipoEgreso::create([
            'tipo' => 'Reparaciones',
        ]);

        TipoEgreso::create([
            'tipo' => 'Otros',
        ]);
    }
}
