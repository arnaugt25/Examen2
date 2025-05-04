<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;
use Inertia\Inertia;
class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Bike',[
            'bike' => Bike::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('BikeCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('image', 'public');
            $validate['image'] = $image;
        }

        Bike::create($validate);
        return redirect()->route('bike.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bike $bike)
    {
        return Inertia::render('BikeShow',[
            'bike' => $bike
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bike $bike)
    {
        return Inertia::render('BikeEdit',[
            'bike' => $bike
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bike $bike)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'nullable'
        ]);

        if (!$request->hasFile('image')) {
            unset($validate['image']);
        } else {
            $imagePath = $request->file('image')->store('image', 'public');
            $validate['image'] = $imagePath;
        }

        $bike->update($validate);
        return redirect()->route('bike.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bike $bike)
    {
        $bike->delete();
        return redirect()->route('bike.index');
    }
}
