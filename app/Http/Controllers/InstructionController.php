<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Models\Subphase;
use Illuminate\Http\Request;

class InstructionController extends Controller
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
    public function create(string $project_id, string $phase_id, string $subphase_id)
    {
        $subphase = Subphase::find($subphase_id);
        return view('instructions.create', compact('subphase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $project_id, string $phase_id, string $subphase_id)
    {
        Instruction::create([
            'name' => $request->name,
            'link' => $request->link,
            'subphase_id' => $subphase_id
        ]);

        return redirect()->route('projects.phases.subphases.show', [$project_id, $phase_id, $subphase_id])->with('success', 'Instruction created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $project_id, string $phase_id, string $subphase_id, string $instruction_id)
    {
        $subphase = Subphase::find($subphase_id);
        $instruction = Instruction::find($instruction_id);
        return view('instructions.edit', compact('instruction', 'subphase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $project_id, string $phase_id, string $subphase_id, string $instruction_id)
    {
        $instruction = Instruction::find($instruction_id);
        $instruction->update([
            'name' => $request->name,
            'link' => $request->link,
        ]);

        return redirect()->route('projects.phases.subphases.show', [$project_id, $phase_id, $subphase_id])->with('success', 'Instruction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $project_id, string $phase_id, string $subphase_id, string $instruction_id)
    {
        $instruction = Instruction::find($instruction_id);
        $instruction->delete();

        return redirect()->route('projects.phases.subphases.show', [$project_id, $phase_id, $subphase_id])->with('success', 'Instruction deleted successfully');
    }
}
