@extends('layouts.welcome')

@section('contenido') 

    <div class="d-flex justify-content-center align-items-center mt-3">

        <form novalidate action="{{route('notes_update',$notes)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row mb-3">
                <label for="titulo" class="form-control-lg col-form-label">Titulo:</label>
                <input for="titulo" name="titulo" type="text" class="form-control input-group-lg" id="titulo">
            </div>
            <div class="row mb-3">
                <label for="contenido" class="form-control-lg col-form-label">Nota:</label>
                <textarea for="contenido" name="contenido" class="form-control input-group-lg" id="contenido"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
        </form>
    </div>
@endsection
