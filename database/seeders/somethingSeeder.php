<?php

namespace Database\Seeders;

use App\Models\something1;
use Illuminate\Database\Seeder;

class somethingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        something1::factory()
        ->count(25)
        ->create();
    }
}
