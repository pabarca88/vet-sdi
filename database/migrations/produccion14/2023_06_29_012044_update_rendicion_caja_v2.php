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
            $table->bigInteger('id_asistente_receptor')->nullable()->change();
            $table->bigInteger('id_profesional_receptor')->nullable()->after('id_asistente_receptor');
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
            $table->dropColumn('id_profesional_receptor');
        });
    }
}
