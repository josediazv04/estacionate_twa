<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('estacionamiento');

        Schema::create('estacionamiento', function (Blueprint $table) {
            $table->increments('id'); // Id incremental estacionamiento
            $table->boolean('estado'); // Estado del estacionamiento
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
        Schema::dropIfExists('estacionamiento');
    }
}
