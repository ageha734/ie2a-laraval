<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
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
            'title' => $this->faker->realText(20),
            'body' => $this->faker->realText(50),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 week', $endDate = 'now'),
        ];
    }
}
