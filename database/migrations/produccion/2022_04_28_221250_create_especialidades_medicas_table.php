<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidades_medicas', function (Blueprint $table) {
            $table->id();
            $table->integer('cod_prof');
            $table->string('txt_prof')->nullable();
            $table->integer('cod_spe')->nullable();
            $table->string('txt_spe')->nullable();
            $table->integer('cod_sub_esp')->nullable();
            $table->string('txt_subesp')->nullable();
            $table->integer('cod_parent_esp')->nullable();
            $table->tinyInteger('estado')->default(1)->nullable();
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
        Schema::dropIfExists('especialidades_medicas');
    }
}