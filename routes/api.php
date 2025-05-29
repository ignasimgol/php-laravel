<?php

use App\Http\Controllers\Api\VideogameApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API routes
Route::get('videogames/{page?}', [VideogameApiController::class, 'index']);
Route::get('videogame/{id}', [VideogameApiController::class, 'show']);
Route::get('genre/{id}/{page?}', [VideogameApiController::class, 'getByGenre']);