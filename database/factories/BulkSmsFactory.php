<?php

namespace Database\Factories;

use App\Models\BulkSms;
use Illuminate\Database\Eloquent\Factories\Factory;

class BulkSmsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BulkSms::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => $this->faker->name,
            'sms_amount' => $this->faker->numberBetween(1000,9999),
            'price'   => $this->faker->numberBetween(100,999),
            'description'   => $this->faker->text,
        ];
    }
}
