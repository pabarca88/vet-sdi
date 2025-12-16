<?php

namespace Database\Seeders;

use App\Models\LugarAtencion;
use Illuminate\Database\Seeder;

class lugares_atencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LugarAtencion::factory(10)->create();
    }
}
