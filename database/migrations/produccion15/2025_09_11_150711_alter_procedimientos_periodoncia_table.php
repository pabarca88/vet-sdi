<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProcedimientosPeriodonciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('procedimientos_periodoncia', function (Blueprint $table) {
            $table->text('cantidad_superficie_teñida')->nullable()->after('observaciones');
            $table->text('cantidad_superficie_total')->nullable()->after('cantidad_superficie_teñida');
            $table->text('indice_oleary')->nullable()->after('cantidad_superficie_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('procedimientos_periodoncia', function (Blueprint $table) {
            $table->dropColumn(['cantidad_superficie_teñida', 'cantidad_superficie_total', 'indice_oleary']);
        });
    }
}
