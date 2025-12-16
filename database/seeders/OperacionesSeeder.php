<?php

namespace Database\Seeders;

use App\Models\Operaciones;
use Illuminate\Database\Seeder;

class OperacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Operaciones::factory(20)->create();
    }
}
