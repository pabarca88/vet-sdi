<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosEmergenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos_emergencia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_uno');
            $table->string('apellido_dos');
            $table->string('rut');
            $table->string('email')->unique();
            $table->date('fecha_nac');
            $table->string('telefono');
            $table->string('parentezco')->nullable();
            $table->integer('prioridad')->nullable()->default('99');
            $table->unsignedBigInteger('id_direccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactos_emergencia');
    }
}