<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadoExamen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado_examen', function (Blueprint $table)
        {
            $table->id();

            $table->bigInteger('id_lugar_atencion')->nullable();
            $table->bigInteger('id_institucion')->nullable();
            $table->bigInteger('id_user');
            $table->bigInteger('tipo_examen');
            $table->bigInteger('id_paciente')->nullable();
            $table->string('rut');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('email');
            $table->string('observacion')->nullable();
            $table->integer('notificacion')->default(0);
            $table->integer('notificacion_cantidad')->default(0);
            $table->integer('cantidad')->default(0);
            $table->date('fecha_registro');
            $table->integer('estado')->default(1);

            $table->timestamps();
        });

        Schema::create('resultado_examen_archivo', function (Blueprint $table)
        {
            $table->id();

            $table->bigInteger('id_resultado_examen')->nullable();
            $table->string('nombre');
            $table->text('url');
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
        Schema::dropIfExists('resultado_examen');
        Schema::dropIfExists('resultado_examen_archivo');
    }
}
