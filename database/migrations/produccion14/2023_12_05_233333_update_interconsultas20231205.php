<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInterconsultas20231205 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interconsultas', function (Blueprint $table) {
            $table->string('cod_auto_soli')->nullable()->after('id_profesional_soli');
            $table->string('cod_auto_resp')->nullable()->after('id_profesional_resp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interconsultas', function (Blueprint $table) {
            $table->dropColumn('cod_auto_soli');
            $table->dropColumn('cod_auto_resp');
        });
    }
}
