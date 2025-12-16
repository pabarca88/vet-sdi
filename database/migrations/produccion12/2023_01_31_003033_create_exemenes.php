<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExemenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_especialidad_tipo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_template');
            $table->string('nombre', 150);
            $table->string('descripcion', 200)->nullable();
            $table->string('otro')->nullable();
            $table->string('estado')->nullable()->default('0');
            $table->timestamps();
        });
        Schema::create('examen_especialidad_template', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->longText('cuerpo')->nullable();
            $table->string('estado')->nullable()->default('0');
            $table->timestamps();
        });
        Schema::create('examen_especialidad', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tipo');
            $table->bigInteger('id_template');
            $table->string('nombre');
            $table->longText('cuerpo')->nullable();
            $table->string('estado')->nullable()->default('0');
            $table->timestamps();
        });


        Schema::create('examen_laboratorio_tipo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_template');
            $table->string('nombre', 150);
            $table->string('descripcion', 200)->nullable();
            $table->string('otro')->nullable();
            $table->string('estado')->nullable()->default('0');
            $table->timestamps();
        });
        Schema::create('examen_laboratorio_template', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->longText('cuerpo')->nullable();
            $table->string('estado')->nullable()->default('0');
            $table->timestamps();
        });
        Schema::create('examen_laboratorio', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tipo');
            $table->bigInteger('id_template');
            $table->string('nombre');
            $table->longText('cuerpo')->nullable();
            $table->string('estado')->nullable()->default('0');
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
        Schema::dropIfExists('examen_especialidad');
        Schema::dropIfExists('examen_especialidad_template');

        Schema::dropIfExists('examen_laboratorio');
        Schema::dropIfExists('examen_laboratorio_template');
    }
}
