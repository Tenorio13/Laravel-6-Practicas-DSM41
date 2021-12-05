<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class imagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name'=> $faker->imageUrl($width = 640, $height = 480, 'cats'),
        ];
    }
}
