<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        return view('expenses.index');
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function edit()
    {
        return view('expenses.edit');
    }
}
