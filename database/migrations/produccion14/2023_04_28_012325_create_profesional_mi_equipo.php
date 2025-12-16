<?php

use App\Models\AnestesiaPaciente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalMiEquipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_mi_equipo', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->bigInteger('id_profesional');
            $table->integer('estado')->default(1)->nullable();

            $table->timestamps();
        });

        Schema::create('profesional_mi_equipo_profesionales', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_profesional_mi_equipo');
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_sub_tipo_especialidad')->nullable();
            $table->string('posicion');
            $table->bigInteger('id_profesional');
            $table->integer('estado')->default(1)->nullable();

            $table->timestamps();
        });

        Schema::create('solicitudes_pabellones_quirurgicos_equipo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_solicitudes_pabellones_quirurgicos');
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_sub_tipo_especialidad')->nullable();
            $table->string('posicion');
            $table->bigInteger('id_profesional');
            $table->integer('estado')->default(1)->nullable();

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
        Schema::dropIfExists('profesional_mi_equipo');
        Schema::dropIfExists('profesional_mi_equipo_profesionales');
    }
}
