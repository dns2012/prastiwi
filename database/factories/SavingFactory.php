<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class SavingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'member_id' => Client::first()->member_id,
            'type'      => $this->faker->randomElement(['SIMPANAN POKOK', 'SIMPANAN SOSIAL', 'SIMPANAN PENSIUN', 'SIMPANAN WAJIB', 'SIMPANAN LEBARAN']),
            'value'     => $this->faker->randomNumber(6)  
        ];
    }
}
