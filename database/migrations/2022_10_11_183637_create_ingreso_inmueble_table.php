<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_inmueble', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ingreso_id')->unique()->nullable();
            $table->foreign('ingreso_id')->references('id')->on('ingresos')->onUpdate('set null')->onDelete('set null');
            
            $table->unsignedBigInteger('inmueble_id')->nullable();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onUpdate('set null')->onDelete('set null');

            $table->date('pagado_hasta'); /* Fecha en que se registrará hasta que mes tiene validez el pago */
            $table->string('nombres', 50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso_inmueble');
    }
};
