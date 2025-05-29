<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query()->when($request->search, fn($query, $value) => $query->where('title', 'like', "%{$value}%"))->orderBy('created_at', 'desc')->get();

        return view('books.index', compact('books'));
    }

    public function my(Request $request)
    {
        $books = Book::query()
            ->where('user_id', $request->user()->id)
            ->when($request->search, fn($query, $value) => $query->where('title', 'like', "%{$value}%"))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('books.my', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $requests->user()->id;
        Book::create($data);

        return to_route('books.my')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
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
