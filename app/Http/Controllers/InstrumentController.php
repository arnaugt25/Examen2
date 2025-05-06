<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Type;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('InstrumentList',[
            'instruments' => Instrument::with('type')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('InstrumentCreate',[
            'types' => Type::all()
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
            'type_id' => 'required',
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('instrument', 'public');
            $validate['image'] = $image;
        }

        Instrument::create($validate);
        return redirect()->route('instrument.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instrument $instrument)
    {
        return Inertia::render('InstrumentShow',[
            'instrument' => $instrument->load('type')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instrument $instrument)
    {
        return Inertia::render('InstrumentEdit',[
            'instrument' => $instrument,
            'types' => Type::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instrument $instrument)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'type_id' => 'required',
            'image' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('instrument', 'public');
            $validate['image'] = $image;
        }

        $instrument->update($validate);
        return redirect()->route('instrument.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instrument $instrument)
    {
        $instrument->delete();
        return redirect()->route('instrument.index');
    }
}
