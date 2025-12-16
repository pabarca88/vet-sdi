<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre_medicamento'=> 'Paracetamol',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> 'Migranol',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> 'Salbutamol',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> 'Ibuprofeno',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> 'Dipirona',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> 'Diclofenaco',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> 'Vitamina C',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> '8',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> '9',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> '10',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> '11',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> '12',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> '13',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
        Producto::create([
            'nombre_medicamento'=> '14',
            'tipo_control'=>mt_Rand(1, 7),
            'droga'=>Str::random(10)
        ]);
    }
}
