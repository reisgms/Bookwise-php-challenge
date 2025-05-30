<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Comment;


class BooksController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query()
            ->with('comments') // Carrega os comentários junto com os livros
            ->when($request->search, fn($query, $value) => $query->where('title', 'like', "%{$value}%"))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('books.index', compact('books'));
    }

    public function my(Request $request)
    {
        $books = Book::query()
            ->where('user_id', $request->user()->id)
            ->when($request->search, fn($query, $value) => $query->where('title', 'like', "%{$value}%"))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('books.my', compact('books')); //possivel erro, apagar o 's' de books
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id; // corrigido o erro de sintaxe -> $requests foi mudado para $request, conforme passado por paramentro
        Book::create($data);

        return to_route('books.my')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        $comments = Comment::where('book_id', $book->id)->latest()->get();

        // Calculando a média das avaliações
        $averageRating = round($comments->avg('rating') ?? 0, 1);
        $totalRatings = $comments->count();

        return view('books.show', compact('book', 'comments', 'averageRating', 'totalRatings'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return to_route('books.show', $book)->with('success', 'Book updated successfully.');
    }
}
