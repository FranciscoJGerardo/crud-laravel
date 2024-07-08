<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    public function index ($note){
        return view ('post.notes_card',[
            'notes' => $note
        ]);
    }
    public function create(User $user)
    {

        $notes = Notes::where('user_id', $user->id)->paginate(3);


        return view('post.notes', compact('user','notes'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:30',
            'contenido' => 'required|max:200'
        ]);

        Notes::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'user_id' => auth()->user()->id
        ]);


        return redirect()->route('notes_create', auth()->user());
    }

    public function destroy($notes)
    {
        $notes_delete = Notes::where('id', $notes)->first();

        $notes_delete->delete();

        return redirect()->route('notes_create', auth()->user());
    }

    public function update(Request $request, $notes)
    {

        $notes_update = Notes::where('id', $notes)->first();


        ($notes_update->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido
        ]));
        
        $notes_update->save();

        return redirect()->route('notes_create', auth()->user());
    }
}
