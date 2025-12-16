<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaKineTorax extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_kine_torax', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion_otros');
            $table->bigInteger('id_ficha_kinesiologia');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('resp_tipo')->nullable();
            $table->integer('ftorax')->nullable();
            $table->integer('storax')->nullable();
            $table->string('resp_desc')->nullable();
            $table->string('resp_piel')->nullable();
            $table->string('resp_cian')->nullable();
            $table->integer('resp_mov')->nullable();
            $table->integer('resp_tiraje')->nullable();
            $table->string('resp_descrip')->nullable();
            $table->string('palp_pd')->nullable();
            $table->string('palp_vv')->nullable();
            $table->string('palp_exp')->nullable();
            $table->string('palp_elast')->nullable();
            $table->string('palp_frem')->nullable();
            $table->string('palp_desc')->nullable();
            $table->string('perc_descrip')->nullable();
            $table->string('r_normal_pre')->nullable();
            $table->string('r_adv_pre')->nullable();
            $table->string('r_normal_post')->nullable();
            $table->string('r_adv_post')->nullable();
            $table->string('resp_comen')->nullable();
            $table->string('ex_resp_descrip')->nullable();
            $table->string('resp_desc_obj')->nullable();
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
        Schema::dropIfExists('ficha_kine_torax');
    }
}
