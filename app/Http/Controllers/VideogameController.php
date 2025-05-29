<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    public function index()
    {
        $fixedGames = Videogame::whereIn('title', [
            'Mario Kart 8 Deluxe',
            'Pokemon Legends: Arceus'
        ])->get();

        $randomGames = Videogame::whereNotIn('title', [
            'Mario Kart 8 Deluxe',
            'Pokemon Legends: Arceus'
        ])->inRandomOrder()->limit(3)->get();

        $videogames = $fixedGames->concat($randomGames);

        return view('videogames.index', compact('videogames'));
    }

    public function show(Videogame $videogame)
    {
        return view('videogames.show', compact('videogame'));
    }
}
