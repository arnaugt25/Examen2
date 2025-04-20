<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('ListSports', [
            'sports' => Sport::with('category')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        
        return Inertia::render('CreateSport',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'category_id' => 'required|max:255'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('event', 'public');
            $validate['image'] = $image;
        }

        Sport::create($validate);
        return redirect()->route('sport.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        return Inertia::render('ShowSport',[
            'sport' => $sport->load('category')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        return Inertia::render('EditSport',[
            'sport' => $sport,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sport $sport)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'category_id' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('event', 'public');
            $validate['image'] = $image;
        }

        $sport->update($validate);

        return redirect()->route('sport.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();
        return redirect()->route('sport.index');

    }
}
