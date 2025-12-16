<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGesRegistros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ges_registros', function (Blueprint $table) {
            $table->string('id_ges_diagnostico')->after('hora_ficha_ges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ges_registros', function (Blueprint $table) {
            $table->dropColumn('id_ges_diagnostico');
        });
    }
}
