<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaPediatriaVacuna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_vacuna', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('alias');

            $table->integer('estado')->default(1);

            $table->timestamps();
        });


        Schema::create('ficha_pediatria_vacuna', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_pediatria')->nullable();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_responsable')->nullable();
            $table->bigInteger('id_profesional');

            $table->integer('id_tipo_vacuna');
            $table->string('tipo_vacuna');

            $table->string('id_estado_vacuna')->nullable();
            $table->string('texto_estado_vacuna')->nullable();

            $table->string('id_vacuna');
            $table->string('nombre_vacuna');
            $table->string('id_dosis')->nullable();
            $table->string('texto_dosis')->nullable();
            $table->string('periodo')->nullable();

            $table->text('indicaciones_vacuna')->nullable();
            $table->text('observacion_vacuna')->nullable();

            $table->date('fecha');
            $table->time('hora');

            $table->bigInteger('id_institucion')->nullable();
            $table->string('nombre_institucion')->nullable();

            $table->bigInteger('id_servicio')->nullable();
            $table->string('nombre_servicio')->nullable();

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
        Schema::dropIfExists('ficha_pediatria_vacuna');
    }
}
