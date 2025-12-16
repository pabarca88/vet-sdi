<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaOrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_orl', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_fichas_atenciones');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->string('audicion')->nullable();
            $table->string('ex_oido')->nullable();
            $table->string('biomicroscopia')->nullable();
            $table->string('vestibular')->nullable();
            $table->string('o_resultado_ex')->nullable();
            $table->string('nariz_ext')->nullable();
            $table->string('f_nasales')->nullable();
            $table->string('n_resultado_ex')->nullable();
            $table->string('boca')->nullable();
            $table->string('faringe')->nullable();
            $table->string('laringe')->nullable();
            $table->string('fl_resultado_ex')->nullable();
            $table->string('cuello_grl')->nullable();
            $table->string('masas')->nullable();
            $table->string('glandulas')->nullable();
            $table->string('c_resultado_ex')->nullable();
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
        Schema::dropIfExists('ficha_orl');
    }
}
