<?php

namespace Database\Seeders;

use App\Models\TipoIngreso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoIngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoIngreso::create([
            'tipo' => 'Pago de expensas'
        ]);

        TipoIngreso::create([
            'tipo' => 'Pago por publicidad'
        ]);

        TipoIngreso::create([
            'tipo' => 'Alquiler de área común'
        ]);

        TipoIngreso::create([
            'tipo' => 'Otros'
        ]);
    }
}
