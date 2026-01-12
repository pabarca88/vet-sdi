<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveBocaFromPresupuestosMascotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presupuestos_mascota', function (Blueprint $table) {
            if (Schema::hasColumn('presupuestos_mascota', 'boca')) {
                $table->dropColumn('boca');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presupuestos_mascota', function (Blueprint $table) {
            $table->integer('boca')->nullable()->after('fecha');
        });
    }
}
