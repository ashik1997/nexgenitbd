<?php

namespace Database\Seeders;

use App\Models\VoipDialer;
use Illuminate\Database\Seeder;

class VoipDialerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VoipDialer::factory()->count(3)->create();
    }
}
