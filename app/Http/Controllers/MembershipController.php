<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function create()
    {
        return view('memberships.create');
    }
}
