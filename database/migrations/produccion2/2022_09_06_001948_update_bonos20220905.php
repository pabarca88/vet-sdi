<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBonos20220905 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bonos', function (Blueprint $table) {
            $table->bigInteger('id_tipo_bono')->after('id_paciente');
            $table->bigInteger('id_referencia')->after('id_tipo_bono');
            $table->integer('numero_sesiones')->nullable()->after('id_referencia');
            $table->integer('estado_consulta')->nullable()->after('numero_sesiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bonos', function (Blueprint $table) {
			Schema::drop('id_tipo_bono');
			Schema::drop('id_referencia');
			Schema::drop('numero_sesiones');
			Schema::drop('estado_consulta');
        });
    }
}
