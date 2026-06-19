<?php

namespace Database\Seeders;

use App\Models\HomeContent;
use Illuminate\Database\Seeder;

class HomeContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homeContent = new HomeContent();
        $homeContent->title = 'Home content title 1';
        $homeContent->description = 'Home content description 1';
        $homeContent->save();

        $homeContent = new HomeContent();
        $homeContent->title = 'Home content title 2';
        $homeContent->description = 'Home content description 2';
        $homeContent->save();

        $homeContent = new HomeContent();
        $homeContent->title = 'Home content title 3';
        $homeContent->description = 'Home content description 3';
        $homeContent->save();
    }
}
