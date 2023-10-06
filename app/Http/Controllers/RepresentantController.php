<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;





class RepresentantController extends Controller
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
    public function create($company_id)
    {
        $company = Company::find($company_id);

        return view('representants.create', ['company' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $company_id)
    {
        $rules = [
            'name' => 'unique:users,name',
            'nif' => 'required | unique:users,nif',
            'email' => 'required | unique:users,email',
        ];

        $customMessages = [
            'required' => 'El campo :attribute es obligatorio.',
            'unique' => 'This :attribute alredy exists.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'nif' => $request->nif,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt('Ambit#2023'),
            'user_type_id' => 1,
            'company_id' => $company_id,
        ]);

        return redirect()->route('companies.show', ['id' => $company_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $representant = User::find($id);

        return view('representants.show', ['representant' => $representant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $representant = User::find($id);

        return view('representants.edit', ['representant' => $representant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required | unique:users,name,' . $id,
            'nif' => 'required | unique:users,nif,' . $id,
            'email' => 'required | unique:users,email,' . $id,
        ];

        $customMessages = [
            'required' => 'El campo :attribute es obligatorio.',
            'unique' => 'This :attribute alredy exists.',
        ];


        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $representant = User::find($id);

        $representant->name = $request->name;
        $representant->nif = $request->nif;
        $representant->email = $request->email;
        $representant->phone = $request->phone;

        $representant->save();

        return redirect()->route('representants.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $representant = User::find($id);

        $representant->delete();

        return redirect()->route('companies.show', ['id' => $representant->company_id]);
    }
}
