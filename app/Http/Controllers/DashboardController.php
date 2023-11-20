<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $documents = Document::orderBy("updated_at", "desc")->take(30)->get();

            return view("dashboard", [
                "documents" => $documents,
            ]);
        } else {
            return redirect()->route("projects.index");
        }
    }
}
