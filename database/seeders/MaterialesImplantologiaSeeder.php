<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialesImplantologiaSeeder extends Seeder
{
    public function run()
    {
        $materiales = [
            'Pilar de cicatrización Zimbie',
            'Pilar de cicatrización Zimbie MU',
            'Pilar de cicatrización Neodent GM, TI',
            'Pilar de cicatrización Alpha bio',
            'Pilar de cicatrización Biohorizons',
            'Pilar de cicatrización biomet 3i',
            'Pilar de cicatrización GMI',
            'Pilar de cicatrización Mis',
            'Pilar de cicatrización Nobel',
            'Pilar de cicatrización Straumann',
            'ENCODE DIGITAL',
            'ENCODE DIGITAL EXTERNO',
            'Tornillo de cobertura Neodent',
            'Tapas de cierre',
            'Pilar calcinable',
            'Pilar tallable',
            'TI-BASE',
            'Pilar Angulado',
            'Pilar recto',
            'Análogo mini pilar cónico',
            'Análogo mini pilar antir',
            'Transfer Neodent GM, TI',
            'Transfer Alpha bio',
            'Transfer Biohorizons',
            'Transfer biomet 3i',
            'Transfer GMI',
            'Transfer Mis',
            'Transfer Nobel',
            'Transfer Straumann',
            'Análogo Alpha bio',
            'Análogo Biohorizons',
            'Análogo biomet 3i',
            'Análogo GMI',
            'Análogo Mis',
            'Análogo Nobel',
            'Análogo Straumann'
        ];

        foreach ($materiales as $material) {
            DB::table('materiales_implantologia')->insert([
                'descripcion' => $material,
                'valor' => null,
                'estado' => 1,
                'observaciones' => null,
                'id_tipo_insumo' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
