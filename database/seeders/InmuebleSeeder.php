<?php

namespace Database\Seeders;

use App\Models\Inmueble;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Planta baja */
        Inmueble::create([
            'identificador' => 'LC1',
            'tipo_inmueble' => '2',
            'monto_expensa' => 500,
            'user_id' => 2  ,
            'piso_id' => 1,
        ]);

        Inmueble::create([
            'identificador' => 'LC2',
            'tipo_inmueble' => '2',
            'monto_expensa' => 500,
            'user_id' => 2,
            'piso_id' => 1,
        ]);

        Inmueble::create([
            'identificador' => 'LC3',
            'tipo_inmueble' => '2',
            'monto_expensa' => 550,
            'user_id' => 2,
            'piso_id' => 1,
        ]);

        Inmueble::create([
            'identificador' => 'LC4',
            'tipo_inmueble' => '2',
            'monto_expensa' => 500,
            'user_id' => 2,
            'piso_id' => 1,
        ]);

        /* Primer piso (inmueble 5) */
        Inmueble::create([
            'identificador' => '1A',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 2,
        ]);

        Inmueble::create([
            'identificador' => '1B',
            'tipo_inmueble' => '1',
            'monto_expensa' => 300,
            'user_id' => 2,
            'piso_id' => 2,
        ]);

        Inmueble::create([
            'identificador' => '1C',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 2,
        ]);

        Inmueble::create([
            'identificador' => '1D',
            'tipo_inmueble' => '1',
            'monto_expensa' => 380,
            'user_id' => 2,
            'piso_id' => 2,
        ]);

        /* piso 2 */
        Inmueble::create([
            'identificador' => '2A',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 3,
        ]);

        Inmueble::create([
            'identificador' => '2B',
            'tipo_inmueble' => '1',
            'monto_expensa' => 300,
            'user_id' => 2,
            'piso_id' => 3,
        ]);

        Inmueble::create([
            'identificador' => '2C',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 3,
        ]);

        Inmueble::create([
            'identificador' => '2D',
            'tipo_inmueble' => '1',
            'monto_expensa' => 380,
            'user_id' => 2,
            'piso_id' => 3,
        ]);

        /* Piso 3 */
        Inmueble::create([
            'identificador' => '3A',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 4,
        ]);

        Inmueble::create([
            'identificador' => '3B',
            'tipo_inmueble' => '1',
            'monto_expensa' => 300,
            'user_id' => 2,
            'piso_id' => 4,
        ]);

        Inmueble::create([
            'identificador' => '3C',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 4,
        ]);

        Inmueble::create([
            'identificador' => '3D',
            'tipo_inmueble' => '1',
            'monto_expensa' => 380,
            'user_id' => 2,
            'piso_id' => 4,
        ]);

        /* Piso 4 */
        Inmueble::create([
            'identificador' => '4A',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 5,
        ]);

        Inmueble::create([
            'identificador' => '4B',
            'tipo_inmueble' => '1',
            'monto_expensa' => 300,
            'user_id' => 2,
            'piso_id' => 5,
        ]);

        Inmueble::create([
            'identificador' => '4C',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 5,
        ]);

        Inmueble::create([
            'identificador' => '4D',
            'tipo_inmueble' => '1',
            'monto_expensa' => 380,
            'user_id' => 2,
            'piso_id' => 5,
        ]);

        /* Piso 5 */
        Inmueble::create([
            'identificador' => '5A',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 6,
        ]);

        Inmueble::create([
            'identificador' => '5B',
            'tipo_inmueble' => '1',
            'monto_expensa' => 300,
            'user_id' => 2,
            'piso_id' => 6,
        ]);

        Inmueble::create([
            'identificador' => '5C',
            'tipo_inmueble' => '1',
            'monto_expensa' => 350,
            'user_id' => 2,
            'piso_id' => 6,
        ]);

        Inmueble::create([
            'identificador' => '5D',
            'tipo_inmueble' => '1',
            'monto_expensa' => 380,
            'user_id' => 2,
            'piso_id' => 6,
        ]);
    }
}
