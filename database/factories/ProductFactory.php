<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $merchant = User::where('role', 'merchant')->inRandomOrder()->first();
        return [
            'user_id' =>$merchant->id,
            'category_id' => Category::pluck('id')->random(),
            'title' => fake()->word(rand(3, 5), true),
            'description' => fake()->paragraph,
            'image' => fake()->imageUrl($width = 640, $height = 480), // Menghasilkan URL gambar
            'price' => round(fake()->randomFloat(2, 10, 1000)), // Ubah float ke integer dengan round()
        ];
    }
}
