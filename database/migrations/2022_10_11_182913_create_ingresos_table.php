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
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            
            $table->double('monto',8,2);
            $table->text('detalle')->nullable();
            $table->string('ruta_comprobante')->nullable()->default(null);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('set null')->onDelete('set null');
            
            $table->unsignedBigInteger('tipo_ingreso_id')->nullable();
            $table->foreign('tipo_ingreso_id')->references('id')->on('tipo_ingresos')->onUpdate('set null')->onDelete('set null');

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
        Schema::dropIfExists('ingresos');
    }
};
