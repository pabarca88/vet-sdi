<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHorasMedicas230124 extends Migration
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
            $table->bigInteger('id_ficha_otros_prof')->nullable()->after('id_ficha_atencion');
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
            $table->drop('id_ficha_otros_prof');
        });
    }
}
