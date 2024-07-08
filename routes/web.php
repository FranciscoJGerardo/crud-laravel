<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
//Registrar
Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'store']);
//logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


//Notas

Route::get('/notes/create/{user:name}', [NotesController::class, 'create'])->name('notes_create')->middleware('auth');;

Route::post('/notes', [NotesController::class, 'store'])->name('notes_store');

Route::delete('/notes/{id}', [NotesController::class, 'destroy'])->name('notes_destroy');

Route::get('/notes/{id}', [NotesController::class, 'index'])->name('notes_index');

Route::put('/notes/{id}', [NotesController::class, 'update'])->name('notes_update');
