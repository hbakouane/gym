<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Subscription;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    public function index()
    {
        return view('vendors.index');
    }

    public function create()
    {
        return view('vendors.create');
    }
}
