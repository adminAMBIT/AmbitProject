<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($document_id)
    {
        $document = Document::find($document_id);
        $feedbacks = $document->feedbacks;


        return view('feedbacks.index', compact('document', 'feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($document_id)
    {
        $document = Document::find($document_id);

        return view('feedbacks.create', compact('document'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $document_id)
    {   
        Feedback::create([
            'document_id' => $document_id,
            'description' => $request->description,
        ]);

        session()->flash('created', 'Feedback created successfully!');

        return redirect()->route('document.show', $document_id);
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
