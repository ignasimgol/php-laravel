<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'developer',
        'release_year',
        'mode',
        'platform',
        'cover_image',
    ];

 
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_videogame');
    }
}
