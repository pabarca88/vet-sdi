<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaOtorrinoTipo3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_otorrino_tipo', function (Blueprint $table) {
            $table->text('obs_examen_laringe')->nullable()->after('ex_larige_anormal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_otorrino_tipo', function (Blueprint $table) {
            $table->drop('obs_examen_laringe');
        });
    }
}
