<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDiagnosticosGeses20221107 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diagnosticos_geses', function (Blueprint $table) {
            $table->integer('codigo_verificacion')->nullable()->after('id_lugar_atencion');
        });
    }

    public function down()
    {
        Schema::table('diagnosticos_geses', function (Blueprint $table) {
            $table->drop('codigo_verificacion');
        });
    }
}
