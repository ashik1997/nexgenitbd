<?php

namespace Database\Seeders;

use App\Models\VpnPackage;
use Illuminate\Database\Seeder;

class VpnPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VpnPackage::factory()->count(3)->create();
    }
}
