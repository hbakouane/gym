<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function manageProjects()
    {
        return view('projects.manage');
    }
}
