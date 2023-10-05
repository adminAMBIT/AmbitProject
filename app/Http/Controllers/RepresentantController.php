<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representant;
use App\Models\Company;
use Illuminate\Support\Str;




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
        Representant::create([
            'name' => $request->name,
            'nif' => $request->nif,
            'email' => $request->email,
            'position' => $request->position,
            'username' => $request->nif,
            'password' => Str::random(8),
            'company_id' => $company_id,
        ]);

        return redirect()->route('companies.show', ['id' => $company_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $representant = Representant::find($id);
        dd($representant);

        return view('representants.show', ['representant' => $representant]);
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
