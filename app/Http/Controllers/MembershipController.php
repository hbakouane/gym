<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        return view('memberships.index');
    }

    public function create()
    {
        return view('memberships.create');
    }
}
