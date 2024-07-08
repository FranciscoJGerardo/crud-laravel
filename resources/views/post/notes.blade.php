@extends('layouts.welcome')

@section('titulo')
    Notas
@endsection

@section('contenido')
    <header>
        <div class="container-fluid d-flex justify-content-between mt-2">
            <h1>Notas</h1>
            <a class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@task">Crear</a>
        </div>
    </header>
    <section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nota</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form novalidate action="{{ route('notes_store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="titulo" class="col-form-label">Titulo:</label>
                                <input for="titulo" name="titulo" type="text" class="form-control" id="titulo">
                            </div>
                            <div class="mb-3">
                                <label for="contenido" class="col-form-label">Nota:</label>
                                <textarea for="contenido" name="contenido" class="form-control" id="contenido"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <main>
        <div class="container-fluid row column-gap-3">
            @empty(!$notes)
                @foreach ($notes as $note)
                    <div class="card col mt-4 " style="width: 18rem;">
                        <div class="card-body">
                            <form action="{{ route('notes_destroy', $note->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <h5 class="card-title" id="title">{{ $note->titulo }}</h5>
                                <p id="body" class="card-text m-1">{{ $note->contenido }}</p>
                                <button class="btn btn-danger m-1" type="submit">Eliminar</button>
                                <a class="btn btn-primary btn-warning"
                                    href="{{ route('notes_index', $note->id) }}">Modificar</a>
                            </form>

                        </div>
                    </div>
                @endforeach
            @endempty
            <div class="mt-5">
                {{ $notes->links('pagination::simple-bootstrap-5') }}
            </div>
    </main>
@endsection
