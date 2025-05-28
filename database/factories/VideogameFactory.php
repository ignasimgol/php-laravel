<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videogame>
 */
class VideogameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $platforms = ['PlayStation', 'Xbox', 'Nintendo Switch', 'PC'];
        $modes = ['un jugador', 'multijugador'];
        
        return [
            'title' => $this->faker->unique()->sentence(3),
            'developer' => $this->faker->company(),
            'release_year' => $this->faker->numberBetween(2000, 2024),
            'mode' => $this->faker->randomElement($modes),
            'platform' => $this->faker->randomElement($platforms),
            'cover_image' => 'covers/' . $this->faker->word() . '.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
