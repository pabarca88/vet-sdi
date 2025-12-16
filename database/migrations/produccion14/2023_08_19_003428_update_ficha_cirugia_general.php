<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaCirugiaGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_cirugia_general', function (Blueprint $table) {
            $table->integer('sintoma_cons')->after('id_paciente');
            $table->string('obs_sintoma_cons')->after('sintoma_cons')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_cirugia_general', function (Blueprint $table) {
            $table->dropColumn('sintoma_cons');
            $table->dropColumn('obs_sintoma_cons');
        });
    }
}
