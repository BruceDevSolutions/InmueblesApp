<?php

namespace Database\Seeders;

use App\Models\Mantenimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MantenimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mantenimiento::create([
            'titulo' => 'Reparación de bomba de agua',
            'detalle' => 'Se necesita comprar una bomba de agua nueva',
            'presupuesto' => 1000,
            'user_id' => 1
        ]);

        Mantenimiento::create([
            'titulo' => 'Compra de material de limpieza',
            'detalle' => 'Se necesita comprar material de limpieza para las áreas comunes',
            'presupuesto' => 100,
            'user_id' => 1
        ]);
    }
}
