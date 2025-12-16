<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAsistenteLugarAtencion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asistentes_lugar_atencion', function (Blueprint $table) {
            $table->integer('examen')->default('0')->after('id_institucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asistentes_lugar_atencion', function (Blueprint $table) {
            $table->dropColumn('examen');
        });
    }
}
