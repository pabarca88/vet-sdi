<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoFechaToDietaNutricionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dieta_nutricionals', function (Blueprint $table) {
            $table->string('estado')->nullable()->after('recomendaciones');
            $table->date('fecha')->nullable()->after('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dieta_nutricionals', function (Blueprint $table) {
            $table->dropColumn('estado');
            $table->dropColumn('fecha');
        });
    }
}
