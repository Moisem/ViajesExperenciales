<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->string('api_token')->unique(); 
            $table->increments('id');
            $table->integer('costo');
            $table->date('fecha_salida',15);
            $table->date('fecha_regreso',15);
            $table->integer('acompañantes');
            $table->integer('turista_id')->unsigned();
            $table->foreign('turista_id')->references('id')->on('turistas');
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
        Schema::dropIfExists('reservaciones');
    }
}