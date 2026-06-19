<?php

namespace Database\Factories;

use App\Models\VpnPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

class VpnPackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VpnPackage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->title,
            'monthly_price' => $this->faker->numberBetween(1000,9999),
            'description'   => $this->faker->text,
        ];
    }
}
