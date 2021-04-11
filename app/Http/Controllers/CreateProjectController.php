<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateProjectController extends Controller
{
    public function index() 
    {
        if (PlanFeaturesCheckerController::check('project.create') != null) {
            return PlanFeaturesCheckerController::check('project.create');
        }
        return view('projects.create');
    }
}
