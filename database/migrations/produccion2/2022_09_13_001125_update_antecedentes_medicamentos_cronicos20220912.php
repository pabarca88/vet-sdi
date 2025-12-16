<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAntecedentesMedicamentosCronicos20220912 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('antecedente_medicamentos_cronicos', function (Blueprint $table) {
            $table->bigInteger('id_medicamento')->nullable()->after('id_antecedentes');
            $table->bigInteger('id_dosis')->nullable()->after('nombre_medicamento_cronico');
            $table->string('dosis')->nullable()->after('id_dosis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antecedente_medicamentos_cronicos', function (Blueprint $table) {
			Schema::drop('id_medicamento');
			Schema::drop('id_dosis');
			Schema::drop('dosis');
        });
    }
}
