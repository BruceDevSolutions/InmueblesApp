<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('comprobantes');
        
        $this->call(UserSeeder::class);
        $this->call(PisoSeeder::class);
        $this->call(TipoIngresoSeeder::class);
        $this->call(TipoEgresoSeeder::class);
        $this->call(InmuebleSeeder::class);
        $this->call(IngresoSeeder::class);
        $this->call(MantenimientoSeeder::class);
    }
}
