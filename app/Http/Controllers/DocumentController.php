<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Phase;
use App\Models\Subphase;
use App\Models\Document;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
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
    public function upload(string $project_id, string $phase_id, string $subphase_id)
    {
        $project = Project::find($project_id);
        $phase = Phase::find($phase_id);
        $subphase = SubPhase::find($subphase_id);

        $parentSubphases = $subphase->getAllParentSubphases();


        return view("documents.upload", compact("project","phase","subphase", "parentSubphases"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $project_id, string $phase_id, string $subphase_id)
    {
        $request->validate([
            'files.*' => 'required|max:2048'
        ]); 

        if(!File::exists(storage_path('app/public/documents'))) {
            File::makeDirectory(storage_path('app/public/documents'), $mode = 0777, true, true);
        }

        foreach($request->file('files') as $file) {
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();

            $file->storeAs('documents', $fileName .'.' . $fileExtension, 'public');

            $document = new Document();
            $document->name = $fileName;
            $document->path = $fileName .'.' . $fileExtension;
            $document->extension = $fileExtension;
            $document->size = $fileSize;
            $document->subphase_id = $subphase_id;
            $document->user_id = Auth::user()->id;
            $document->company_id = Auth::user()->company_id;
            $document->save();
        }
        
        return redirect()->route('projects.phases.subphases.show', [$project_id, $phase_id, $subphase_id]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
