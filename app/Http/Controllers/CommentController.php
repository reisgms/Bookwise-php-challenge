<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Implementada a funcionalidade de Criar Comentário
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:500',
        ]);

        Comment::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comentário adicionado!');
    }
}
