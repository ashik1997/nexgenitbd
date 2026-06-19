<?php

namespace Database\Factories;

use App\Models\WebsiteBanner;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteBannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebsiteBanner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->name,
            'description'   => $this->faker->name,
            'view_btn_url'       => 'http://google.com/',
            'purchase_btn_url'     => 'http://google.com/',
        ];
    }
}
