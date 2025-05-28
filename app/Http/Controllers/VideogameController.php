<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    public function index()
    {
        // Get the two fixed games (Mario Kart and Pokemon)
        $fixedGames = Videogame::whereIn('title', [
            'Mario Kart 8 Deluxe',
            'Pokemon Legends: Arceus'
        ])->get();

        // Get 3 random games excluding the fixed ones
        $randomGames = Videogame::whereNotIn('title', [
            'Mario Kart 8 Deluxe',
            'Pokemon Legends: Arceus'
        ])->inRandomOrder()->limit(3)->get();

        // Combine the collections
        $videogames = $fixedGames->concat($randomGames);

        return view('videogames.index', compact('videogames'));
    }

    public function show(Videogame $videogame)
    {
        return view('videogames.show', compact('videogame'));
    }
}
