<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaOtorrinoTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_otorrino_tipo', function (Blueprint $table) {
            $table->bigInteger('id_tipo_episodios')->nullable()->after('obs_ex_biom');
            $table->text('obs_episodios')->nullable()->after('id_tipo_episodios');
            $table->bigInteger('id_tipo_equilibrio')->nullable()->after('obs_episodios');
            $table->text('obs_equilibrio')->nullable()->after('id_tipo_equilibrio');
            $table->bigInteger('id_tipo_ng')->nullable()->after('obs_equilibrio');
            $table->text('obs_ng')->nullable()->after('id_tipo_ng');
            $table->bigInteger('id_tipo_sint_acomp')->nullable()->after('obs_ng');
            $table->text('obs_sint_acomp')->nullable()->after('id_tipo_sint_acomp');
            $table->bigInteger('id_tipo_vertigo')->nullable()->after('obs_sint_acomp');
            $table->text('obs_tipo_vertigo')->nullable()->after('id_tipo_vertigo');
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
            $table->drop('id_tipo_episodios');
            $table->drop('obs_episodios');
            $table->drop('id_tipo_equilibrio');
            $table->drop('obs_equilibrio');
            $table->drop('id_tipo_ng');
            $table->drop('obs_ng');
            $table->drop('id_tipo_sint_acomp');
            $table->drop('obs_sint_acomp');
            $table->drop('id_tipo_vertigo');
            $table->drop('obs_tipo_vertigo');
        });
    }
}
