<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Phase;
use App\Models\Project;
use App\Models\Subphase;
use Illuminate\Http\Request;
use ZipArchive;

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
            'description' => $request->input('description'),
            'phase_id' => session('phase_id'),
            'subphase_parent_id' => $parent_id,
            'has_documents' => $request->has_documents,
            'has_instructions' => $request->has_instructions,
        ]);

        session()->flash('success', 'Subphase created successfully');

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
        $subphaseChildren = Subphase::where('subphase_parent_id', $subphase_id)->orderBy('name', 'ASC')->get();

        session(['parent_id' => $subphase_id]);

        $parentSubphases = $subphase->getAllParentSubphases();

        $instructions = $subphase->instructions;

        if (auth()->user()->is_admin || $phase->is_private == 0) {
            $documents = $subphase->documents;
        } else {
            $documents = $subphase->documents->where('company_id', auth()->user()->company_id)->concat($subphase->documents->where('company_id', null));
        }


        return view('subphases.show', compact('subphase', 'subphaseChildren', 'project', 'phase', 'parentSubphases', 'documents', 'instructions'));
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
        $subphase->description = $request->input('description');
        $subphase->has_documents = $request->has_documents;
        $subphase->has_instructions = $request->has_instructions;

        $subphase->save();

        session()->flash('updated', 'Subphase updated successfully');

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

        session()->flash('deleted', 'Subphase deleted successfully');

        $subphase->delete();
        if ($subphase_parent_id == null) {
            return redirect()->route('projects.phases.show', [$project_id, $phase_id]);
        } else {
            return redirect()->route('projects.phases.subphases.show', [$project_id, $phase_id, $subphase_parent_id]);
        }
    }

    public function showDocuments(string $project_id, string $phase_id, string $subphase_id)
    {
        $project = Project::find($project_id);
        $phase = Phase::find($phase_id);
        $subphase = Subphase::find($subphase_id);
        $companies = $project->companies;
        $parentSubphases = $subphase->getAllParentSubphases();
        $documents = $subphase->documents;
        $company_selected_id = null;

        return view('subphases.documents', compact('project', 'phase', 'subphase', 'parentSubphases', 'companies', 'documents', 'company_selected_id'));
    }

    public function showFilteredDocuments(Request $request, string $project_id, string $phase_id, string $subphase_id)
    {
        $project = Project::find($project_id);
        $phase = Phase::find($phase_id);
        $subphase = Subphase::find($subphase_id);
        $companies = $project->companies;
        $parentSubphases = $subphase->getAllParentSubphases();
        $company_selected_id = $request->company_id;

        $documents = $subphase->documents->where('company_id', $company_selected_id);

        return view('subphases.documents', compact('project', 'phase', 'subphase', 'parentSubphases', 'companies', 'documents', 'company_selected_id'));
    }

    public function downloadSubphaseDocuments(string $project_id, string $phase_id, string $subphase_id, string $company_id){
        $project = Project::find($project_id);
        $subphase = Subphase::find($subphase_id);
        $company = Company::find($company_id);

        $documents = $subphase->documents->where('company_id', $company_id);

        $zip = new ZipArchive;
        $zipFileName = $project->title . '_'. $subphase->name. '_' . $company->name . '.zip';
        $zip->open(storage_path('app/public/documents/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($documents as $document) {
            $path = storage_path('app/public/documents/' . $project->title . '/' . $document->id . '.' . $document->extension);
            $zip->addFile($path, $document->downloadPath . '.' . $document->name . '.' . $document->extension);
        }

        $zip->close();

        return response()->download(storage_path('app/public/documents/' . $zipFileName))->deleteFileAfterSend(true);
    }

}