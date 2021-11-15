<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_id' => Site::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'content' => $this->faker->paragraph 
        ];
    }
}