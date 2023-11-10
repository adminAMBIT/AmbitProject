<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            return view("dashboard");
        } else {
            return redirect()->route("projects.index");
        }
    }
}
