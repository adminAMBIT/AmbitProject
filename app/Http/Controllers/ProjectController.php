<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Company;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $projects = Project::all();
        } else {
            $projects = $user->company->projects;
        }

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Project::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        session()->flash('success', 'Project created successfully');

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);

        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);

        return view('projects.edit', [
            'project' => $project
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);

        $project->title = $request->title;
        $project->description = $request->description;

        $project->save();

        session()->flash('updated','Project updated successfully');

        return redirect()->route('projects.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        $project->delete();

        session()->flash('deleted','Project deleted successfully');

        return redirect()->route('projects.index');
    }

    /**
     * Manage companies for a project.
     */
    public function manageCompanies(string $project_id)
    {
        $project = Project::find($project_id);

        $companies = Company::all();

        return view('projects.manageCompanies', [
            'project' => $project,
            'companies' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function manageCompaniesStore(Request $request, string $project_id)
    {
        $project = Project::find($project_id);

        $project->companies()->syncWithoutDetaching($request->company_id);

        return redirect()->route('projects.manageCompanies.index', ['project_id' => $project_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function manageCompaniesDestroy(string $project_id, string $company_id)
    {
        $project = Project::find($project_id);

        $project->companies()->detach($company_id);

        return redirect()->route('projects.manageCompanies.index', ['project_id' => $project_id]);
    }
}
