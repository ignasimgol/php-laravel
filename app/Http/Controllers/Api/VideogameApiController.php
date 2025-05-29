<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Videogame;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VideogameApiController extends Controller
{
    public function index(Request $request, $page = 1): JsonResponse
    {
        try {
            // Get all videogames with pagination
            $videogames = Videogame::with('genres')
                ->orderBy('id')
                ->paginate(10);
            
            return response()->json($videogames);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            // Find the videogame by ID
            $videogame = Videogame::with('genres')->find($id);
            
            if (!$videogame) {
                return response()->json(['error' => 'Videogame not found'], 404);
            }
            
            return response()->json($videogame);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getByGenre($id, $page = 1): JsonResponse
    {
        try {
            // Find the genre by ID
            $genre = Genre::find($id);
            
            if (!$genre) {
                return response()->json(['error' => 'Genre not found'], 404);
            }
            
            // Get videogames for this genre with pagination
            $videogames = $genre->videogames()
                ->select('id', 'title', 'release_year')
                ->orderBy('id')
                ->paginate(10);
            
            return response()->json($videogames);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
