<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_paciente', function (Blueprint $table) {
            $table->id();
            $table->boolean('transfusion')->nullable()->default(false);
            $table->tinyInteger('dona_organos')->nullable()->default(0); // 0: No 1:Total 2:Parcial
            $table->boolean('dona_sangre')->nullable()->default(false);
            $table->string('impedimento_donar')->nullable();
            $table->string('comentario_gs')->nullable();
            $table->string('comentarios')->nullable();
            $table->boolean('hepatitis')->nullable()->default(false);
            $table->string('comentario_hepa')->nullable();

            $table->unsignedBigInteger('id_grupo_sanguineo');
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
        Schema::dropIfExists('antecedentes_paciente');
    }
}
