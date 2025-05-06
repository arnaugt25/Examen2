<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('TypeList',[
            'types' => Type::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('TypeCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255'
        ]);

        Type::create($validate);
        return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return Inertia::render('TypeShow',[
            'type' => $type
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return Inertia::render('TypeEdit',[
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $validate = $request->validate([
            'name' => 'nullable|max:255'
        ]);

        $type->update($validate);
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('type.index');
    }
}
