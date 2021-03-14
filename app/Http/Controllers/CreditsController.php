<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditsController extends Controller
{
    public function index()
    {
        return view('credits.index');
    }

    public function create()
    {
        return view('credits.create');
    }
}
