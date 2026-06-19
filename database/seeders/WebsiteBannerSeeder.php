<?php

namespace Database\Seeders;

use App\Models\WebsiteBanner;
use Illuminate\Database\Seeder;

class WebsiteBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteBanner::factory()->count(5)->create();
    }
}
