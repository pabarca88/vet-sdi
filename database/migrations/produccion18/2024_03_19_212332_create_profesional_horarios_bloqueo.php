<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalHorariosBloqueo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_horarios_bloqueo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_profesional');
            $table->bigInteger('id_lugar_atencion');
            $table->string('id_hora_medica')->nullable();
            $table->string('motivo')->nullable();
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->date('fecha_termino');
            $table->time('hora_termino');
            $table->integer('todo_dia')->default(0); //  1 = Todos los días, 0 = Solo algunas horas
            $table->integer('estado')->default(1); //0: Inactivo, 1: Activo

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
        Schema::dropIfExists('profesional_horarios_bloqueo');
    }
}
