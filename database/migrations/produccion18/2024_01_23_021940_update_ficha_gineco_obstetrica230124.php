<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaGinecoObstetrica230124 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_gineco_obstetrica', function (Blueprint $table)
        {
            $table->bigInteger('indicaciones')->nullable()->after('diagnostico_ce10');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_gineco_obstetrica', function (Blueprint $table) {
            $table->drop('indicaciones');
        });
    }
}
