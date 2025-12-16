<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPesoInicialToPlanTratamientoOtrosProfesionalesTable extends Migration
{
    public function up()
    {
        Schema::table('plan_tratamiento_otros_profesionales', function (Blueprint $table) {
            $table->decimal('peso_inicial', 8, 2)->nullable()->after('id'); // Cambia 'id' por la columna deseada si es necesario
        });
    }

    public function down()
    {
        Schema::table('plan_tratamiento_otros_profesionales', function (Blueprint $table) {
            $table->dropColumn('peso_inicial');
        });
    }
}
