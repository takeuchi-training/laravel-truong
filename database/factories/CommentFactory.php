<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'blog_post_id' => $this->faker->numberBetween($min = 1, $max = 60),
            'content' => $this->faker->paragraph(1)
        ];
    }
}
