<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'member_id' => 2001,
            'employee_id' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'position' => $this->faker->jobTitle(),
            'name' => $this->faker->name(),
            'password' => $this->faker->regexify('[A-Za-z0-9]{50}')
        ];
    }
}
