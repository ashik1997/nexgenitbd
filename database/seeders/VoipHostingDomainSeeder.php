<?php

namespace Database\Seeders;

use App\Models\VoipHostingDomain;
use Illuminate\Database\Seeder;

class VoipHostingDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VoipHostingDomain::factory()->count(3)->create();
    }
}
