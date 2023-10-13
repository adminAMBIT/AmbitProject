<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phase;
use App\Models\Subphase;

class SubphaseController extends Controller
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
    public function create($phase_id, $parent_id)
    {
        $phase = Phase::find($phase_id);

        return view('subphases.create', ['phase' => $phase]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $project_id, $parent_id)
    {   
        $subphase = Subphase::create([
            'name' => $request->name,
            'description' => $request->description,
            'parent_subphase_id' => $parent_id,
            'phase_id' => $request->phase_id,
        ]);

        return redirect()->route('projects.phases.show', ['project_id'=>$subphase->phase->project->title,'phase_id' => $parent_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $project_id, string $phase_id, string $subphase_id)
    {
        $subphase = Subphase::find($subphase_id);

        // dd($subphase->id);

        return view('subphases.show', ['subphase' => $subphase]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $project_id, string $phase_id, string $subphase_id)
    {
        $subphase = Subphase::find($subphase_id);

        return view('subphases.edit', ['subphase' => $subphase]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $project_id, string $phase_id, string $subphase_id)
    {
        $subphase = Subphase::find($subphase_id);

        $subphase->name = $request->name;
        $subphase->description = $request->description;

        $subphase->save();

        return redirect()->route('projects.phases.show', ['project_id'=>$subphase->phase->project->title,'phase_id' => $phase_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $project_id, string $phase_id, string $subphase_id)
    {
        $subphase = Subphase::find($subphase_id);

        $subphase->delete();

        return redirect()->route('projects.phases.show', ['project_id'=>$subphase->phase->project->id,'phase_id' => $subphase->phase->id]);
    }
}
