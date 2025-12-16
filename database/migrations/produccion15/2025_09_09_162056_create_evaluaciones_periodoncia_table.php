<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesPeriodonciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_periodoncia', function (Blueprint $table) {
            $table->id();
            $table->string('pieza', 10); // Para piezas dentales como "1.4"
            $table->text('antecedentes_molestias')->nullable(); // Puede ser texto largo
            $table->text('evaluacion_clinica')->nullable(); // Puede ser texto largo
            $table->text('estudio_rx')->nullable(); // Puede ser texto largo
            $table->string('diagnostico', 255)->nullable(); // Puede ser "0" u otros valores
            $table->string('lesion_sistemica', 255)->nullable(); // Puede ser "1" u otros valores
            $table->text('dg_period')->nullable(); // Diagnóstico periodontal
            $table->text('observaciones')->nullable(); // Observaciones adicionales
            $table->unsignedBigInteger('id_ficha_atencion'); // FK a ficha de atención
            $table->unsignedBigInteger('id_paciente'); // FK a paciente
            $table->unsignedBigInteger('id_lugar_atencion'); // FK a lugar de atención
            $table->unsignedBigInteger('id_profesional'); // FK a profesional
            $table->timestamps();

            // Índices para mejorar performance en consultas
            $table->index(['id_ficha_atencion', 'pieza']);
            $table->index('id_paciente');
            $table->index('id_profesional');
            $table->index('id_lugar_atencion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones_periodoncia');
    }
}
