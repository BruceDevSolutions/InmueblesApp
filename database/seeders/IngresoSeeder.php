<?php

namespace Database\Seeders;

use App\Models\Ingreso;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingreso::create([
            'monto' => '20000',
            'detalle' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam exercitationem vel reprehenderit soluta autem amet molestias labore dolore minima! Tempora pariatur unde magnam labore possimus exercitationem nulla placeat? Tenetur, a.', 
            'user_id' => 1,
            'tipo_ingreso_id' => 4 
        ]);


        $ingreso1 = Ingreso::create([
            'monto' => '350',
            'detalle' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam exercitationem vel reprehenderit soluta autem amet molestias labore dolore minima! Tempora pariatur unde magnam labore possimus exercitationem nulla placeat? Tenetur, a.', 
            'user_id' => 1,
            'tipo_ingreso_id' => 1
        ]);

        $ingreso1->inmueble()->attach(5,[
            'pagado_hasta' => now()->subMonths(3),
            'nombres' => 'Nombre Completo',
        ]);

        $ingreso2 = Ingreso::create([
            'monto' => '500',
            'detalle' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam exercitationem vel reprehenderit soluta autem amet molestias labore dolore minima! Tempora pariatur unde magnam labore possimus exercitationem nulla placeat? Tenetur, a.', 
            'user_id' => 1,
            'tipo_ingreso_id' => 1
        ]);

        $ingreso2->inmueble()->attach(4, [
            'pagado_hasta' =>  now()->subMonths(4),
            'nombres' => 'Nombre del',
            'nombres' => 'Nombre Completo',
        ]);
    }
}
