<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAntecedentesPaciente20220908 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('antecedentes_paciente', function (Blueprint $table) {
            $table->tinyInteger('dona_organos_parcial')->nullable()->default(0)->after('dona_organos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antecedentes_paciente', function (Blueprint $table) {
			Schema::drop('dona_organos_parcial');
        });
    }
}
