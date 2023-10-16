<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Narasumber>
 */
class NarasumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            // 'tanggal_acara' => $this->faker->dateTimeBetween('now', '+1 week'),
            // 'tanggal_acara' => $this->faker->dateTimeBetween('now', '+3 month'),
            'tanggal_acara' => $this->faker->dateTimeBetween('-36 month', '+12 month'),
            'tempat' => $this->faker->streetAddress(),
            'asal' => $this->faker->company(),
            'no_hp' => $this->faker->phoneNumber(),
            'user_id' => 4
        ];
    }
}
