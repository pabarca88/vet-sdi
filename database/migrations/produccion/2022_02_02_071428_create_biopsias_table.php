<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiopsiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biopsias', function (Blueprint $table) {
            $table->id();

            $table->string('laboratorio_patologia');
            $table->string('diagnostico_pre');
            $table->string('diagnostico_post')->nullable();
            $table->string('organo_localizacion');
            $table->string('enfermedades_asociadas');
            $table->string('informacion_adicional')->nullable();
            $table->tinyInteger('biopsia_rapida')->default(0);

            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();

            $table->unsignedBigInteger('id_protocolo')->nullable();

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
        Schema::dropIfExists('biopsias');
    }
}