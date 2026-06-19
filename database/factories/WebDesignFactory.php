<?php

namespace Database\Factories;

use App\Models\WebDesign;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebDesignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebDesign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->title,
            'description'   => $this->faker->text,
        ];
    }
}
