<?php

// Create genres if they don't exist already
$actionGenre = App\Models\Genre::firstOrCreate(['name' => 'Action']);
$racingGenre = App\Models\Genre::firstOrCreate(['name' => 'Racing']);
$adventureGenre = App\Models\Genre::firstOrCreate(['name' => 'Adventure']);
$rpgGenre = App\Models\Genre::firstOrCreate(['name' => 'RPG']);

// Create Mario Kart 8 Deluxe
$marioKart = new App\Models\Videogame();
$marioKart->title = 'Mario Kart 8 Deluxe';
$marioKart->developer = 'Nintendo';
$marioKart->release_year = 2017;
$marioKart->mode = 'multijugador';
$marioKart->platform = 'Nintendo Switch';
$marioKart->cover_image = 'mario_kart_8.jpg';
$marioKart->created_at = now();
$marioKart->updated_at = now();
$marioKart->save();

// Assign genres to Mario Kart
$marioKart->genres()->attach([$racingGenre->id, $actionGenre->id]);

// Create Pokemon Legends: Arceus
$pokemon = new App\Models\Videogame();
$pokemon->title = 'Pokemon Legends: Arceus';
$pokemon->developer = 'Game Freak';
$pokemon->release_year = 2022;
$pokemon->mode = 'un jugador';
$pokemon->platform = 'Nintendo Switch';
$pokemon->cover_image = 'pokemon_arceus.jpg';
$pokemon->created_at = now();
$pokemon->updated_at = now();
$pokemon->save();

// Assign genres to Pokemon
$pokemon->genres()->attach([$adventureGenre->id, $rpgGenre->id]);

// Output results
echo "Mario Kart 8 Deluxe and Pokemon Legends: Arceus have been added to the database!\n";
echo "Mario Kart genres: " . implode(', ', $marioKart->genres->pluck('name')->toArray()) . "\n";
echo "Pokemon genres: " . implode(', ', $pokemon->genres->pluck('name')->toArray()) . "\n";