<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengumuman>
 */
class PengumumanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,3)),
            'body' => $this->faker->paragraphs(3, true),
            'user_id' => mt_rand(1,4),
            'division_id' => mt_rand(1,7),
            // 'created_at' => $this->faker->dateTimeBetween('now', '+1 week')
            // 'created_at' => $this->faker->dateTimeBetween('now', '+3 month')
            'created_at' => $this->faker->dateTimeBetween('-36 month', '+12 month')
        ];
    }
}
