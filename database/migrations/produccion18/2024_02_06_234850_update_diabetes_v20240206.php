<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDiabetesV20240206 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diabetes', function (Blueprint $table)
        {
            $table->bigInteger('id_ficha_otros_prof')->nullable()->after('id_ficha_atencion');
            $table->bigInteger('id_ficha_gineco_obstetrica')->nullable()->after('id_ficha_otros_prof');

            $table->string('glucosuria')->nullable()->after('creatina');
            $table->string('tamano_fetal')->nullable()->after('glicosinada_ayuno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diabetes', function (Blueprint $table) {
            $table->drop('id_ficha_otros_prof');
            $table->drop('id_ficha_gineco_obstetrica');
            $table->drop('glucosuria');
            $table->drop('tamano_fetal');
        });
    }
}
