<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales_laboratorio', function (Blueprint $table) {
            $table->id();
            $table->integer('id_laboratorio');
            $table->integer('id_institucion');
            $table->integer('id_lugar_atencion');
            $table->integer('id_especialidad');
            $table->integer('id_profesional');
            $table->string('descripcion');
            $table->string('estado')->default(1);
            $table->string('observacion')->nullable();
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
        Schema::dropIfExists('profesionales_laboratorio');
    }
}
