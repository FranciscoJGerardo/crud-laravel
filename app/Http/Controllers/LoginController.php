<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('mensaje', 'Error de credenciales');
        }

        return redirect()->route('notes_create', auth()->user());
    }
}
