<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudes20221125 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_tipo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('estado')->default(1)->nullable();
            $table->timestamps();
        });

        Schema::create('solicitud', function (Blueprint $table) {
            $table->id();

            $table->string('solicitud_tipo'); //bodega, farmacia

            $table->bigInteger('id_solicitante');
            $table->dateTime('fecha_solicitud');
            $table->string('observacion_solicitud',255)->nullable();

            /** APROBACION */
            $table->bigInteger('id_persona_aprobacion')->nullable();
            $table->bigInteger('id_user_aprobacion')->nullable();
            $table->dateTime('fecha_aprobacion')->nullable();
            $table->string('observacion_aprobacion',255)->nullable();

            /** RECHAZO */
            $table->bigInteger('id_persona_rechazo')->nullable();
            $table->bigInteger('id_user_rechazo')->nullable();
            $table->dateTime('fecha_rechazo')->nullable();
            $table->string('observacion_rechazo',255)->nullable();

            /** PRECESO DE BODEGA */
            $table->bigInteger('id_persona_proceso_bod')->nullable();
            $table->bigInteger('id_user_proceso_bod')->nullable();
            $table->dateTime('fecha_proceso_bod')->nullable();
            $table->string('observacion_proceso_bod',255)->nullable();

            /** RETIRO */
            $table->bigInteger('id_persona_retiro')->nullable();
            $table->bigInteger('id_user_retiro')->nullable();
            $table->dateTime('fecha_retiro')->nullable();
            $table->string('observacion_retiro',255)->nullable();

            $table->string('estado')->default(1);

            $table->timestamps();
        });
        Schema::create('solicitud_detalle', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_solicitud')->nullable();
            $table->bigInteger('id_producto')->nullable();
            $table->string('codigo_producto')->nullable();
            $table->string('descripcion_producto');
            $table->string('cantidad');
            $table->string('estado')->default(1)->nullable();
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
        Schema::dropIfExists('solicitud_tipo');
        Schema::dropIfExists('solicitud');
        Schema::dropIfExists('solicitud_detalle');
    }
}
