<?php

namespace App\Http\Controllers;

use App\Models\Aufgabe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AufgabeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $aufgabes = Aufgabe::where('user_id', $user_id)->latest('updated_at')->paginate(5);

        return view('noten.index')->with('aufgabes',$aufgabes);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noten.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
         ]);

         $notiz = new Aufgabe([
            'user_id' => Auth::id(),
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'text' => $request->text
         ]);
         $notiz->save();

         return to_route('aufgabes.show', $notiz);

    }

    /**
     * Display the specified resource.
     */
    public function show(Aufgabe $aufgabe)
    {
        if($aufgabe->user_id !== Auth::id())
        {
            abort(403);
        }

        return view('noten.show', ['aufgabe' =>  $aufgabe]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aufgabe $aufgabe)
    {
        if($aufgabe->user_id !== Auth::id())
        {
            abort(403);
        }

        return view('noten.edit', ['aufgabe' =>  $aufgabe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aufgabe $aufgabe)
    {
        if($aufgabe->user_id !== Auth::id())
        {
            abort(403);
        }

         $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
         ]);

         $aufgabe->update([
            'title' => $request->title,
            'text' => $request->text
         ]);

         return to_route('aufgabes.show', $aufgabe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aufgabe $aufgabe)
    {
        //
    }
}
