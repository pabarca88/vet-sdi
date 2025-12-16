<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAntecedenteAlergias20220909 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('antecedente_alergias', function (Blueprint $table) {
            $table->string('comentario')->nullable()->after('nombre_alergia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antecedente_alergias', function (Blueprint $table) {
			Schema::drop('comentario');
        });
    }
}
