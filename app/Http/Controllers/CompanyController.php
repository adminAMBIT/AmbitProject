<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Project;
use App\Models\Document;
use App\Models\UserType;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userTypes = UserType::all();

        return view('companies.index', [
            'userTypes' => $userTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:companies,name',
            'cif' => 'required|unique:companies,cif',
            'email' => 'required|unique:companies,email',
            'country' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
        ];

        $customMessages = [
            'unique' => 'This :attribute alredy exists.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Company::create([
            'name' => $request->name,
            'cif' => $request->cif,
            'email' => $request->email,
            'country' => $request->country,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
        ]);

        session()->flash('created', 'Company created successfully');

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $company = Company::find($id);

        return view('companies.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);

        return view('companies.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|unique:companies,name,' . $id,
            'cif' => 'required|unique:companies,cif,' . $id,
            'email' => 'required|unique:companies,email,' . $id,
            'country' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
        ];

        $customMessages = [
            'unique' => 'This :attribute alredy exists.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $company = Company::find($id);

        $company->name = $request->name;
        $company->cif = $request->cif;
        $company->email = $request->email;
        $company->country = $request->country;
        $company->street_address = $request->street_address;
        $company->city = $request->city;
        $company->province = $request->province;
        $company->postal_code = $request->postal_code;

        $company->save();
        
        session()->flash('updated', 'Company updated successfully');

        return redirect()->route('companies.show', [$company->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);

        $company->delete();

        return redirect()->route('companies.index');
    }

    public function showDocuments(string $project_id, string $company_id)
    {
        $project = Project::find($project_id);
        $company = Company::find($company_id);
        $documents = Document::where('company_id', $company_id)->where('project_id', $project_id)->get();
        return view('companies.showDocuments', compact('company', 'documents', 'project'));
    }
}
