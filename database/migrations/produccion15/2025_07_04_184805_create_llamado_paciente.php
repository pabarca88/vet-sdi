<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLlamadoPaciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('llamado_paciente', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_sala_espera')->nullable();
            $table->bigInteger('id_televisor');
            $table->bigInteger('id_box');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional')->nullable();
            $table->bigInteger('id_hora_medica')->nullable();
            $table->integer('cantidad_llamados')->default(0);
            $table->date('fecha_llamado')->default(
                \Carbon\Carbon::now()->format('Y-m-d')
            );
            $table->time('hora_llamado')->default(
                \Carbon\Carbon::now()->format('H:i:s')
            );

            $table->bigInteger('id_usuario_llama')->nullable();

            $table->integer('estado')->default(1); // 0: En espera, 1: Llamado, 2: Atendido, 3: Cancelado

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
        Schema::dropIfExists('llamado_paciente');
    }
}
