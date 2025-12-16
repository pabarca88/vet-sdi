<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTomaMuestra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('toma_muestra', function (Blueprint $table)
        {
            $table->bigInteger('id_ficha_atencion')->nullable()->after('id_tipo_toma');
            $table->bigInteger('id_ficha_otros_prof')->nullable()->after('id_ficha_atencion');
            $table->bigInteger('id_ficha_gineco_obstetrica')->nullable()->after('id_ficha_otros_prof');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('toma_muestra', function (Blueprint $table) {
            $table->drop('id_ficha_atencion');
            $table->drop('id_ficha_otros_prof');
            $table->drop('id_ficha_gineco_obstetrica');
        });
    }
}
