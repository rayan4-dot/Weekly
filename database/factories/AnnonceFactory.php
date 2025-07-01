<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonce>
 */
class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(3),
            'prix' => $this->faker->optional()->randomFloat(2, 10, 1000),
            'image' => $this->faker->optional()->imageUrl(),
            'user_id' => \App\Models\User::factory(),
            'categorie_id' => \App\Models\Categorie::factory(),
            'status' => $this->faker->randomElement(['actif', 'brouillon', 'archivé']),
        ];
    }
}
