<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomicilioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilio', function (Blueprint $table) {
            $table->string('api_token')->unique(); 
            $table->increments('id');
            $table->string('estado',15);
            $table->string('municipio',15);
            $table->string('colonia',20);
            $table->integer('codigo_postal');
            $table->string('calle',15);
            $table->string('numero_interior',5);
            $table->string('numero_exterior',5);
            $table->string('referencias',50);
            $table->integer('turista_id')->unsigned();
            $table->foreign('turista_id')->references('id')->on('turistas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domicilio');
    }
}
