<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaOtProfControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ficha_ot_prof_control', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion_otros');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('cont_n_sesion')->nullable();
            $table->string('cont_trabajo_en')->nullable();
            $table->string('cont_colaboracion')->nullable();
            $table->integer('cont_obj')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
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
         Schema::dropIfExists('ficha_ot_prof_control');
    }
}
