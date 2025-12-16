<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicio20220917 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('rut')->nullable();
            $table->bigInteger('id_direccion');
            $table->string('logo')->nullable();
            $table->string('telefono');
            $table->bigInteger('id_usuario');
            $table->string('email');
            $table->string('rut_responsable');
            $table->string('nombre_responsable');
            $table->bigInteger('id_servicio');
            $table->integer('estado')->nullable();
            $table->timestamps();
        });

        Schema::create('tipo_servicio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('estado');
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
        Schema::dropIfExists('servicios');
        Schema::dropIfExists('tipo_servicio');
    }
}
