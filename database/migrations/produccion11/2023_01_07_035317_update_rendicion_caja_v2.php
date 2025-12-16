<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRendicionCajaV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rendicion_caja', function (Blueprint $table) {
            $table->string('rendicion')->nullable()->default(0)->after('otro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rendicion_caja', function (Blueprint $table) {
            $table->drop('rendicion');
        });
    }
}
