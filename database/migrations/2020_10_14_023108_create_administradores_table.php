<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->string('api_token')->unique(); 
            $table->increments('id');
            $table->string('nombre',15);
            $table->string('apellido_paterno',15);
            $table->string('apellido_materno',15);
            $table->string('correo',25)->unique();
            $table->string('contraseña',25);
            $table->string('contraseña_verificacion',25);
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
        Schema::dropIfExists('administradores');
    }
}
