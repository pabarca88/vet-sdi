<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasPpfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias_ppf', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->unsignedBigInteger('id_licencia');
            $table->unsignedBigInteger('id_profesional');
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
        Schema::dropIfExists('licencias_ppf');
    }
}
