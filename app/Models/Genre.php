<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
    ];


    public function videogames()
    {
        return $this->belongsToMany(Videogame::class, 'genre_videogame');
    }

    public $timestamps = false;
}