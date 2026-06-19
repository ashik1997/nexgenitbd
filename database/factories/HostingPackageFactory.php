<?php

namespace Database\Factories;

use App\Models\HostingPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostingPackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HostingPackage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => $this->faker->name,
            'yearly_price' => $this->faker->numberBetween(1000,9999),
            'description'   => $this->faker->text,
        ];
    }
}
