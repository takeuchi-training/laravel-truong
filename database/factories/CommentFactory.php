<?php

namespace Database\Factories;

use App\Models\BlogPost;
use App\Models\User;
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
            'blog_post_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'user_id' => User::factory(),
            'content' => $this->faker->paragraph(1)
        ];
    }
}
