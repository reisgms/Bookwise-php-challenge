<?php

namespace App\Models;
// criada a model dos comentarios
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'user_id', 'content', 'rating'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

