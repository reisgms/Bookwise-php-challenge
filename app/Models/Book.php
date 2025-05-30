<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'author']; // Permite atribuições em massa

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //metodo para calcular a media de avaliações
    public function averageRating()
{
    return round($this->comments()->avg('rating') ?? 0, 1);
}

//adicionado metodo para contar total de avaliações
public function totalRatings()
{
    return $this->comments()->count();
}

}
