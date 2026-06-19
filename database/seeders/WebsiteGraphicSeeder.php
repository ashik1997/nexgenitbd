<?php

namespace Database\Seeders;

use App\Models\WebsiteGraphic;
use Illuminate\Database\Seeder;

class WebsiteGraphicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteGraphic::factory()->count(6)->create();
    }
}
