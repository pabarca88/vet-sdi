<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHorasMedicas20231006 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->integer('acomp_representante')->default(0)->nullable()->after('id_paciente');
            $table->integer('acomp_acompanante')->default(0)->nullable()->after('acomp_representante');
            $table->string('acomp_lista')->default(0)->nullable()->after('acomp_acompanante');
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
            $table->dropColumn('acomp_acompanante');
            $table->dropColumn('acomp_lista');
        });
    }
}
