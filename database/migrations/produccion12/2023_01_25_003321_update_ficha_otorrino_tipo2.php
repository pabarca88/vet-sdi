<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaOtorrinoTipo2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_otorrino_tipo', function (Blueprint $table) {
            $table->text('obs_vestibular')->nullable()->after('obs_tipo_vertigo');
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
            $table->drop('obs_vestibular');
        });
    }
}
