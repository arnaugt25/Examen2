<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('WeightList',[
            'weights' => Weight::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('WeightCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'weight' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        Weight::create($validate);

        return redirect()->route('weight.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weight $weight)
    {
        return Inertia::render('WeightShow',[
            'weight' => $weight
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weight $weight)
    {
        return Inertia::render('WeightEdit',[
            'weight' => $weight
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Weight $weight)
    {
        $validate = $request->validate([
            'weight' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $weight->update($validate);
        return redirect()->route('weight.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weight $weight)
    {
        $weight->delete();
        
        return redirect()->route('weight.index');
    }
}
