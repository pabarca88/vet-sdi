<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaCirugiaDigestiva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_cirugia_digestiva', function (Blueprint $table)
        {
            $table->integer('transito_intest')->nullable()->after('obs_dolor_cdg');
            $table->string('obs_transito_intest')->nullable()->after('transito_intest');
            $table->integer('dolor_def')->nullable()->after('obs_transito_intest');
            $table->string('obs_dolor_def')->nullable()->after('dolor_def');
            $table->integer('sangre_otros')->nullable()->after('obs_dolor_def');
            $table->string('obs_sangre_otros')->nullable()->after('sangre_otros');
            $table->string('otro2')->nullable()->after('otro');
        });

        Schema::table('ficha_cirugia_digestiva_tipo', function (Blueprint $table)
        {
            $table->integer('transito_intest')->nullable()->after('obs_dolor_cdg');
            $table->string('obs_transito_intest')->nullable()->after('transito_intest');
            $table->integer('dolor_def')->nullable()->after('obs_transito_intest');
            $table->string('obs_dolor_def')->nullable()->after('dolor_def');
            $table->integer('sangre_otros')->nullable()->after('obs_dolor_def');
            $table->string('obs_sangre_otros')->nullable()->after('sangre_otros');
            $table->string('otro2')->nullable()->after('otro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_cirugia_digestiva', function (Blueprint $table) {
            $table->drop('transito_intest');
            $table->drop('obs_transito_intest');
            $table->drop('dolor_def');
            $table->drop('obs_dolor_def');
            $table->drop('sangre_otros');
            $table->drop('obs_sangre_otros');
            $table->drop('otro2');
        });

        Schema::table('ficha_cirugia_digestiva_tipo', function (Blueprint $table) {
            $table->drop('transito_intest');
            $table->drop('obs_transito_intest');
            $table->drop('dolor_def');
            $table->drop('obs_dolor_def');
            $table->drop('sangre_otros');
            $table->drop('obs_sangre_otros');
            $table->drop('otro2');
        });

    }
}
