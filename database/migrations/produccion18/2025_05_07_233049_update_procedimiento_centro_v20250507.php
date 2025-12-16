<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProcedimientoCentroV20250507 extends Migration
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
            $table->string('tipo_ficha_atencion')->nullable()->after('descripcion');
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
            $table->drop('tipo_ficha_atencion');
        });
    }
}
