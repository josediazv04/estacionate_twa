<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifaBloquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tarifa_bloque');
        
        Schema::create('tarifa_bloque', function (Blueprint $table) {
            $table->increments('id'); // Id incremental de la tarifa de los bloques
            $table->integer('valor'); // Valor del bloque
            $table->dateTime('hora_ini'); // Hora de inicio del bloque
            $table->dateTime('hora_ter'); // Hora de término del bloque
            $table->integer('local_id')->unsigned(); // Foreign Key del local
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifa_bloque');
    }
}
