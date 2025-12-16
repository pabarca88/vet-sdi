<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposAPlanTratamientoNutricionTable extends Migration
{
    public function up(): void
    {
        Schema::table('plan_tratamiento_nutricion', function (Blueprint $table) {
            $table->unsignedBigInteger('id_profesional')->nullable()->after('id_ficha_atencion');
            $table->unsignedBigInteger('id_paciente')->nullable()->after('id_profesional');
            $table->unsignedBigInteger('id_lugar_atencion')->nullable()->after('id_paciente');

            // Opcionalmente agrega claves foráneas si las relaciones existen
            // $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('set null');
            // $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('set null');
            // $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('plan_tratamiento_nutricion', function (Blueprint $table) {
            $table->dropColumn(['id_profesional', 'id_paciente', 'id_lugar_atencion']);
        });
    }
}
