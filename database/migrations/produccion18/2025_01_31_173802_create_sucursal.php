<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_institucion');
            $table->bigInteger('id_lugar_atencion');
            $table->string('rut')->nullable();
            $table->string('nombre')->nullable();
            // $table->string('direccion')->nullable();
            $table->string('id_direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_2')->nullable();
            $table->integer('matriz')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('sucursal_horario', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_institucion');
            $table->bigInteger('id_sucursal');
            $table->bigInteger('id_lugar_atencion');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_termino')->nullable();
            $table->string('dia')->nullable();
            $table->time('duracion_consulta')->nullable();
            $table->integer('tipo_agenda')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('sucursal_procedimiento', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_institucion');
            $table->bigInteger('id_sucursal');
            $table->bigInteger('id_lugar_atencion');
            $table->string('id_procedimiento')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        // Schema::create('sucursal_profesional', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigInteger('id_institucion');
        //     $table->bigInteger('id_sucursal');
        //     $table->bigInteger('id_lugar_atencion');
        //     $table->string('id_profesional')->nullable();
        //     $table->string('otro')->nullable();
        //     $table->integer('estado')->default(1);
        //     $table->timestamps();
        // });

        // Schema::create('sucursal_asistente', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigInteger('id_institucion');
        //     $table->bigInteger('id_sucursal');
        //     $table->bigInteger('id_lugar_atencion');
        //     $table->string('id_asistente')->nullable();
        //     $table->string('otro')->nullable();
        //     $table->integer('estado')->default(1);
        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursal');
        Schema::dropIfExists('sucursal_procedimiento');
        Schema::dropIfExists('sucursal_profesional');
        Schema::dropIfExists('sucursal_asistente');
        Schema::dropIfExists('sucursal_horario');
    }
}
