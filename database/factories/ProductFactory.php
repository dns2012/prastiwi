<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->sentence(),
            'description'   => $this->faker->text(),
            'price'         => $this->faker->randomNumber(6),
            'fake_price'    => $this->faker->randomNumber(6),
        ];
    }
}
