<?php

namespace Database\Seeders;

use App\Models\Piso;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Piso::create([
            'piso' => 'Planta baja'
        ]);

        Piso::create([
            'piso' => '1er piso'
        ]);

        Piso::create([
            'piso' => '2do piso'
        ]);

        Piso::create([
            'piso' => '3er piso'
        ]);

        Piso::create([
            'piso' => '4to piso'
        ]);

        Piso::create([
            'piso' => '5to piso'
        ]);
    }
}
