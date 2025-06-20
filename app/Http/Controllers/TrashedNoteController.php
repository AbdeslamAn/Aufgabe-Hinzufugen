<?php

namespace App\Http\Controllers;

use App\Models\Aufgabe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TrashedNoteController extends Controller
{
    public function index()
    {
        $aufgabes = Aufgabe::whereBelongsTo(Auth::user())->onlyTrashed()->latest('updated_at')->paginate(5);

        return view('noten.index')->with('aufgabes',$aufgabes);

    }

    public function show(Aufgabe $aufgabe)
    {
         if(!$aufgabe->user->is(Auth::user()))
        {
            abort(403);
        }

        return view('noten.show')->with('aufgabe', $aufgabe);
    }

    public function update(Aufgabe $aufgabe)
    {
        if(!$aufgabe->user->is(Auth::user()))
        {
            abort(403);
        }

        $aufgabe->restore();

        return to_route('aufgabes.show', $aufgabe)
            ->with('success', 'Notiz wiederherstellen');

    }

    public function destroy(Aufgabe $aufgabe)
    {
        if(!$aufgabe->user->is(Auth::user()))
        {
            abort(403);
        }

        $aufgabe->forceDelete();

        return to_route('trashed.index')
            ->with('success', 'Notiz endgültig löschen');
    }
}
