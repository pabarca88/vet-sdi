<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcompanante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanante', function (Blueprint $table) {
            $table->id();

            $table->string('rut');
            $table->integer('numero_documento')->nullable();
            $table->string('nombre');
            $table->string('apellido_uno');
            $table->string('apellido_dos');
            $table->string('email');
            $table->integer('estado')->default(1);

            $table->timestamps();
        });

        Schema::create('acompanante_dependiente', function (Blueprint $table) {
            $table->id();

            $table->integer('id_tipo');
            $table->bigInteger('id_responsable');
            $table->bigInteger('id_dependiente')->nullable();
            $table->bigInteger('id_acompanante');
            $table->integer('estado')->default(1);

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
        Schema::dropIfExists('acompanante');
        Schema::dropIfExists('acompanante_dependiente');
    }
}
