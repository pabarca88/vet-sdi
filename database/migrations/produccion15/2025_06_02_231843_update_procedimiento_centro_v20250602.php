<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProcedimientoCentroV20250602 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('procedimientos_centro', function (Blueprint $table)
        {
            $table->string('id_especialidad')->nullable()->after('id_lugar_atencion');
            $table->string('id_tipo_especialidad')->nullable()->after('id_especialidad');
            $table->string('id_sub_tipo_especialidad')->nullable()->after('id_tipo_especialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procedimientos_centro', function (Blueprint $table) {
            $table->drop('id_especialidad');
            $table->drop('id_tipo_especialidad');
            $table->drop('id_sub_tipo_especialidad');
        });
    }
}
