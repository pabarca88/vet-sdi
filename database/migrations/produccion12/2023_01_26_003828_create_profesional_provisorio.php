<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalProvisorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_provisorio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_uno');
            $table->string('apellido_dos')->nullable();
            $table->string('sexo')->nullable();
            $table->string('rut');
            $table->string('email')->nullable();
            $table->string('telefono_uno')->nullable();
            $table->string('telefono_dos')->nullable();
            $table->bigInteger('id_direccion')->nullable();
            $table->bigInteger('id_usuario')->nullable();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_sub_tipo_especialidad')->nullable();
            $table->string('supersalud')->nullable();
            $table->string('contactado')->nullable();
            $table->string('otro')->nullable();
            $table->string('estado')->nullable()->default(1);
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
        Schema::dropIfExists('profesional_provisorio');
    }
}
