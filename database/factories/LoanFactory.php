<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'member_id'             => Client::first()->member_id,
            'loan_id'               => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'loan_type'             => $this->faker->randomElement(['USP', 'INSIDENTIL', 'GERBUNG']),
            'loan_at'               => now(),
            'loan_value'            => $this->faker->randomNumber(6),
            'loan_interest'         => $this->faker->randomNumber(6),
            'loan_value_paid'       => $this->faker->randomNumber(6),
            'loan_interest_paid'    => $this->faker->randomNumber(6)
        ];
    }
}
