<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('rut', 12)->unique();
            $table->string('nombres', 100);
            $table->string('apellido_uno', 50);
            $table->string('apellido_dos', 50);
            $table->string('telefono_uno', 20);
            $table->string('telefono_dos', 20)->nullable();
            $table->string('profesion')->nullable();
            $table->char('sexo', 1);
            $table->string('email', 200)->unique();
            $table->date('fecha_nac');
            $table->boolean('rompeclave')->nullable()->default(true);
            $table->unsignedBigInteger('id_prevision');
            $table->unsignedBigInteger('id_premium')->nullable();
            $table->unsignedBigInteger('id_direccion')->nullable();
            $table->unsignedBigInteger('id_antecedente')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();

            $table->datetime('fecha_autorizacion')->nullable();
            $table->integer('codigo_autorizacion')->nullable();

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
        Schema::dropIfExists('pacientes');
    }
}