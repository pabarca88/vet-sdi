<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRendicionCaja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rendicion_caja', function (Blueprint $table) {
            $table->text('archivos')->nullable()->after('rendicion');
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
            $table->dropColumn('archivos');
        });
    }
}
