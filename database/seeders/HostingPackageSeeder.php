<?php

namespace Database\Seeders;

use App\Models\HostingPackage;
use Illuminate\Database\Seeder;

class HostingPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HostingPackage::factory()->count(6)->create();
    }
}
