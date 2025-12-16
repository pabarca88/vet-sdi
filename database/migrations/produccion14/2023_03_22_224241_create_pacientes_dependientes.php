<?php

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesDependientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_dependientes', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_responsable')->nullable();

            $table->bigInteger('id_paciente')->nullable();
            $table->string('relacion', 50)->nullable();

            $table->bigInteger('tipo_dependencia')->nullable();

            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->string('comentario')->nullable();

            $table->string('confirmacion_inscripcion')->nullable();
            $table->bigInteger('id_log_users_devices')->nullable();

            $table->string('otro')->nullable();
            $table->bigInteger('id_user')->nullable();
            $table->integer('estado')->nullable()->default(1);

            $table->timestamps();
        });

        Schema::create('responsable', function (Blueprint $table) {
            $table->id();

            $table->string('nombre'); //
            $table->string('apellido'); //
            $table->string('rut'); //
            $table->string('email'); //
            $table->string('telefono')->nullable(); //

            $table->bigInteger('id_responsable_tipo'); //

            $table->string('id_responsable_nivel'); //

            $table->date('fecha_inicio')->nullable(); //
            $table->date('fecha_termino')->nullable(); //
            $table->string('comentario')->nullable(); //

            $table->string('confirmacion_inscripcion')->nullable(); // (app o email)
            $table->bigInteger('id_log_users_devices')->nullable(); //

            $table->string('confirmacion_responsable_app')->nullable(); //
            $table->string('confirmacion_responsable_email')->nullable(); //

            $table->string('otro')->nullable(); //
            $table->bigInteger('id_user'); //
            $table->integer('estado')->nullable()->default(1);

            $table->timestamps();
        });

        Schema::create('tipo_dependencia', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('alias')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('estado')->nullable()->default(1);

            $table->timestamps();
        });

        Schema::create('responsable_tipo', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('alias')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('estado')->nullable()->default(1);

            $table->timestamps();
        });

        Schema::create('responsable_nivel', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('alias')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('estado')->nullable()->default(1);

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
        Schema::dropIfExists('pacientes_dependientes');
        Schema::dropIfExists('responsable');
        Schema::dropIfExists('tipo_dependencia');
        Schema::dropIfExists('responsable_tipo');
        Schema::dropIfExists('responsable_nivel');
    }
}
