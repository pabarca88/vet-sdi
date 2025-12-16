<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaPediatriaGeneralTunner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_pediatria_general_tunner', function (Blueprint $table)
        {
            $table->bigInteger('id_ficha_atencion')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_pediatria_general_tunner', function (Blueprint $table) {
            $table->drop('id_ficha_atencion');
        });
    }
}
