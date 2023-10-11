<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($project_id)
    {
        $project = Project::findOrFail($project_id);

        return view('phases.create', compact('project'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $project_id)
    {

        Phase::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_private' => (int)$request->is_private,
            'project_id' => $project_id,
        ]);

        return redirect()->route('projects.show', $project_id);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $project_id, string $phase_id)
    {
        $phase = Phase::findOrFail($phase_id);

        return view('phases.show', compact('phase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $project_id, string $phase_id)
    {
        $phase = Phase::findOrFail($phase_id);

        return view('phases.edit', compact('phase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $project_id, string $phase_id)
    {
        $phase = Phase::findOrFail($phase_id);

        $phase->name = $request->name;
        $phase->description = $request->description;
        $phase->is_private = (int)$request->is_private;

        $phase->save();
    

        return redirect()->route('projects.show', $phase->project_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $project_id, string $phase_id)
    {
        $phase = Phase::findOrFail($phase_id);

        $phase->delete();

        return redirect()->route('projects.show', $phase->project_id);
    }
}
