<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCodigoAutorizacion20220914 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('codigos_autorizaciones', function (Blueprint $table) {
            $table->bigInteger('id_profesional')->after('id_tipo_autorizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('codigos_autorizaciones', function (Blueprint $table) {
			Schema::drop('id_profesional');
        });
    }
}
