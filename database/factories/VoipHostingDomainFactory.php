<?php

namespace Database\Factories;

use App\Models\VoipHostingDomain;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoipHostingDomainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VoipHostingDomain::class;

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
            'benefit'   => $this->faker->text,
        ];
    }
}
