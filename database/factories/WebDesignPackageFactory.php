<?php

namespace Database\Factories;

use App\Models\WebDesignPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebDesignPackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebDesignPackage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->title,
            'price' => $this->faker->numberBetween(1000,9999),
            'description'   => $this->faker->text,
        ];
    }
}
