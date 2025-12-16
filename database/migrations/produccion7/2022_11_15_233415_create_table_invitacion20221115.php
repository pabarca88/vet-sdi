<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInvitacion20221115 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitacion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tipo_usuario')->nullable(); // profesional, asistente, institucion,
            $table->string('tipo_invitacion')->nullable(); //profesional, asistente, institucion
            $table->bigInteger('id_lugar_atencion')->nullable();
            $table->string('rut')->nullable();
            $table->string('nombre');
            $table->string('apellido_uno')->nullable();
            $table->string('apellido_dos')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email');
            $table->integer('informado')->nullable(); //conteo de envio de invitaciones por correo o mensaje
            $table->tinyInteger('procesado')->nullable()->default(0); // 0,1
            $table->dateTime('fecha_informado')->nullable();
            $table->dateTime('fecha_procesado')->nullable();
            $table->dateTime('fecha_aprobacion')->nullable();
            $table->dateTime('fecha_rechazo')->nullable();
            $table->bigInteger('id_user_solicitud');
            $table->integer('estado')->nullable()->default(0); // 0-nuevo, 1-aceptada, 2-rechazada, 3-procesada
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
        Schema::dropIfExists('invitacion');
    }
}
