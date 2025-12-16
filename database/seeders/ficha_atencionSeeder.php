<?php

namespace Database\Seeders;

use App\Models\FichaAtencion;
use Illuminate\Database\Seeder;

class ficha_atencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FichaAtencion::factory(30)->create();
    }
}
