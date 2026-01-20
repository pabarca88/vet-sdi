<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosVetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos_vet', function (Blueprint $table) {
            $table->id();
            $table->integer('id_profesional')->nullable();
            $table->integer('id_especialidad')->nullable();
            $table->integer('id_laboratorio')->nullable();
            $table->string('descripcion');
            $table->double('valor')->nullable();
            $table->integer('estado')->default(1);
            $table->integer('tipo_examen')->nullable()->default(1);
            $table->integer('id_responsable')->nullable();
            $table->integer('cantidad_bloques')->nullable()->default(2);
            $table->integer('laboratorio')->nullable();
            $table->integer('urgencia')->nullable()->default(0);
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
        Schema::dropIfExists('tratamientos_vet');
    }
}
