<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosPeriodonciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos_periodoncia', function (Blueprint $table) {
            $table->id();

            // Relaciones principales
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->unsignedBigInteger('id_especialidad')->nullable();

            // Datos del procedimiento
            $table->string('numero_pieza')->nullable();
            $table->unsignedBigInteger('id_procedimiento')->nullable();
            $table->date('fecha');

            // Tipo de procedimiento
            $table->unsignedBigInteger('id_tipo_procedimiento')->nullable();
            $table->string('tipo_procedimiento')->nullable();

            // Membrana
            $table->unsignedBigInteger('id_tipo_membrana')->nullable();
            $table->string('membrana')->nullable();
            $table->unsignedBigInteger('id_material_membrana')->nullable();
            $table->string('material_membrana')->nullable();

            // Anestesia
            $table->unsignedBigInteger('id_tipo_anestesia')->nullable();
            $table->string('anestesia')->nullable();
            $table->integer('numero_tubos')->nullable();
            $table->unsignedBigInteger('id_tecnica_anestesia')->nullable();
            $table->string('tecnica_anestesia')->nullable();
            $table->unsignedBigInteger('id_anestesico')->nullable();
            $table->string('anestesico')->nullable();

            // Incidentes
            $table->unsignedBigInteger('id_incidentes')->nullable();
            $table->string('incidentes')->nullable();

            // Injerto óseo
            $table->unsignedBigInteger('id_mat_injerto_oseo')->nullable();
            $table->string('material_injerto_oseo')->nullable();
            $table->string('metodo_injerto_oseo')->nullable();

            // Suturas
            $table->unsignedBigInteger('id_suturas')->nullable();
            $table->string('suturas')->nullable();
            $table->integer('grosor_nylon')->nullable();

            // Otros campos
            $table->string('tiempo_quirurgico')->nullable();
            $table->text('observaciones')->nullable();
            $table->integer('estado')->default(1);

            $table->timestamps();

            // Índices para mejorar rendimiento
            $table->index(['id_paciente', 'id_profesional']);
            $table->index('id_ficha_atencion');
            $table->index('fecha');
            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedimientos_periodoncia');
    }
}
