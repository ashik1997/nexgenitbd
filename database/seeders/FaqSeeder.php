<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $faq = new Faq();
            $faq->question = 'Faq Question '.$i.' ?';
            $faq->answer = 'faq Answer '.$i;
            $faq->save();
        }
    }
}
