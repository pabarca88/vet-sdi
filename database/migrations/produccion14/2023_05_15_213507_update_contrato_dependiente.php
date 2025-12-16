<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContratoDependiente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_dependiente', function (Blueprint $table) {
            $table->string('id_tipo_admin_creador')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contrato_dependiente', function (Blueprint $table) {
            $table->integer('id_tipo_admin_creador')->change();
        });
    }
}
