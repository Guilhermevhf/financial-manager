<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revenue>
 */
class RevenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        if (Category::count() < 15) {
            Category::factory(15)->create();
        }

        if (User::count() < 15) {
            User::factory(15)->create();
        }

        $user = User::all()->random();
        $category = Category::all()->random();

        return [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'date_revenue' => fake()->date,
            'description' => fake()->text(30),
            'value' => fake()->randomFloat(2,0.5,5000),
        ];
    }
}
