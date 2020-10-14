<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleReservacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reservacion', function (Blueprint $table) {
            $table->string('api_token')->unique(); 
            $table->increments('id');
            $table->enum('estado',['activo','inactivo']);
            $table->integer('vuelos_id')->unsigned();;
            $table->integer('reservacion_id')->unsigned();;
            $table->foreign('vuelos_id')->references('id')->on('vuelos');
            $table->foreign('reservacion_id')->references('id')->on('reservaciones');
            $table->softDeletes();
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
        Schema::dropIfExists('detalle_reservacion');
    }
}
