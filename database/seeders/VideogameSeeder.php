<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Videogame;
use Illuminate\Database\Seeder;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make sure we have genres to assign
        $genres = Genre::all();
        
        // If no genres exist, create some basic ones
        if ($genres->isEmpty()) {
            $genreNames = [
                'Action', 'Adventure', 'RPG', 'Strategy', 'Simulation',
                'Sports', 'Racing', 'Puzzle', 'Fighting', 'Shooter'
            ];
            
            foreach ($genreNames as $name) {
                Genre::create(['name' => $name]);
            }
            
            $genres = Genre::all();
        }
        
        // Create 40 videogames
        Videogame::factory(40)->create()->each(function ($videogame) use ($genres) {
            // Assign 1-3 random genres to each videogame
            $randomGenres = $genres->random(rand(1, 3));
            $videogame->genres()->attach($randomGenres->pluck('id')->toArray());
        });
    }
}
