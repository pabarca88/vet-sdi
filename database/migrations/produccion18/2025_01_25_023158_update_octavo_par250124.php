<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOctavoPar250124 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('octavo_par', function (Blueprint $table)
        {
            $table->string('id_derivado_por')->nullable()->after('profesional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('octavo_par', function (Blueprint $table) {
            $table->drop('id_derivado_por');
        });
    }
}
