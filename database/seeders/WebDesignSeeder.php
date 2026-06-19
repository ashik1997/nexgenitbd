<?php

namespace Database\Seeders;

use App\Models\WebDesign;
use Illuminate\Database\Seeder;

class WebDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebDesign::factory()->count(3)->create();
    }
}
