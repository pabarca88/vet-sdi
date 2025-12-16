<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHorasMedicas20231006V2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->integer('autorizacion_atencion')->default(0)->nullable()->after('acomp_lista');
            $table->bigInteger('id_log_users_devices')->default(0)->nullable()->after('autorizacion_atencion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->dropColumn('acomp_representante');
            $table->dropColumn('id_log_users_devices');
        });
    }
}
