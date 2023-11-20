<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Company;
use Illuminate\Support\Facades\DB;


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
            $projects = $user->projects;
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

        session()->flash('created', 'Project created successfully');

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

        session()->flash('updated', 'Project updated successfully');

        return redirect()->route('projects.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        $project->delete();

        session()->flash('deleted', 'Project deleted successfully');

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

        session()->flash('added', 'Company added successfully');

        return redirect()->route('projects.manageCompanies.index', ['project_id' => $project_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function manageCompaniesDestroy(string $project_id, string $company_id)
    {
        $project = Project::find($project_id);

        $project->companies()->detach($company_id);

        $project->users()->where('company_id', $company_id)->detach();

        session()->flash('deleted', 'Company removed successfully');

        return redirect()->route('projects.manageCompanies.index', ['project_id' => $project_id]);
    }

    public function manageUsers(string $project_id, string $company_id)
    {
        $company = Company::find($company_id);
        $project = Project::find($project_id);
        $assignedUsers = $project->users->where('company_id', $company_id);

        // dd($assignedUsers);

        return view('projects.showUsers', [
            'company' => $company,
            'project' => $project,
            'assignedUsers' => $assignedUsers
        ]);
    }

    public function manageUsersStore(Request $request, string $project_id)
    {
        $project = Project::find($project_id);

        $project->users()->syncWithoutDetaching($request->user_id);

        session()->flash('added', 'User added successfully');

        return redirect()->route('projects.companies.manageUsers.index', ['project_id' => $project_id, 'company_id' => $request->company_id]);
    }

    public function manageUsersDestroy(string $project_id, string $company_id, string $user_id)
    {
        $project = Project::find($project_id);

        $project->users()->detach($user_id);

        session()->flash('deleted', 'User removed successfully');

        return redirect()->route('projects.companies.manageUsers.index', ['project_id' => $project_id, 'company_id' => $company_id]);
    }

    public function showDocuments(string $project_id)
    {
        $project = Project::find($project_id);
        $documents = $project->documents;

        return view('projects.showDocuments', [
            'project' => $project,
            'documents' => $documents
        ]);
    }


}
