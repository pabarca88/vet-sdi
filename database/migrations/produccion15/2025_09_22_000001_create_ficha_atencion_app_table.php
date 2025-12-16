<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaAtencionAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_atencion_app', function (Blueprint $table) {
            $table->id();

            // Campos basados en el JSON proporcionado
            $table->string('id_paciente');
            $table->string('rut_profesional');
            $table->string('nombre_profesional');
            $table->string('correo_profesional');
            $table->string('telefono_profesional');
            $table->string('especialidad')->nullable();
            $table->string('tipo_especialidad')->nullable();
            $table->string('sub_tipo_especialidad')->nullable();
            $table->text('diagnosticos')->nullable();
            $table->text('examenes')->nullable();
            $table->text('medicamentos')->nullable();
            $table->string('rut_dependiente')->nullable();

            // Campo token solicitado por el usuario
            $table->string('token')->nullable();

            // Campos de control
            $table->integer('estado')->default(1); // 1: Activo, 0: Inactivo
            $table->timestamps();

            // Índices para optimizar consultas
            $table->index('id_paciente');
            $table->index('rut_profesional');
            $table->index('token');
            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_atencion_app');
    }
}