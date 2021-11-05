<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
        'song_name',
        'artist_name',
        'genre',
        'release_date',
        'cover_image',
        'song'
    ];
}
