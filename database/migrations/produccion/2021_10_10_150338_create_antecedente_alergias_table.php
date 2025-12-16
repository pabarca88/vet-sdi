<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedenteAlergiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente_alergias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_antecedentes');
            $table->unsignedBigInteger('id_alergia')->nullable();
            $table->string('nombre_alergia');
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
        Schema::dropIfExists('antecedente_alergias');
    }
}