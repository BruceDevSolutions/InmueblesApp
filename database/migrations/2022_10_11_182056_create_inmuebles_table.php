<?php

use App\Models\Inmueble;
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
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('identificador');
            $table->enum('tipo_inmueble', [Inmueble::DEPARTAMENTO, Inmueble::LOCAL_COMERCIAL]);
            $table->double('monto_expensa',6,2);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('set null')->onDelete('set null');
            
            $table->unsignedBigInteger('piso_id')->nullable();
            $table->foreign('piso_id')->references('id')->on('pisos')->onUpdate('set null')->onDelete('set null');

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
        Schema::dropIfExists('inmuebles');
    }
};
