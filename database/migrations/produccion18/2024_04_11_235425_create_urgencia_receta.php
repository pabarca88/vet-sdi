<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUrgenciaReceta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urgencia_receta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_urgencia')->nullable();// id de atencion en urgencia
            $table->bigInteger('id_tipo_control')->nullable();
            $table->bigInteger('id_articulo')->nullable();
            $table->string('articulo')->nullable();
            $table->bigInteger('id_presentacion')->nullable();
            $table->string('presentacion')->nullable();
            $table->bigInteger('id_posologia')->nullable();
            $table->string('posologia')->nullable();
            $table->bigInteger('id_via_administracion')->nullable();
            $table->string('via_administracion')->nullable();
            $table->string('comentario')->nullable();
            $table->bigInteger('id_usuario');
            $table->date('fecha_registro')->default(DB::raw('CURRENT_DATE'));  // fecha de registro del medicamento
            $table->time('hora_registro')->default(DB::raw('CURRENT_DATE'));  // hora de registro del medicamento
            $table->integer('estado')->default(1); //0=inactivo, 1=Activo

            $table->timestamps();
        });

        Schema::create('tipo_procedimiento', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->nullable();
            $table->string('detalle')->nullable();
            $table->string('comentario')->nullable();
            $table->integer('estado')->default(1); //0=inactivo, 1=Activo

            $table->timestamps();
        });

        Schema::create('procedimiento', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_tipo_procedimiento')->nullable();
            $table->string('nombre')->nullable();
            $table->string('detalle')->nullable();
            $table->string('comentario')->nullable();
            $table->integer('estado')->default(1); //0=inactivo, 1=Activo

            $table->timestamps();
        });

        Schema::create('urgencia_procedimiento', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_urgencia')->nullable();// id de atencion en urgencia
            $table->bigInteger('id_tipo_procedimiento')->nullable();
            $table->string('tipo_procedimiento')->nullable();
            $table->bigInteger('id_procedimiento')->nullable();
            $table->string('procedimiento')->nullable();
            $table->string('comentario')->nullable();
            $table->bigInteger('id_usuario');
            $table->date('fecha_registro')->default(DB::raw('CURRENT_DATE'));  // fecha de registro del procedimiento
            $table->time('hora_registro')->default(DB::raw('CURRENT_DATE'));  // hora de registro del procedimiento
            $table->integer('estado')->default(1); //0=inactivo, 1=Activo

            $table->timestamps();
        });

        Schema::create('urgencia_indicaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_urgencia')->nullable();// id de atencion en urgencia
            $table->text('indicacion')->nullable();
            $table->string('comentario')->nullable();
            $table->bigInteger('id_usuario');
            $table->date('fecha_registro')->default(DB::raw('CURRENT_DATE'));  // fecha de registro del indicacion
            $table->time('hora_registro')->default(DB::raw('CURRENT_DATE'));  // hora de registro del indicacion
            $table->integer('estado')->default(1); //0=inactivo, 1=Activo

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
        Schema::dropIfExists('urgencia_receta');
        Schema::dropIfExists('tipo_procedimiento');
        Schema::dropIfExists('procedimiento');
        Schema::dropIfExists('urgencia_procedimiento');
        Schema::dropIfExists('urgencia_indicacion');
    }
}
