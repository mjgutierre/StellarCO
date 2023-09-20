<?php

// Created by Sebastian Arias

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->Name,
            'description' => $this->faker->text(255),
            'product_id' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
