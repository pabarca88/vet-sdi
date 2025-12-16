<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHipertensionesV20240206 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hipertensiones', function (Blueprint $table)
        {
            $table->bigInteger('id_ficha_otros_prof')->nullable()->after('id_ficha_atencion');
            $table->bigInteger('id_ficha_gineco_obstetrica')->nullable()->after('id_ficha_otros_prof');

            $table->string('pulso')->nullable()->after('ideal');
            $table->string('medicamento')->nullable()->after('pulso');
            $table->string('sintomas')->nullable()->after('medicamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hipertensiones', function (Blueprint $table) {
            $table->drop('id_ficha_otros_prof');
            $table->drop('id_ficha_gineco_obstetrica');
            $table->drop('pulso');
            $table->drop('medicamento');
            $table->drop('sintomas');
        });
    }
}

