<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'    => $this->faker->randomElement([1, 2, 3, 4]),
            'image'         => $this->faker->randomElement([
                    'https://media.istockphoto.com/photos/japanese-food-udon-noodle-soup-picture-id1150113717',
                    'https://cdn.pixabay.com/photo/2017/04/12/17/36/soup-2225143__340.jpg',
                    'https://previews.123rf.com/images/kps1234/kps12341708/kps1234170800333/83738450-kitsune-udon-japanese-food-.jpg'
                ])
        ];
    }
}
