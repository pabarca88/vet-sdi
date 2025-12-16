<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatediagnosticosGeses20220813 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diagnosticos_geses', function (Blueprint $table) {
            $table->string('nombre_responsable_ficha_ges')->nullable()->change();
            $table->string('rut_responsable_ficha_ges')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diagnosticos_geses', function (Blueprint $table) {
			Schema::drop('nombre_responsable_ficha_ges');
			Schema::drop('rut_responsable_ficha_ges');
        });
    }
}

