@extends('layout.app')

@section('content')
    <section class="container py-4">
        <form action="/">
            <input type="text" class="form-control" name="search" placeholder="Buscar">
        </form>

        <main class="mt-4 card-columns">
            @foreach ($books as $book)
                <a href="{{ route('books.show', $book) }}">
                    <div class="card" style="min-height: 400px;">
                        <img class="card-img-top" src="https://placehold.co/600x400" alt="Imagem de capa do card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ str($book->description)->limit(50) }}</p>
                            <p class="card-text text-right">
                                <small class="text-muted">
                                    ⭐ {{ str_repeat('⭐', round($book->comments->avg('rating') ?? 0)) }}
                                    ({{ $book->comments->count() }} avaliações)
                                </small>
                            </p>
                            <footer class="blockquote-footer">
                                <small>
                                    Autor <cite title="Título da fonte">{{ $book->author}}</cite>
                                </small>
                            </footer>
                        </div>
                    </div>
                </a>
            @endforeach
        </main>
    </section>
@endsection