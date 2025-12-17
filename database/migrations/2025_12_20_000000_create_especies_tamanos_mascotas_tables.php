<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEspeciesTamanosMascotasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especies_mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->boolean('requiere_detalle')->default(false);
            $table->timestamps();
        });

        Schema::create('tamanos_mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('especie_tamano_mascota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('especie_id');
            $table->unsignedBigInteger('tamano_id');
            $table->timestamps();

            $table->unique(['especie_id', 'tamano_id']);
            $table->foreign('especie_id')->references('id')->on('especies_mascotas')->cascadeOnDelete();
            $table->foreign('tamano_id')->references('id')->on('tamanos_mascotas')->cascadeOnDelete();
        });

        Schema::table('mascotas', function (Blueprint $table) {
            $table->unsignedBigInteger('especie_id')->nullable()->after('nombre');
            $table->unsignedBigInteger('tamano_id')->nullable()->after('especie_id');
            $table->boolean('esterilizado')->default(false)->after('tamano_id');
            $table->date('fecha_esterilizacion')->nullable()->after('esterilizado');
            $table->string('enfermedad_cronica', 500)->nullable()->after('fecha_esterilizacion');
        });

        Schema::table('mascotas', function (Blueprint $table) {
            $table->foreign('especie_id')->references('id')->on('especies_mascotas')->onDelete('set null');
            $table->foreign('tamano_id')->references('id')->on('tamanos_mascotas')->onDelete('set null');
        });

        $especies = [
            ['id' => 1, 'nombre' => 'Canina', 'slug' => 'canina', 'requiere_detalle' => false],
            ['id' => 2, 'nombre' => 'Felina', 'slug' => 'felina', 'requiere_detalle' => false],
            ['id' => 3, 'nombre' => 'Pez', 'slug' => 'pez', 'requiere_detalle' => false],
            ['id' => 4, 'nombre' => 'Aves', 'slug' => 'aves', 'requiere_detalle' => false],
            ['id' => 5, 'nombre' => 'Reptiles', 'slug' => 'reptiles', 'requiere_detalle' => false],
            ['id' => 6, 'nombre' => 'Roedores', 'slug' => 'roedores', 'requiere_detalle' => false],
            ['id' => 7, 'nombre' => 'Hurones', 'slug' => 'hurones', 'requiere_detalle' => false],
            ['id' => 8, 'nombre' => 'Otros', 'slug' => 'otros', 'requiere_detalle' => true],
        ];

        $tamanos = [
            ['id' => 1, 'nombre' => 'Pequeña', 'slug' => 'pequena'],
            ['id' => 2, 'nombre' => 'Mediana', 'slug' => 'mediana'],
            ['id' => 3, 'nombre' => 'Grande', 'slug' => 'grande'],
        ];

        $timestamp = now();
        $especies = array_map(function ($item) use ($timestamp) {
            return $item + ['created_at' => $timestamp, 'updated_at' => $timestamp];
        }, $especies);

        $tamanos = array_map(function ($item) use ($timestamp) {
            return $item + ['created_at' => $timestamp, 'updated_at' => $timestamp];
        }, $tamanos);

        DB::table('especies_mascotas')->insertOrIgnore($especies);
        DB::table('tamanos_mascotas')->insertOrIgnore($tamanos);

        $pivot = [];
        foreach ($especies as $especie) {
            foreach ($tamanos as $tamano) {
                $pivot[] = [
                    'especie_id' => $especie['id'],
                    'tamano_id' => $tamano['id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        DB::table('especie_tamano_mascota')->insertOrIgnore($pivot);

        $tamanoMap = collect($tamanos)->pluck('id', 'slug');

        DB::table('mascotas')
            ->select('id', 'especie', 'tamano', 'especie_id', 'tamano_id')
            ->orderBy('id')
            ->chunk(100, function ($mascotas) use ($tamanoMap) {
                foreach ($mascotas as $mascota) {
                    $updates = [];
                    if (!$mascota->especie_id && !is_null($mascota->especie)) {
                        $updates['especie_id'] = $mascota->especie;
                    }
                    if (!$mascota->tamano_id && $mascota->tamano && $tamanoMap->has($mascota->tamano)) {
                        $updates['tamano_id'] = $tamanoMap->get($mascota->tamano);
                    }

                    if (!empty($updates)) {
                        DB::table('mascotas')->where('id', $mascota->id)->update($updates);
                    }
                }
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
            $table->dropForeign(['especie_id']);
            $table->dropForeign(['tamano_id']);
            $table->dropColumn(['especie_id', 'tamano_id', 'esterilizado', 'fecha_esterilizacion', 'enfermedad_cronica']);
        });

        Schema::dropIfExists('especie_tamano_mascota');
        Schema::dropIfExists('tamanos_mascotas');
        Schema::dropIfExists('especies_mascotas');
    }
}
