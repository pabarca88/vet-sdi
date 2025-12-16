<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHorasMedicasV20240924 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horas_medicas', function (Blueprint $table)
        {
            $table->bigInteger('id_jitsi_video_consulta')->nullable()->after('id_procedimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->drop('id_jitsi_video_consulta');
        });
    }
}
