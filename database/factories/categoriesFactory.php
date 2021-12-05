<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class categoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        //definimos que datos se van a ingresar a nuestra BD y que tipo 
        //faker es una libreria que viene por defecto en laravel que nos ayuda a ingresar los tipos de datos
        'name' => $this->faker->word
        ];
    }
}
