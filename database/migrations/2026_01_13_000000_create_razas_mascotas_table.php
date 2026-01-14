<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRazasMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('razas_mascotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('especie_id');
            $table->string('nombre', 150);
            $table->timestamps();

            $table->index(['especie_id', 'nombre']);
            $table->foreign('especie_id')->references('id')->on('especies_mascotas')->cascadeOnDelete();
        });

        Schema::table('mascotas', function (Blueprint $table) {
            $table->unsignedBigInteger('raza_id')->nullable()->after('especie_id');
            $table->foreign('raza_id')->references('id')->on('razas_mascotas')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropForeign(['raza_id']);
            $table->dropColumn('raza_id');
        });

        Schema::dropIfExists('razas_mascotas');
    }
}
