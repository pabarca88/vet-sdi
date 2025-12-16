<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubTipoProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $subTipos = [
            [
                'id_tipo_producto' => 9,
                'nombre' => 'Audífonos',
                'descripcion' => 'Audífonos para corrección auditiva',
                'codigo' => 'AUD',
                'activo' => true,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tipo_producto' => 9,
                'nombre' => 'Repuestos',
                'descripcion' => 'Repuestos y accesorios para audífonos',
                'codigo' => 'REP',
                'activo' => true,
                'orden' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tipo_producto' => 9,
                'nombre' => 'Pilas',
                'descripcion' => 'Pilas y baterías para audífonos',
                'codigo' => 'PIL',
                'activo' => true,
                'orden' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('sub_tipo_productos')->insert($subTipos);

        $this->command->info('✅ Se insertaron ' . count($subTipos) . ' sub-tipos de productos correctamente.');
    }
}
