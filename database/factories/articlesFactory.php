<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class articlesFactory extends Factory
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
            'title'=> $faker->sentence,
        'img'=> $faker->imageUrl($width = 640, $height = 480),
        'subtitle'=> $faker->sentence,
        'body'=> $faker->paragraph(2),
        /* definos nuestra llaves foraneas */
        'category_id'=> Category::all()->random()->id,
        'img_id'=> Images::all()->random()->id
        ];
    }
}
