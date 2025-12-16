<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionesNeonatologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evoluciones_neonatologia', function (Blueprint $table) {
            $table->id();

            $table->string('brazalete');
            $table->string('temperatura_rectal');
            $table->string('peso');
            $table->string('evacuaciones');
            $table->string('alerta');
            $table->string('piel');
            $table->string('cuerpo');
            $table->string('cordon');
            $table->string('succion');
            $table->string('actitud');
            $table->string('otra_alimentacion')->nullable();
            $table->string('indicacion_madre');
            $table->string('indicacion_enfermera');
            $table->string('indicacion_otra')->nullable();
            $table->string('frecuencia_respiratoria');
            $table->string('frecuencia_cardiaca');
            $table->string('temperatura_axilar');

            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->unsignedBigInteger('id_recuperacion')->nullable();
            $table->unsignedBigInteger('id_sala')->nullable();

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
        Schema::dropIfExists('evoluciones_neonatologia');
    }
}