@extends('layouts.welcome');

@section('titulo')
    Perfil: {{ $user->name }}
@endsection


@section('contenido')
    <div class="container d-flex justify-center">
        <div class="container d-flex col-auto items-center ">
            <div class="w-8/12 lg:w-6/12 px-5 ">
                <img src="{{ asset('img/usuario.svg') }}" alt="usuario vector">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col md:justify-center items-center md:items-start py-10 md:py-10">
                <p class="text-gray-700 text-2xl"></p>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>


                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>


                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Post</span>
                </p>
                <a href="{{ route('notes_create', auth()->user()) }}">Hola mundo</a>
            </div>
        </div>
    </div>
@endsection
