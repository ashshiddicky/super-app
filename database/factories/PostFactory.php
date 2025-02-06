<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(3); // Judul unik dengan 3 kata
        return [
            // 'title'=> fake()->sentence(),
            // 'author_id'=> User::factory(),
            // 'category_id'=> Category::factory(),
            // 'slug'=> Str::slug(fake()->sentence()),
            // 'body'=> fake()->text(),
            'title' => $title,
            'slug' => Str::slug($title), // Slug dari judul
            'author_id' => User::factory(), // Relasi ke User
            'category_id' => Category::factory(), // Relasi ke Category
            'body' => $this->faker->paragraphs(3, true), // Isi artikel (3 paragraf)
        ];
    }
}
