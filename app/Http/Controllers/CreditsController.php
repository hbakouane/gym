<?php

namespace App\Http\Controllers;

use App\Models\Credit;
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

    public function edit($id)
    {
        return view('credits.edit', ['credit' => Credit::find($id)]);
    }
}
