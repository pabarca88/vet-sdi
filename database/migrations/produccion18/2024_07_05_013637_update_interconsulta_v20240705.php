<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInterconsultaV20240705 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interconsultas', function (Blueprint $table)
        {
            $table->bigInteger('id_ficha_atencion_soli')->nullable()->change();
            $table->bigInteger('id_ficha_otro_prof_soli')->nullable()->after('id_ficha_atencion_soli');
            $table->bigInteger('id_ficha_atencion_resp')->nullable()->change();
            $table->bigInteger('id_ficha_otro_prof_resp')->nullable()->after('id_ficha_atencion_resp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interconsultas', function (Blueprint $table) {
            $table->drop('id_ficha_otro_prof_soli');
            $table->drop('id_ficha_otro_prof_resp');
        });
    }
}
