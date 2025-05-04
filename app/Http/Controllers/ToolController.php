<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Inertia\Inertia;
class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Tool',[
            'tools' => Tool::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ToolCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        Tool::create($validate);
        return redirect()->route('tool.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        return Inertia::render('ToolShow',[
            'tool' => $tool
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        return Inertia::render('ToolEdit',[
            'tool' => $tool
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $tool)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $tool->update($validate);
        return redirect()->route('tool.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        $tool->delete();
        return redirect()->route('tool.index');
    }
}
