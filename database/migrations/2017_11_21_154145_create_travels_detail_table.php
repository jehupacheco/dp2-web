<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelsDetail', function (Blueprint $table) {
            $table->integer('id_travel');
            $table->increments('id_muestreo');
            $table->float('velocidad');
            $table->float('km_recorridos');//Desde el inicio del viaje hasta aquí
            $table->float('km_muestreo');//La distancia recorrida con respecto al muestreo anterior
            $table->timestamp('creado_a');//La hora de inicio del muestreo
            $table->timestamp('finalizado_a');//La hora de fin del muestreo
            $table->float('tiempo_muestreo');//tiempo que pasó para que se realice este muestreo con respecto al anterior
            $table->float('energy_level');//Nivel de energía en el momento del muestreo
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
        Schema::dropIfExists('travelsDetail');
    }
}
