<?php

namespace Database\Factories;

use App\Models\VoipDialer;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoipDialerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VoipDialer::class;

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
