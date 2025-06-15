<?php

namespace App\Http\Controllers;

use App\Models\Aufgabe;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Aufgabe $aufgabe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aufgabe $aufgabe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aufgabe $aufgabe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aufgabe $aufgabe)
    {
        //
    }
}
