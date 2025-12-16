<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBonos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bonos', function (Blueprint $table) {
            $table->string('bonificacion')->after('valor_atencion')->default(0);
            $table->string('aporte_seguro')->after('bonificacion')->default(0);
            $table->string('a_pagar')->after('aporte_seguro')->default(0);
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
            $table->dropColumn('bonificacion');
            $table->dropColumn('aporte_seguro');
            $table->dropColumn('a_pagar');
        });
    }
}
