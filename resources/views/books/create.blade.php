@extends('layout.app')

@section('content')
    <section class="container py-4">
        <div class="card w-50 mx-auto">
            <div class="card-body">
                <h5 class="card-title">Adicionar Livro</h5>
                <form action="{{ route('books.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            placeholder="Título do livro" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="author">Autor</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                            placeholder="Autor do livro" value="{{ old('author') }}">
                        @error('author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group  ">
                        <label for="description">Descrição</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Adicionar</button>
                </form>

            </div>
        </div>
    </section>
@endsection
