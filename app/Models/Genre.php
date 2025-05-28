<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the videogames associated with the genre.
     */
    public function videogames()
    {
        return $this->belongsToMany(Videogame::class, 'genre_videogame');
    }

    public $timestamps = false;
}