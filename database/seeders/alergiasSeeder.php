<?php

namespace Database\Seeders;

use App\Models\alergias;
use Illuminate\Database\Seeder;

class alergiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        alergias::factory(10)->create();
    }
}
