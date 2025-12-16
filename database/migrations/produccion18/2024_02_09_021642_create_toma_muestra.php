<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTomaMuestra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tipo_toma', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('estado')->default(1); //0=inactivo, 1=Activo

            $table->timestamps();
        });

        Schema::create('tipo_embase', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('estado')->default(1); //0=inactivo, 1=Activo

            $table->timestamps();
        });

        Schema::create('toma_muestra', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_tipo_toma');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_lugar_atencion');
            $table->dateTime('fecha');
            $table->string('patologo_lab');
            $table->string('sospecha');
            $table->string('prioridad');
            $table->string('observacion')->nullable();
            $table->integer('estado')->default(1); //0=inactivo, 1=Activo

            $table->timestamps();
        });

        Schema::create('toma_muestra_detalle', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_toma_muestra');
            $table->string('id_tipo_embase');
            $table->string('observacion')->nullable();
            $table->integer('estado')->default(1); //0=inactivo, 1=Activo

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
        Schema::dropIfExists('tipo_toma');
        Schema::dropIfExists('tipo_embase');
        Schema::dropIfExists('toma_muestra');
        Schema::dropIfExists('toma_muestra_detalle');
    }
}
