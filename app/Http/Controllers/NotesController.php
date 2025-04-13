<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Index', [
            'notes' => Notes::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'is_favorited' => 'required|boolean'
        ]);

        // Crear el producto con los datos validados
        Notes::create($validated);

        // Redireccionar a la lista con mensaje de éxito
        return redirect()->route('notes.index')->with('success', 'notes creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $note)
    {
        // Devuelve la vista Show con el producto solicitado
        return Inertia::render('Show', [
            'notes' => $note
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $note)
    {
        // Devuelve la vista Edit con la nota a editar
        return Inertia::render('Edit', [
            'notes' => $note
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notes $note)
    {
        // Validación de datos
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'is_favorited' => 'required|boolean'
        ]);

        // Actualizar la nota con los datos validados
        $note->update($validated);

        // Redireccionar a la lista con mensaje de éxito
        return redirect()->route('notes.index')->with('success', 'Note actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $note)
    {
        // Eliminar la nota
        $note->delete();
        
        // Redireccionar a la lista con mensaje de éxito
        return redirect()->route('notes.index')->with('success', 'Note eliminada con éxito');
    }
}
