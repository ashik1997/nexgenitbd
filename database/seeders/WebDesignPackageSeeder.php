<?php

namespace Database\Seeders;

use App\Models\WebDesignPackage;
use Illuminate\Database\Seeder;

class WebDesignPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebDesignPackage::factory()->count(3)->create();
    }
}
