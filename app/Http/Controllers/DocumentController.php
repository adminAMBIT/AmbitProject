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
    public function show($id)
    {
        $document = Document::find($id);
        $feedbacks = $document->feedbacks;
        $project = $document->subphase->phase->project;

        return view("documents.show", compact("document", "project", "feedbacks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $project_id, string $phase_id, string $subphase_id)
    {
        $project = Project::find($project_id);
        $phase = Phase::find($phase_id);
        $subphase = SubPhase::find($subphase_id);

        $parentSubphases = $subphase->getAllParentSubphases();


        return view("documents.upload", compact("project", "phase", "subphase", "parentSubphases"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $project_id, string $phase_id, string $subphase_id)
    {
        $request->validate([
            'files.*' => 'required|max:2048'
        ]);

        // VARIABLES
        $subphase = Subphase::find($subphase_id);
        $last2Parents = $subphase->getAllParentSubphases()->take(-2);
        $project = Project::find($project_id);

        // MAKE DIRECTORIES
        if (!File::exists(storage_path('app/public/documents/' . $project->title))) {
            File::makeDirectory(storage_path('app/public/documents/' . $project->title), $mode = 0777, true, true);
        }

        // SET COMPANY NAME
        if (Auth::user()->is_admin) {
            $companyName = 'Admin';
        } else {
            $companyName = Auth::user()->company->name;
        }

        // SET PERSONALIZED NAME
        $downloadPathName = $project->title . '_' . $companyName . '_' . $last2Parents->implode('name', '_') . '_' . $subphase->name;
        $downloadPathName = str_replace(' ', '_', $downloadPathName);

        foreach ($request->file('files') as $file) {
            $fileId = hexdec(uniqid());
            $fileExtension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();

            $file->storeAs('documents/' . $project->title, $fileId . '.' . $fileExtension, 'public');

            $document = new Document();
            $document->id = $fileId;
            $document->name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $document->downloadPath = $downloadPathName;
            $document->extension = $fileExtension;
            $document->size = $fileSize;
            $document->subphase_id = $subphase_id;
            $document->user_id = Auth::user()->id;
            $document->company_id = Auth::user()->company_id;
            $document->save();
        }

        session()->flash('uploaded', 'Documents uploaded successfully');

        return redirect()->route('projects.phases.subphases.show', [$project_id, $phase_id, $subphase_id]);
    }

    /**
     * Display the specified resource.
     */
    public function download(string $id)
    {
        $document = Document::find($id);
        $project = $document->subphase->phase->project;
        $path = storage_path('app/public/documents/' . $project->title . '/' . $document->id . '.' . $document->extension);
        return response()->download($path, $document->downloadPath . '.' . $document->name . '.' . $document->extension);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function view(string $id)
    {
        $document = Document::find($id);
        $project = $document->subphase->phase->project;
        $path = storage_path('app/public/documents/' . $project->title . '/' . $document->id . '.' . $document->extension);
        return response()->file($path);
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(string $id)
    {
        $document = Document::find($id);
        $project = $document->subphase->phase->project;
        return view("documents.edit", compact("document", "project"));
    }

    public function update(Request $request, string $id)
    {
        $document = Document::find($id);
        if ($request->hasFile("file")) {
            $project = $document->subphase->phase->project;
            $path = storage_path('app/public/documents/' . $project->title . '/' . $document->id . '.' . $document->extension);
            File::delete($path);

            $request->validate([
                'file' => 'max:2048'
            ]);

            $request->file->storeAs('documents/' . $project->title, $document->id . '.' . $document->extension, 'public');

            $document->name = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
            $document->extension = $request->file->getClientOriginalExtension();
            $document->size = $request->file->getSize();
            $document->status = "pending";

        } else {
            $document->name = $request->name;
            $document->status = $request->status;
        }
        
        $document->save();

        session()->flash('updated', 'Document updated successfully');

        return redirect()->route('document.show', [$document->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::find($id);
        $project = $document->subphase->phase->project;

        $path = storage_path('app/public/documents/' . $project->title . '/' . $document->id . '.' . $document->extension);

        $document->delete();
        File::delete($path);

        session()->flash('documentDeleted','Document deleted successfully');

        return redirect()->route('projects.phases.subphases.show', [$project->id, $document->subphase->phase->id, $document->subphase->id]);
    }
}
