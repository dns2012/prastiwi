<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => 'admin',
            'email'     => 'admin@prastiwi.com',
            'password'  => Hash::make('prastiwi'),
            'role'      => 1,
            'avatar'    => 'https://pngimage.net/wp-content/uploads/2018/05/default-user-profile-image-png-7.png'
        ];
    }
}
