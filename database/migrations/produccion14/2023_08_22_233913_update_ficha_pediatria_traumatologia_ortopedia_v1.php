<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaPediatriaTraumatologiaOrtopediaV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_pediatria_traumatologia_ortopedia', function (Blueprint $table) {
            $table->integer('hospen')->after('obs_ex_tra_fisico')->nullable();
            $table->string('obs_hospen')->after('hospen')->nullable();
            $table->string('nom_inst')->after('obs_hospen')->nullable();
            $table->integer('hosp_enserv')->after('nom_inst')->nullable();
            $table->string('obs_hosp_enserv')->after('hosp_enserv')->nullable();
            $table->integer('motivo_hosp')->after('obs_hosp_enserv')->nullable();
            $table->string('obs_motivo_hosp')->after('motivo_hosp')->nullable();
            $table->string('obs_hospitalizar')->after('obs_motivo_hosp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_pediatria_traumatologia_ortopedia', function (Blueprint $table) {
            $table->dropColumn('hospen');
            $table->dropColumn('obs_hospen');
            $table->dropColumn('nom_inst');
            $table->dropColumn('hosp_enserv');
            $table->dropColumn('obs_hosp_enserv');
            $table->dropColumn('motivo_hosp');
            $table->dropColumn('obs_motivo_hosp');
            $table->dropColumn('obs_hospitalizar');
        });
    }
}
