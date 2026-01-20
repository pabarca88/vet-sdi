<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosVetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos_vet', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente')->nullable();
            $table->integer('id_profesional')->nullable();
            $table->integer('id_ficha_atencion')->nullable();
            $table->integer('id_lugar_atencion')->nullable();
            $table->integer('id_diagnostico');
            $table->integer('id_tratamiento');
            $table->integer('cantidad')->default(1);
            $table->double('valor')->nullable();
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
        Schema::dropIfExists('presupuestos_vet');
    }
}
