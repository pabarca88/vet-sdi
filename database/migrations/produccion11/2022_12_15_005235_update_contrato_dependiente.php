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
            $table->string('rut')->nullable()->after('id_empleado');
            $table->string('nombres')->nullable()->after('rut');
            $table->string('apellido_uno')->nullable()->after('nombres');
            $table->string('apellido_dos')->nullable()->after('apellido_uno');
            $table->string('telefono')->nullable()->after('apellido_dos');
            $table->string('email')->nullable()->after('telefono');
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
            $table->drop('rut');
            $table->drop('nombres');
            $table->drop('apellido_uno');
            $table->drop('apellido_dos');
            $table->drop('telefono');
            $table->drop('email');
        });
    }
}
