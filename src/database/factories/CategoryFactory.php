<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
                'gender' => $this->faker->randomElement([1]),
                'email' => $this->faker->unique()->safeEmail(),
                'tel' => $this->faker->phoneNumber(),
                'address' => $this->faker->address(),
                'building' => $this->faker->optional()->secondaryAddress(),
                'detail' => $this->faker->paragraph(),
                'created_at' => $this->faker->dateTime(),
                'updated_at' => $this->faker->dateTime(),
        ];
    }
}
