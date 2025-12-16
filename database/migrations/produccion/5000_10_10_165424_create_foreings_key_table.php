<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeingsKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->foreign('id_premium')->references('id')->on('premiums')->onDelete('cascade');
            $table->foreign('id_direccion')->references('id')->on('direcciones')->onDelete('cascade');
            $table->foreign('id_prevision')->references('id')->on('previsiones')->onDelete('cascade');
            $table->foreign('id_antecedente')->references('id')->on('antecedentes_paciente')->onDelete('cascade');
        });

        Schema::table('direcciones', function (Blueprint $table) {
            $table->foreign('id_ciudad')->references('id')->on('ciudades')->onDelete('cascade');
        });

        Schema::table('ciudades', function (Blueprint $table) {
            $table->foreign('id_region')->references('id')->on('regiones')->onDelete('cascade');
        });

        Schema::table('antecedentes_paciente', function (Blueprint $table) {
            $table->foreign('id_grupo_sanguineo')->references('id')->on('grupos_sanguineos')->onDelete('cascade');
        });

        Schema::table('organos_antecedentes', function (Blueprint $table) {
            $table->foreign('id_antecedentes')->references('id')->on('antecedentes_paciente')->onDelete('cascade');
            $table->foreign('id_organo')->references('id')->on('organos')->onDelete('cascade');
        });

        Schema::table('antecedente_enfermedades_cronicas', function (Blueprint $table) {
            $table->foreign('id_antecedentes')->references('id')->on('antecedentes_paciente')->onDelete('cascade');
            $table->foreign('id_enfermedad_cronica')->references('id')->on('enfermedades_cronicas')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
        });

        Schema::table('antecedente_alergias', function (Blueprint $table) {
            $table->foreign('id_antecedentes')->references('id')->on('antecedentes_paciente')->onDelete('cascade');
            $table->foreign('id_alergia')->references('id')->on('alergias')->onDelete('cascade');
        });

        Schema::table('productos_presentacion', function (Blueprint $table) {
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('id_presentacion')->references('id')->on('presentaciones')->onDelete('cascade');
        });

        Schema::table('productos', function (Blueprint $table) {
            $table->foreign('id_temperatura')->references('id')->on('temperaturas')->onDelete('cascade');
        });

        Schema::table('cirugias', function (Blueprint $table) {
            $table->foreign('id_antecedentes')->references('id')->on('antecedentes_paciente')->onDelete('cascade');
        });

        Schema::table('contactos_emergencia', function (Blueprint $table) {
            $table->foreign('id_direccion')->references('id')->on('direcciones')->onDelete('cascade');
        });

        Schema::table('sub_tipos_examen', function (Blueprint $table) {
            $table->foreign('id_tipo_examen')->references('id')->on('tipos_examen')->onDelete('cascade');
        });

        Schema::table('examenes', function (Blueprint $table) {
            $table->foreign('id_subtipo_examen')->references('id')->on('sub_tipos_examen')->onDelete('cascade');
        });

        Schema::table('tipos_especialidad', function (Blueprint $table) {
            $table->foreign('id_especialidad')->references('id')->on('especialidades')->onDelete('cascade');
        });

        Schema::table('profesionales', function (Blueprint $table) {
            $table->foreign('id_direccion')->references('id')->on('direcciones')->onDelete('cascade');
            $table->foreign('id_especialidad')->references('id')->on('especialidades')->onDelete('cascade');
        });

        Schema::table('pacientes_contacto_emergencia', function (Blueprint $table) {
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_contacto')->references('id')->on('contactos_emergencia')->onDelete('cascade');
        });

        Schema::table('presentaciones_dosis', function (Blueprint $table) {
            $table->foreign('id_presentacion')->references('id')->on('presentaciones')->onDelete('cascade');
            $table->foreign('id_dosis')->references('id')->on('dosis')->onDelete('cascade');
        });

        Schema::table('profesionales_tipo_especialidad', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_tipo_especialidad')->references('id')->on('tipos_especialidad')->onDelete('cascade');
        });

        Schema::table('fichas_atenciones', function (Blueprint $table) {
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
        });

        Schema::table('examenes_ppf', function (Blueprint $table) {
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });

        Schema::table('detalles_receta', function (Blueprint $table) {
            $table->foreign('id_ficha')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });

        Schema::table('licencias_ppf', function (Blueprint $table) {
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
            $table->foreign('id_licencia')->references('id')->on('licencias')->onDelete('cascade');
        });

        Schema::table('lugares_atencion', function (Blueprint $table) {
            $table->foreign('id_direccion')->references('id')->on('direcciones')->onDelete('cascade');
        });

        Schema::table('profesionales_lugares_atencion', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
        });

        Schema::table('asistentes', function (Blueprint $table) {
            $table->foreign('id_premium')->references('id')->on('premiums')->onDelete('cascade');
            $table->foreign('id_direccion')->references('id')->on('direcciones')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
        });

        Schema::table('profesionales_asistentes', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_asistente')->references('id')->on('asistentes')->onDelete('cascade');
        });

        Schema::table('asistentes_laboratorios', function (Blueprint $table) {
            $table->foreign('id_laboratorio')->references('id')->on('laboratorios')->onDelete('cascade');
            $table->foreign('id_asistente')->references('id')->on('asistentes')->onDelete('cascade');
        });

        Schema::table('bonos', function (Blueprint $table) {
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
        });

        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_asistente')->references('id')->on('asistentes')->onDelete('cascade');
            $table->foreign('id_estado')->references('id')->on('parametros')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });

        Schema::table('profesional_horarios', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
        });

        Schema::table('asistente_contacto_emergencia', function (Blueprint $table) {
            $table->foreign('id_asistente')->references('id')->on('asistentes')->onDelete('cascade');
            $table->foreign('id_contacto')->references('id')->on('contactos_emergencia')->onDelete('cascade');
        });

        Schema::table('control_obesidad', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            //$table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });

        Schema::table('certificados_reposos', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });

        Schema::table('interconsultas', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });

        Schema::table('asistentes_lugar_atencion', function (Blueprint $table) {
            $table->foreign('id_asistente')->references('id')->on('asistentes')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
        });

        Schema::table('usos_personales', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });

        Schema::table('hipertensiones', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });

        Schema::table('diabetes', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });
        Schema::table('diagnosticos_geses', function (Blueprint $table) {
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });

        Schema::table('lugar_atencion_user', function (Blueprint $table) {
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
        });

        /*  Schema::table('profesional_diagnosticos_cies', function (Blueprint $table) {
              $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
              $table->foreign('id_diagnostico_cie')->references('id')->on('lugares_atencion')->onDelete('cascade');
          });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}