@extends('layout.app')

@section('content')
    <section class="container py-4">
        <div class="d-flex flex-column gap-4">
            <div class="card mb-8">
                <div class="card-header">
                    <a href="{{ route('books.edit', $book) }}" type="button" class="btn btn-primary float-right">
                        Editar
                    </a>
                </div>


                <div class="card-body">
                    <div class="d-flex justify-content-center gap-3">
                        <div style="flex: 1;">
                            <img src="https://placehold.co/600x400" alt="Imagem de capa do card" style="width: 100%; height: auto; object-fit: cover;">
                        </div>
                        <div style="flex: 3;">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                            <p class="card-text text-right"><small class="text-muted"> ⭐⭐⭐⭐ (12 avaliações)</small></p>
                            <footer class="blockquote-footer">
                                <small>
                                    Autor <cite title="Título da fonte">{{ $book->author }}</cite>
                                </small>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Comentarios</h5>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Adicionar comentario
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p>
                                <strong>Usuario 1</strong>
                                <small class="text-muted float-right">⭐⭐⭐⭐ (4/5)</small>
                            </p>
                            <p>Comentario 1</p>
                            <small class="text-muted">12/12/2023</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('modals')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rating">Nota</label>
                        <select class="form-control" id="rating" name="rating" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comentario</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </div>
    </div>
@endpush
