<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Index',[
            'events' => Events::all()
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
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('event', 'public');
            $validate['image'] = $image;
        }

        Events::create($validate);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $event)
    {
        return Inertia::render('Show',[
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $event)
    {
        return Inertia::render('Edit',[
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Events $event)
    {
        $validate = $request->validate([
            'name' => 'nullable|max:255',
            'description' => 'nullable|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('event', 'public');
            $validate['image'] = $image;
        }else{
            unset($validate['image']);
        }

        $event->update($validate);
        return redirect()->route('events.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $event)
    {
        $event->delete();

        return redirect()->route('events.index');
    }
}
