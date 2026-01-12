<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdMascotaToFichasAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas_atenciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_mascota')->nullable()->after('id_paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas_atenciones', function (Blueprint $table) {
            $table->dropColumn('id_mascota');
        });
    }
}
