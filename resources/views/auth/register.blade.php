@extends('layouts.welcome')
@section('titulo')
    Registro
@endsection

@section('contenido')
    <div class="page-hero d-flex justify-content-center align-items-center">
        <form method="POST" action="/register" class="login-hero d-flex  justify-content-center flex-column" novalidate>
            @csrf
            <div class="row mb-3 d-flex justify-content-center">
                <label for="inputEmail3" class="col-sm-3 col-form-label">REGISTRATE</label>
            </div>


            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-12">
                    <input for="name" name="name" type="text" class="form-control" id="name">
                </div>
                @error('name')
                    <p class="bg-danger text-base my-2 rounded-2 fs-6 p-2 ">{{ $message }} </p>
                @enderror
            </div>


            <div class="row mb-3">
                <label for="email" class="col-sm-3  col-form-label">Email</label>
                <div class="col-sm-12">
                    <input for="email" name="email" type="email" class="form-control " id="email">
                </div>
                @error('email')
                    <p class="bg-danger text-base my-2 rounded-2 fs-6 p-2 ">{{ $message }} </p>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="password" class="col-sm-3  col-form-label">Contraseña</label>
                <div class="col-sm-12">
                    <input for="password" name="password" type="password" class="form-control " id="password">
                </div>
                @error('password')
                    <p class="bg-danger text-base my-2 rounded-2 fs-6 p-2 ">{{ $message }} </p>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="password_confirmation" class="col-sm-3  col-form-label">Repite Contraseña</label>
                <div class="col-sm-12">
                    <input for="password_confirmation" name="password_confirmation" type="password" class="form-control " id="password_confirmation">
                </div>

            </div>
            <button name="" type="submit" class="btn btn-success">Sign in</button>
        </form>
    </div>
@endsection
