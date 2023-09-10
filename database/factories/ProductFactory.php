<?php
// Created by Sebastian Arias
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->Name,
            'description' => $this->faker->text(256),
            'price' => $this->faker->numberBetween($min = 1000000, $max = 10000000),
            'quantity'=>$this->faker->numberBetween($min= 1, $max= 3),
            'location'=>$this->faker->country()
        ];
    }
}
