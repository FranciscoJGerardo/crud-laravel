@extends('layouts.welcome')


@section('titulo')
    Login
@endsection


@section('contenido') 

    <div class="d-flex justify-content-center align-items-center mt-3">
        <form novalidate action="{{route('login')}}" method="POST"
         class="d-flex  justify-content-center flex-column ">
            @csrf
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                @error('email')
                    <p class="bg-danger text-base my-2 rounded-2 fs-6 p-2 ">{{ $message }} </p>
                @enderror
                <div class="col-sm-12">
                    <input name="email" for="email" type="email" class="form-control" id="inputEmail3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3  col-form-label">Contraseña</label>
                @error('password')
                    <p class="bg-danger text-base my-2 rounded-2 fs-6 p-2 ">{{ $message }} </p>
                @enderror
                <div class="col-sm-12">
                    <input name="password" for="password" type="password" class="form-control " id="inputPassword3">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
        </form>
    </div>
@endsection
