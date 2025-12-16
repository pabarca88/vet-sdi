<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaOtorrinoTipoV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_otorrino_tipo', function (Blueprint $table)
        {
            $table->integer('piel_tegumnto')->nullable()->after('ind_orl');
            $table->string('obs_piel_tegumnto')->nullable()->after('piel_tegumnto');
            $table->integer('adenopatias')->nullable()->after('obs_piel_tegumnto');
            $table->string('obs_adenopatias')->nullable()->after('adenopatias');
            $table->integer('tumores_masas')->nullable()->after('obs_adenopatias');
            $table->string('obs_tumores_masas')->nullable()->after('tumores_masas');
            $table->integer('gland_anexas')->nullable()->after('obs_tumores_masas');
            $table->string('obs_gland_anexas')->nullable()->after('gland_anexas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_otorrino_tipo', function (Blueprint $table)
        {
            $table->dropColumn('obs_piel_tegumnto');
            $table->dropColumn('adenopatias');
            $table->dropColumn('obs_adenopatias');
            $table->dropColumn('tumores_masas');
            $table->dropColumn('obs_tumores_masas');
            $table->dropColumn('gland_anexas');
            $table->dropColumn('obs_gland_anexas');
        });
    }
}
