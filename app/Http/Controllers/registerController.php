<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{
    function index()
    {
        return view('auth.register');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:4|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //autenticar
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //redireccionar
        return redirect()->route('notes_create', auth()->user());
    }
}
