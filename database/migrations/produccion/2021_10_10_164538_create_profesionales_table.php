<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellido_uno', 50);
            $table->string('apellido_dos', 50);
            $table->char('sexo', 1);
            $table->string('rut', 12);
            $table->string('email', 200)->unique();
            $table->string('telefono_uno', 20);
            $table->string('telefono_dos', 20)->nullable();


            // Duda necesidad de estos datos
            $table->boolean('estado')->default(true);
            $table->integer('certificado');
            $table->string('numero_certificado', 50)->nullable();
            $table->string('dv_certiicado', 2)->nullable();


            $table->unsignedBigInteger('id_direccion')->nullable();
            $table->unsignedBigInteger('id_especialidad')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->unsignedBigInteger('id_tipo_especialidad')->nullable();
            $table->unsignedBigInteger('id_sub_tipo_especialidad')->nullable();

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
        Schema::dropIfExists('profesionales');
    }
}