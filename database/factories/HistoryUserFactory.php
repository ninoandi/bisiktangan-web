<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HistoryUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => User::inRandomOrder()->first()->id,
            'deskripsi' => $this->faker->sentence(6),
            'video' => 'D:\laragon\www\bisiktangan-web\storage\app\public\videos\tyJ6myE936AlrfKYzDVa6IoeedG34egwuVIGuMsE.mp4', // atau path palsu sementara
        ];
    }
}