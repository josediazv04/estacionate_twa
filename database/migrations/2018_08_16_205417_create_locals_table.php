<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('local');

        Schema::create('local', function (Blueprint $table) {
            $table->increments('id'); // id autoincremental
            $table->float('coor_x',10,7); // Coordenada X
            $table->float('coor_y',10,7); // Coordenada Y
            $table->integer('cant_est'); // Cantidad de estacionamientos
            $table->integer('cant_disp'); // Cantidad de estacionamientos disponibles
            $table->string('hora_aten_ini'); // Horario de Inicio de Atención
            $table->string('hora_aten_ter'); // Horario de Termino de Atención
            $table->string('direccion'); // Dirección del estacionamiento
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local');
    }
}
