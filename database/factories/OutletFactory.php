<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OutletFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->company;

        return [
            'name' => $name,
            'location' => $this->faker->city,
            'slug' => Str::slug($name) . '-' . Str::random(5),
            'status' => $this->faker->boolean(80), // 80% chance active
        ];
    }
}
