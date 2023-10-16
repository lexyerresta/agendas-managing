<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_agenda' => $this->faker->sentence(mt_rand(2,5)),
            'perihal' => $this->faker->sentence(mt_rand(2,5)),
            'notulensi' => $this->faker->paragraphs(3, true),
            // 'waktu_pelaksanaan' => $this->faker->dateTimeBetween('now', '+1 week'),
            // 'waktu_pelaksanaan' => $this->faker->dateTimeBetween('now', '+3 month'),
            'waktu_pelaksanaan' => $this->faker->dateTimeBetween('-18 month', '+3 month'),
            'tempat_pelaksanaan' => $this->faker->address(),
            'link_dokumentasi' => $this->faker->url(),
            'user_id' => mt_rand(1,4),
            'division_id' => mt_rand(1,7)
        ];
    }    
}
