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
        // Devuelve la vista Index con todos los productos
        return Inertia::render('Index', [
            'Libros' => Libros::all()
        ]);    }

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
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'año' => 'required|date',
            'genero' => 'required|max:255',
            'Disponibilidad' => 'required|boolean'
        ]);

        // Crear el producto con los datos validados
        Libros::create($validated);

        // Redireccionar a la lista con mensaje de éxito
        return redirect()->route('Libros.index')->with('success', 'Libro creado con éxito');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Libros $Libro)
    {
        // Devuelve la vista Show con el producto solicitado
        return Inertia::render('Show', [
            'Libros' => $Libro
        ]);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libros $Libro)
    {
        // Devuelve la vista Edit con el libro a editar
        return Inertia::render('Edit', [
            'Libros' => $Libro
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libros $Libro)
    {
        // Validación de datos
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'año' => 'required|date',
            'genero' => 'required|max:255',
            'Disponibilidad' => 'required|boolean'
        ]);

        // Actualizar el libro con los datos validados
        $Libro->update($validated);

        // Redireccionar a la lista con mensaje de éxito
        return redirect()->route('Libros.index')->with('success', 'Libro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libros $Libro)
    {
        // Eliminar el libro
        $Libro->delete();
        
        // Redireccionar a la lista con mensaje de éxito
        return redirect()->route('Libros.index')->with('success', 'Libro eliminado con éxito');
    }
}
