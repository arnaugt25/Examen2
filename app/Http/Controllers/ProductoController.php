<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Devuelve la vista Index con todos los productos
        return Inertia::render('Productos/Index', [
            'productos' => Producto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Devuelve la vista Create
        return Inertia::render('Productos/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Crear el producto con los datos validados
        Producto::create($validated);

        // Redireccionar a la lista con mensaje de éxito
        return redirect()->route('productos.index')
                         ->with('success', 'Producto creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        // Devuelve la vista Show con el producto solicitado
        return Inertia::render('Productos/Show', [
            'producto' => $producto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        // Devuelve la vista Edit con el producto a editar
        return Inertia::render('Productos/Edit', [
            'producto' => $producto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        // Validación de datos
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Actualizar el producto
        $producto->update($validated);

        // Redireccionar a la lista con mensaje de éxito
        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        // Eliminar el producto
        $producto->delete();

        // Redireccionar a la lista con mensaje de éxito
        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado con éxito');
    }
}
