<?php

namespace Database\Seeders;

use App\Models\BulkSms;
use Illuminate\Database\Seeder;

class BulkSmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BulkSms::factory()->count(6)->create();
    }
}
