<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserType;
use App\Models\Company;
use App\Models\User;

use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
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

        $userTypes = UserType::all();

        return view('contacts.create', [
            'company' => $company,
            'userTypes' => $userTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $company_id)
    {
        $rules = [
            'name' => 'unique:users,name',
            'nif' => 'unique:users,nif',
            'email' => 'required | unique:users,email',
            'user_type_id' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
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
            'password' => bcrypt(config('configuration.default_user_password')),
            'user_type_id' => $request->user_type_id,
            'company_id' => $company_id,
        ]);

        session()->flash('contactCreated', 'Contact created successfully');

        return redirect()->route('companies.show', ['id' => $company_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = User::find($id);

        return view('contacts.show', ['contact' => $contact]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = User::find($id);

        $userTypes = UserType::all();

        return view('contacts.edit', [
            'contact' => $contact,
            'userTypes' => $userTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'unique:users,name,'. $id,
            'nif' => 'unique:users,nif,' . $id,
            'email' => 'required | unique:users,email,'. $id,
            'user_type_id' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique' => 'This :attribute alredy exists.',
        ];


        $validator = Validator::make($request->all(), $rules, $customMessages);
        

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $contact = User::find($id);

        $contact->name = $request->name;
        $contact->nif = $request->nif;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->user_type_id = $request->user_type_id;

        $contact->save();

        session()->flash('contactUpdated', 'Contact updated successfully');

        return redirect()->route('contacts.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = User::find($id);

        $contact->delete();

        session()->flash('contactDeleted', 'Contact deleted successfully');

        return redirect()->route('companies.show', ['id' => $contact->company_id]);
    }
}
