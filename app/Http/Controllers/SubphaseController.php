<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phase;
use App\Models\Subphase;
use App\Models\Project;

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
    public function create($project_id, $phase_id)
    {
        $phase = Phase::find($phase_id);
        session(['phase_id' => $phase_id, 'project_id' => $project_id]);
        return view('subphases.create', compact('phase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $project_id, string $phase_id)
    {
        // GET PARENT ID        
        if (!session('parent_id')) {
            $parent_id = null;
        } else {
            $parent_id = session('parent_id');
        }

        // CREATE SUBPHASE
        $subphase = Subphase::create([
            'name' => $request->name,
            'description' => $request->description,
            'phase_id' => session('phase_id'),
            'subphase_parent_id' => $parent_id,
        ]);

        // REDIRECT
        if ($subphase->subphase_parent_id == null) {
            return redirect()->route('projects.phases.show', [$project_id, $phase_id]);
        } else {
            return redirect()->route('projects.phases.subphases.show', [$project_id, $phase_id, $subphase->subphase_parent_id]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $project_id, string $phase_id, string $subphase_id)
    {
        $project = Project::find($project_id);
        $phase = Phase::find($phase_id);

        $subphase = Subphase::find($subphase_id);
        $subphaseChildren = Subphase::where('subphase_parent_id', $subphase_id)->get();

        session(['parent_id' => $subphase_id]);

        $parentSubphases = $subphase->getAllParentSubphases();

        return view('subphases.show', compact('subphase', 'subphaseChildren', 'project', 'phase', 'parentSubphases'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $project_id, string $phase_id, string $subphase_id)
    {
        $subphase = Subphase::find($subphase_id);

        return view('subphases.edit', compact('subphase', 'project_id'));
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


        if ($subphase->subphase_parent_id == null) {
            return redirect()->route('projects.phases.show', [$project_id, $phase_id]);
        } else {
            return redirect()->route('projects.phases.subphases.show', [$project_id, $phase_id, $subphase->subphase_parent_id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $project_id, string $phase_id, string $subphase_id)
    {
        $subphase = Subphase::find($subphase_id);
        $subphase_parent_id = $subphase->subphase_parent_id;

        $subphase->delete();
        if ($subphase_parent_id == null) {
            return redirect()->route('projects.phases.show', [$project_id, $phase_id]);
        } else {
            return redirect()->route('projects.phases.subphases.show', [$project_id, $phase_id, $subphase_parent_id]);
        }
    }

}