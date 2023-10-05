<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ContactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contactTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3| unique:contact_types,name',
        ];

        $customMessages = [
            'name.unique' => 'This :attribute already exists.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        ContactType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('companies.index');
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
        $contactType = ContactType::find($id);

        return view('contactTypes.edit', [
            'contactType' => $contactType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|min:3| unique:contact_types,name,' . $id,
        ];

        $customMessages = [
            'name.unique' => 'This :attribute already exists.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $contactType = ContactType::find($id);

        $contactType->name = $request->name;

        $contactType->save();

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contactType = ContactType::find($id);

        $contactType->delete();

        return redirect()->route('companies.index');
    }
}
