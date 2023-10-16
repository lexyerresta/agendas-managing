<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kunjungan>
 */
class KunjunganFactory extends Factory
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
            // 'waktu_kunjungan' => $this->faker->dateTimeBetween('now', '+1 week'),
            // 'waktu_kunjungan' => $this->faker->dateTimeBetween('now', '+3 month'),
            'waktu_kunjungan' => $this->faker->dateTimeBetween('-36 month', '+12 month'),
            'keperluan' => $this->faker->sentence(mt_rand(2,5)),
            'asal' => $this->faker->company(),
            'no_hp' => $this->faker->phoneNumber(),
            'user_id' => 4
        ];
    }
}
