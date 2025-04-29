<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('LibrosIndex',[
            'libros' => Libros::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('LibrosCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        Libros::create($validate);
        return redirect()->route('libros.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Libros $libro)
    {
        return Inertia::render('LibrosShow',[
            'libros' => $libro
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libros $libro)
    {
        return Inertia::render('LibrosEdit',[
            'libros' => $libro
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libros $libro)
    {
        $validate = $request->validate([
            'name' => 'max:255',
            'description' => 'max:255'
        ]);

        $libro->update($validate);
        return redirect()->route('libros.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libros $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index');
    }
}
