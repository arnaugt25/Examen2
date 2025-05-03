<?php

namespace App\Http\Controllers;

use App\Models\Caca;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CacaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Caca',[
            'cacas' => Caca::all() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CreateCaca');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('image', 'public');
            $validate['image'] = $image;
        }

        if ($request->hasFile('audio')) {
            $audio = $request->file('audio')->store('audio', 'public');
            $validate['audio'] = $audio;
        }

        Caca::create($validate);
        return redirect()->route('caca.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Caca $caca)
    {
        return Inertia::render('ShowCaca',[
            'caca' => $caca
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caca $caca)
    {
        return Inertia::render('EditCaca',[
            'caca' => $caca
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caca $caca)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('image', 'public');
            $validate['image'] = $image;
        }

        if ($request->hasFile('audio')) {
            $audio = $request->file('audio')->store('audio', 'public');
            $validate['audio'] = $audio;
        }

        $caca->update($validate);
        return redirect()->route('caca.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caca $caca)
    {
        $caca->delete();
        return redirect()->route('caca.index');
    }
}
