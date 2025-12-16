<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProcedimientosCentroV20250131 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('procedimientos_centro', function (Blueprint $table)
        {
            $table->integer('valor')->nullable()->after('cantidad_bloques');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procedimientos_centro', function (Blueprint $table) {
            $table->drop('valor');
        });
    }
}
