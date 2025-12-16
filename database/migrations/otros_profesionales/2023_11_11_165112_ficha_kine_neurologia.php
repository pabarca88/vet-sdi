<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaKineNeurologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('ficha_kine_neurologia', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('id_ficha_atencion_otros');
                $table->bigInteger('id_ficha_kinesiologia');
                $table->bigInteger('id_profesional');
                $table->bigInteger('id_paciente');
                $table->integer('lenguaje')->nullable();
                $table->string('t_alt_leng')->nullable();
                $table->integer('leng_alt_mod')->nullable();
                $table->string('audio')->nullable();
                $table->string('audifono')->nullable();
                $table->integer('ap_capac')->nullable();
                $table->integer('leng_descrip_alt')->nullable();
                $table->string('obs_leng')->nullable();
                $table->integer('mem_exam')->nullable();
                $table->string('descrip_mem')->nullable();
                $table->string('praxias')->nullable();
                $table->integer('fcs_descripcion')->nullable();
                $table->integer('capvis_tipo')->nullable();
                $table->string('capvis_descrip')->nullable();
                $table->integer('percve_ex')->nullable();
                $table->string('percve_descrip')->nullable();
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
        Schema::dropIfExists('ficha_kine_neurologia');
    }
}
