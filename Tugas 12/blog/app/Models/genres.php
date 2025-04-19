<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi ke tabel books
    public function books()
    {
        return $this->hasMany(Books::class, 'genres_id');
    }
}
