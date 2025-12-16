<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInformesMedicosV20240713 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informes_medicos', function (Blueprint $table)
        {
            $table->bigInteger('id_ficha_atencion')->nullable()->change();
            $table->bigInteger('id_ficha_otro_prof')->nullable()->after('id_ficha_atencion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informes_medicos', function (Blueprint $table) {
            $table->bigInteger('id_ficha_atencion')->change();
            $table->drop('id_ficha_otro_prof');
        });
    }
}
