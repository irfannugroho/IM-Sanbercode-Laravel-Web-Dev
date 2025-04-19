<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = ['genres_id', 'title', 'summary', 'stok', 'image'];

    // Relasi ke tabel genres
    public function genre()
    {
        return $this->belongsTo(Genres::class, 'genres_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'book_id');
    }
    
}
