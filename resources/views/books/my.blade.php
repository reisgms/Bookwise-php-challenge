@extends('layout.app')

@section('content')
    <section class="container py-4">
        @if ($message = session('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <div class="d-flex">
            <form class="w-100" action="/">
                <input type="text" class="form-control" name="search" placeholder="Buscar">
            </form>

            <a type="submit" href="{{ route('books.create') }}" class="btn btn-primary ml-4">Adicionar</a>
        </div>

        <main class="mt-4 card-columns">
            @foreach ($books as $book)
                <a href="{{ route('books.show', $book) }}">
                    <div class="card" style="min-height: 400px;">
                        <img class="card-img-top" src="https://placehold.co/600x400" alt="Imagem de capa do card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ str($book->description)->limit(50) }}</p>
                            <p class="card-text text-right"><small class="text-muted"> ⭐⭐⭐⭐ (12 avaliações)</small></p>
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
